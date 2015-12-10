<?php
require_once( "meroveusform.php" );
class MeroveusPoll {

	var $POLLID;
	var $NAME;
	var $QUESTIONS = array();

	public function __construct($oData=null) {
		if ( $oData != null ) {
			$this->deserialize($oData);
		}
	}

	public function serialize() {
		$ar = new stdclass();
		$ar->POLLID = $this->POLLID;
		$ar->NAME = $this->NAME;
		$ar->QUESTIONS = $this->QUESTIONS;
		return $ar;
	}

	public function deserialize($oData) {
		if ( isset( $oData->POLLID ) )
			$this->POLLID = $oData->POLLID;
		if ( isset( $oData->NAME ) )
			$this->NAME = $oData->NAME;
		$this->QUESTIONS = $oData->QUESTIONS;
	}

	public function parseFormData( $aPost=null ) {
		if ( $aPost == null ) {
			$aPost = $_POST;
		}
		
		foreach ( $this->QUESTIONS as $oQn ) {
			switch ( $oQn->DATACLASS->KEY ) {
				case "breakdown":
				self::saveBreakdown( &$oQn, $aPost );
				break;

				case "qyesno":
				self::saveQyesno( &$oQn, $aPost );
				break;

				case "qlist":
				self::saveQlist( &$oQn, $aPost );
				break;

				case "qrating":
				self::saveQrating( &$oQn, $aPost );
				break;

				default:
				self::saveQuestion( &$oQn, $aPost );
				break;
			}
		}
	}

	public function toJSON() {
		$json = "";
		if ( $this->POLLID != null )
			$json .= '"POLLID":'.$this->POLLID;
		$json .= (strlen($json)>0?", ":"") . '"QUESTIONS":'.json_encode( $this->QUESTIONS );
		return '{'.$json.'}';
	}

	public function RegisterQuestion( $oQn ) {
		$iLen = count( $this->QUESTIONS );
		if ( !isset( $oQn->KEY ) ) return;
		$oQn->KEY = strtok( $oQn->KEY, "_" );
		$aQs = array();
		$bExists = false;
		for ( $i=0; $i<$iLen; $i++ ) {
			$oExist = $this->QUESTIONS[ $i ];
			if ( isset( $oQn->KEY ) && isset( $oExist->KEY ) && $oQn->KEY == $oExist->KEY ) {
				$aQs [] = $oQn;
				$bExists = true;
				continue;
			}
			$aQs [] = $oExist;
		}
		if ( !$bExists ) { //did not find the question
			$aQs [] = $oQn;
		}
		$this->QUESTIONS = $aQs;
	}

	public function Submit($eKey, $qKey) {
		$req = '{"MODE":"POLLSUBMIT", "QKEY":"'.$qKey.'", "EKEY":"'.$eKey.'"';
		$req .= ', "POLL":'.$this->toJSON();
		$req .='}';
		MeroveusClient::$meroveus = ConfigObject::Get('MeroveusHost');
		$sData = MeroveusClient::sendRequest( $req );
		$oResp = json_decode( $sData );
		if ( isset( $oResp->ERROR ) ) {
			throw new Exception( $oResp->ERROR );
		}
	}

	public static function LoadFromObject( $oPoll ) {
		$obj = new MeroveusPoll();
		$obj->POLLID = $oPoll->POLLID;
		$obj->NAME = $oPoll->NAME;
		$obj->QUESTIONS = $oPoll->QUESTIONS;
		return $obj;
	}

	public static function load( $iPollId, $eKey, $qKey ) {
		$sReq = '{"MODE":"POLLSEARCH",';
		$sReq .= '"QKEY":"'.$qKey.'"';
		$sReq .= ', "EKEY":"'.$eKey.'"';
		$sReq .= ', "POLL":{"POLLID":'.$iPollId.'}';
		$sReq .= '}';
		MeroveusClient::$meroveus = ConfigObject::Get('MeroveusHost');
		$sData = MeroveusClient::sendRequest( $sReq );
		$aPoll = json_decode( $sData );
		if ( !is_array( $aPoll ) || count( $aPoll ) == 0 ) return null;
		$oPoll = $aPoll[0];
		if ( !is_object( $oPoll ) ) return null;
		if ( !isset( $oPoll->QUESTIONS ) || !is_array( $oPoll->QUESTIONS ) || count( $oPoll->QUESTIONS ) == 0 ) {
			return null;
		}
		return $oPoll;
	}

	private static function getReplies( $sKey, $oRec ) {
		if ( $oRec == null ) return null;
		$sKey = strtok( $sKey, "_" );
		if ( !isset( $oRec->POLL ) || $oRec->POLL == null ) return null;
		if ( !isset( $oRec->POLL->QUESTIONS ) || !is_array( $oRec->POLL->QUESTIONS ) ) return null;
		foreach ( $oRec->POLL->QUESTIONS as $obj ) {
			if ( $obj->KEY == $sKey ) {
				if ( !isset( $obj->REPLIES ) ) return null;
				return $obj->REPLIES;
			}
		}
		return null;
	}

	public static function buildInput( $oQn, $oRec=null ) {
		$sDataClass = $oQn->DATACLASS->KEY;
		$aReplies = null;
		if ( isset( $oQn->KEY ) ) {
			$aReplies = self::getReplies( $oQn->KEY, $oRec );
		}
		switch ( $sDataClass ) {
			case "breakdown":
			return self::buildBreakdown( $oQn, $aReplies );
			break;

			case "qyesno":
			return self::buildQyesno( $oQn, $aReplies );
			break;

			case "qlist":
			return self::buildQlist( $oQn, $aReplies );
			break;

			case "qrating":
			return self::buildQrating( $oQn, $aReplies );
			break;

			case "qcount":
			return self::buildQcount( $oQn, $aReplies );
			break;
		}
		$val = "";
		if ( $aReplies != null && count( $aReplies ) > 0 ) {
			$aReply = (array) $aReplies[0];
			$val = $aReply["VAL"];
		}
		$sKey = isset( $oQn->KEY ) ? strtok($oQn->KEY,"_") : "QN".$oQn->QNID;
		return '<textarea id="'.$sKey.'" name="'.$sKey.'">'.htmlentities($val).'</textarea>';
	}

	public static function buildBreakdown( $oQn, $aReplies=null ) {
		$vList = $oQn->VALUELIST;
		$iSumTo = $oQn->SUMTO;
		$sKey = isset( $oQn->KEY ) ? strtok($oQn->KEY,"_") : "QN".$oQn->QNID;
		$aVals = array();
		if ( $aReplies != null ) {
			foreach ( $aReplies as $oReply ) {
				$aReply = (array) $oReply;
				$aVals[ $aReply["LABEL"] ] = $aReply["VAL"];
			}
		}
		$html = '<ul class="breakdown poll-list" sum-to="'.$iSumTo.'">';
		foreach ( $vList as $ii => $oVal ) {
			$html .= "<li><label>".$oVal->LABEL.'</label> <input class="numeric" id="'.$sKey.'_'.$ii.'" name="'.$sKey.'_'.$ii.'" type="text" value="'.(isset($aVals[$oVal->LABEL])?$aVals[$oVal->LABEL]:"").'" /></li>' . "\n";
		}
		$html .= "<li><label>Other</label> " . '<input class="numeric" id="'.$sKey.'_'.count($vList).'" name="'.$sKey.'_'.count($vList).'" type="text" value="'.(isset($aVals["Other"])?$aVals["Other"]:"").'" /></li>' . "\n";
		$html .= '<li class="total incorrect">0 (must equal '.$iSumTo.')</li>';
		$html .= "</ul>\n";
		return $html;
	}

	public static function buildQrating( $oQn, $aReplies=null ) {
		$sKey = isset( $oQn->KEY ) ? strtok($oQn->KEY,"_") : "QN".$oQn->QNID;
		$vList = $oQn->VALUELIST;
		$aVals = array();
		if ( $aReplies != null ) {
			foreach ( $aReplies as $oReply ) {
				$aReply = (array) $oReply;
				$aVals[ $aReply["VAL"] ] = 1;
			}
		}
		$html = '<ul class="qrating poll-list">';
		foreach ( $vList as $ii => $oVal ) {
			$checked = isset( $aVals[ $oVal->VAL ] ) ? " checked" : "";
			$html .= '<li><input type="radio" value="'.$oVal->VAL.'" id="'.$sKey.'" name="'.$sKey.'"'.$checked.' /><label>'.$oVal->LABEL.'</label></li>' . "\n";
		}
		$html .= "</ul>\n";
		$html .= '<input type="hidden" name="'.$sKey.'-active" value="1" />';
		return $html;
	}

	public static function buildQlist( $oQn, $aReplies=null ) {
		$sKey = isset( $oQn->KEY ) ? strtok($oQn->KEY,"_") : "QN".$oQn->QNID;
		$vList = $oQn->VALUELIST;
		$aVals = array();
		if ( $aReplies != null ) {
			foreach ( $aReplies as $oReply ) {
				$aReply = (array) $oReply;
				$aVals[ $aReply["VAL"] ] = 1;
			}
		}
		$html = '<ul class="qrating poll-list">';
		foreach ( $vList as $ii => $oVal ) {
			$checked = isset( $aVals[ $oVal->VAL ] ) ? " checked" : "";
			if ( isset( $oQn->MSELECT ) && $oQn->MSELECT == true ) {
				$html .= '<li><input type="checkbox" value="'.$ii.'" id="'.$sKey.'" name="'.$sKey.'[]"'.$checked.' /><label>'.$oVal->LABEL.'</label></li>' . "\n";
			} else {
				$html .= '<li><input type="radio" value="'.$ii.'" id="'.$sKey.'" name="'.$sKey.'"'.$checked.' /><label>'.$oVal->LABEL.'</label></li>' . "\n";
			}
		}
		$html .= "</ul>\n";
		$html .= '<input type="hidden" name="'.$sKey.'-active" value="1" />';
		return $html;
	}

	public static function buildQyesno( $oQn, $aReplies=null ) {
		$sKey = isset( $oQn->KEY ) ? strtok($oQn->KEY,"_") : "QN".$oQn->QNID;
		$val = "";
		if ( $aReplies != null && count( $aReplies ) > 0 ) {
			$aReply = (array) $aReplies[0];
			$val = $aReply["VAL"];
		}
		$html = '<ul class="qrating poll-list">';
		foreach ( array( array("VAL"=>1, "LABEL"=>"Yes"), array("VAL"=>0, "LABEL"=>"No") ) as $ii => $oVal ) {
			$html .= '<li><input type="radio" value="'.$oVal["VAL"].'" id="'.$sKey.'" name="'.$sKey.'" '.($val==$oVal["VAL"]?"checked":"").' /><label>'.$oVal["LABEL"].'</label></li>' . "\n";
		}
		$html .= "</ul>\n";
		return $html;
	}

	public static function buildQcount( $oQn, $aReplies=null ) {
		$sKey = isset( $oQn->KEY ) ? strtok($oQn->KEY,"_") : "QN".$oQn->QNID;
		$val = "";
		if ( $aReplies != null && count( $aReplies ) > 0 ) {
			$aReply = (array) $aReplies[0];
			$val = $aReply["VAL"];
			if ( !is_numeric($val) ) $val = "";
		}
		return '<input type="text" class="numeric" id="'.$sKey.'" name="'.$sKey.'" value="'.$val.'" />';
	}

	public static function saveQuestion( &$oQn, $aPost ) {
		$key = isset( $oQn->KEY ) ? $oQn->KEY : "QN".$oQn->QNID;
		if ( isset( $aPost[ $key ] ) ) {
			$oQn->SUBMIT = true;
			$oQn->REPLIES = array();
			$val = $aPost[ $key ];
			if ( strlen( $val ) == 0 ) {
				if ( isset( $oQn->FORMAT ) && isset( $oQn->FORMAT->REQUIRED ) ) {
					throw new MissingRequiredFieldException( "Required field ".$oQn->NAME." not populated!", $oQn->KEY );
				}
				return;
			}
			if ( $oQn->DATACLASS == "qcount" ) {
				$val = str_replace( array(",",'$'), "", $val );
				if ( !is_numeric( $val ) ) {
					throw new NonNumericDataException( "Only numeric values allowed for question ".$oQn->LABEL, $key );
				}
			}
			$oQn->REPLIES[] = array( "VAL"=>$val );
		}
	}

	public static function saveQyesno( &$oQn, $aPost ) {
		$key = isset( $oQn->KEY ) ? $oQn->KEY : "QN".$oQn->QNID;
		if ( isset( $aPost[ $key ] ) ) {
			$oQn->SUBMIT = true;
			$oQn->REPLIES = array();
			$val = $aPost[ $key ];
			if ( strlen( $val ) == 0 ) {
				if ( isset( $oQn->FORMAT ) && isset( $oQn->FORMAT->REQUIRED ) ) {
					throw new MissingRequiredFieldException( "Required field ".$oQn->NAME." not populated!", $oQn->KEY );
				}
				return;
			}
			$oQn->REPLIES[] = array( "VAL"=>$val, "LABEL"=>((int) $val==1?"Yes":"No") );
		}
	}

	public static function saveQlist( &$oQn, $aPost ) {
		$key = isset( $oQn->KEY ) ? $oQn->KEY : "QN".$oQn->QNID;
		$vList = $oQn->VALUELIST;
		if ( !isset( $aPost[ $key."-active" ] ) ) return; // post vars undefined
		
		$oQn->REPLIES = array();
		if ( isset( $aPost[ $key ] ) && (is_array($aPost[ $key ]) || strlen($aPost[ $key ])) ) {
			$ix = $aPost[ $key ];
			if ( is_array( $ix ) ) {
				foreach ( $ix as $ii ) {
					if ( isset( $vList[ $ii ] ) ) {
						$oVal = $vList[ $ii ];
						$oQn->REPLIES[] = array( "VAL"=>$oVal->VAL, "LABEL"=>$oVal->LABEL );
					}
				}
			} else if ( isset( $vList[ $ix ] ) ) {
				$oVal = $vList[ $ix ];
				$oQn->REPLIES[] = array( "VAL"=>$oVal->VAL, "LABEL"=>$oVal->LABEL );
			}
		}
		
		if ( isset( $oQn->FORMAT ) && isset( $oQn->FORMAT->REQUIRED ) && count($oQn->REPLIES)==0 ) {
			throw new MissingRequiredFieldException( "Required field ".$oQn->NAME." not populated!", $oQn->KEY );
		}
		$oQn->SUBMIT = true;
	}

	public static function saveQrating( &$oQn, $aPost ) {
		$key = isset( $oQn->KEY ) ? $oQn->KEY : "QN".$oQn->QNID;
		$vList = $oQn->VALUELIST;
		if ( !isset( $aPost[ $key."-active" ] ) ) return; // post vars undefined
		$oQn->REPLIES = array();
		if ( isset( $aPost[ $key ] ) && strlen($aPost[ $key ]) ) {
			$val = $aPost[ $key ];
			foreach ( $vList as $oVal ) {
				if ( $oVal->VAL == $val ) {
					$oQn->REPLIES[] = array( "VAL"=>$oVal->VAL, "LABEL"=>$oVal->LABEL );
					break;
				}
			}
		}
		if ( isset( $oQn->FORMAT ) && isset( $oQn->FORMAT->REQUIRED ) && count($oQn->REPLIES)==0 ) {
			throw new MissingRequiredFieldException( "Required field ".$oQn->NAME." not populated!", $oQn->KEY );
		}
		$oQn->SUBMIT = true;
	}

	public static function saveBreakdown( &$oQn, $aPost ) {
		$key = isset( $oQn->KEY ) ? $oQn->KEY : "QN".$oQn->QNID;
		$vList = $oQn->VALUELIST;
		$iSumTo = $oQn->SUMTO;
		$ix = 0;
		$iTotal = 0;
		if ( !isset( $aPost[ $key."_0" ] ) ) return; // post vars undefined
		$oQn->REPLIES = array();
		$bAllNull = true;
		while ( $ix < count($vList) ) {
			$vObj= $vList[ $ix ];
			$k = $key."_".$ix;
			$ix++;
			if ( isset( $aPost[ $k ] ) ) {
				$val = $aPost[ $k ];
				if ( strlen( $val ) > 0 ) $bAllNull = false;
				if ( strlen( $val ) == 0 ) continue;
				if ( !is_numeric( $val ) ) throw new NonNumericDataException( "Question ".$oQn->LABEL." (".$vObj->LABEL.") can only include numeric values", $k );
				$oQn->REPLIES[] = array( "VAL"=>$val, "LABEL"=>$vObj->LABEL );
				$iTotal+=$val;
			}
		}
		if ( isset( $oQn->FORMAT ) && isset( $oQn->FORMAT->REQUIRED ) && count($oQn->REPLIES)==0 ) {
			throw new MissingRequiredFieldException( "Required field ".$oQn->NAME." not populated!", $oQn->KEY."_0" );
		}
		$k = $key."_".$ix;
		/* Other! */
		
		if ( isset( $aPost[ $k ] ) ) {
			$val = $aPost[ $k ];
			if ( strlen( $val ) == 0 ) $val = 0;
			if ( !is_numeric( $val ) ) throw new NonNumericDataException( "Question ".$oQn->LABEL." (Other) can only include numeric values", $k );
			$oQn->REPLIES[] = array( "VAL"=>$val, "LABEL"=>"Other" );
			$iTotal+=$val;
		}
		if ( $bAllNull == true ) {
			/* if no data entered, do not submit the data but do not error check either */
			return;
		}
		if ( $iTotal != $iSumTo ) {
			throw new InvalidEntryException( "Sub-values of question ".(isset($oQn->NAME)?$oQn->NAME:$oQn->LABEL)." MUST sum to ".$iSumTo." (Currently they sum to ".$iTotal.").", $k );
		}
		$oQn->SUBMIT = true;
		//throw new MissingRequiredFieldException( "Question ".$oQn->NAME
		//throw new NonNumericDataException();
	}
}

?>
