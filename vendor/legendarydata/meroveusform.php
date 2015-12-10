<?php
require_once( "meroveuspoll.php" );

class MeroveusFormException extends Exception {
	public $Element;

	public function __construct($msg=null, $ele=null) {
		parent::__construct($msg);
		$this->Element = $ele;
	}
}
class MissingRequiredFieldException extends MeroveusFormException {}
class NonNumericDataException extends MeroveusFormException {}
class UnverifiedDataException extends MeroveusFormException {}
class InvalidEntryException extends MeroveusFormException {}
class UnfinishedJobException extends Exception {
	public $JobId;
	public $IncludesCreates;
	public function __construct($msg=null, $jobId=null, $includesCreates=false) {
		parent::__construct($msg);
		$this->JobId = $jobId;
		$this->IncludesCreates = $includesCreates;
	}
}

class MeroveusForm {

	protected $metaArray = array();
	protected $oMero;
	protected $labelLookupArray = array();
	protected $recArray = array();
	protected $fieldArray = array(); /* array of container fields */
	protected $iNewCounter = 0;

	protected $aSerializedRecIds = array();
	protected $aSerializedRecFields = array();

	protected $bEnforceRequiredSets = true;

	public $containerTargetUrl = '/simpleform';
	public $containerRemoveUrl = '/simpledelete';

	public $privacyText = null;

	public static $aContactFields = array( "work-email" );

	protected static $aRequiredFields = array(
		"Business"=>array( "firm-name_static" ),
		"Person"=>array( "first-name_static", "last-name_static" )
	);

	public function __construct($oMero) {
		$this->oMero = $oMero;
	}

	public function GetEKEY() {
		return $this->oMero->EKEY;
	}

	public function setEnforceRequiredSets( $bEnforce ) {
		$this->bEnforceRequiredSets = $bEnforce;
	}

	public function setNewRecCounter( $iCounter=0 ) {
		$this->iNewCounter = $iCounter;
	}

	protected static function IsRequiredFieldByRecTyp( $sKey, $sRecTyp="Business" ) {
		$ar = self::GetRequiredFieldsByRecTyp( $sRecTyp );
		return in_array( $sKey, $ar );
	}

	protected static function GetRequiredFieldsByRecTyp( $sRecTyp ) {
		if ( !isset( self::$aRequiredFields[ $sRecTyp ] ) ) return array();
		return self::$aRequiredFields[ $sRecTyp ];
	}

	protected static function existingContact( $oRec, $oRec2 ) {
		if ( !isset( $oRec->CONTACTS ) || !is_array( $oRec->CONTACTS ) ) return false;
		foreach ( $oRec->CONTACTS as $oContact ) {
			if ( $oContact->ID == $oRec2->ID ) return true;
		}
		return false;
	}

	public function setContacts( &$oRec, $aContactIds ) {
		if ( !is_array( $aContactIds ) || $aContactIds == null ) {
			throw new Exception( "Invalid array of contacts!" );
		}
		foreach ( $this->fieldArray as $oField ) {
			if ( $oField->TYP == "Person" ) {
				$oData = MeroveusClient::getMDataObj( $oRec, $oField->KEY );
				if ( $oData == null || !isset( $oData->SET ) || !is_object( $oData->SET ) ) continue;
				$aRecs = isset( $oData->SET->RECS ) ? $oData->SET->RECS : null;
				if ( $aRecs == null || !is_array( $aRecs ) ) continue;
				foreach ( $aRecs as $oRec2 ) {
					if ( in_array( $oRec2->ID, $aContactIds ) ) {
						if ( self::existingContact( $oRec, $oRec2 ) ) {
							$oRec2->SCONTACT = null;
						} else {
							$oRec2->SCONTACT = true;
						}
					} else {
						if ( !self::existingContact( $oRec, $oRec2 ) ) {
							$oRec2->SCONTACT = null;
						} else {
							$oRec2->SCONTACT = false;
						}
					}
				}
			}
		}
	}

	public function serialize() {
		$ar = array( "mero"=>array( 
			"host"=>MeroveusClient::$meroveus, 
			"akey"=>$this->oMero->AKEY, 
			"ekey"=>$this->oMero->EKEY ),
			"metaArray"=>$this->metaArray,
			"recArray"=>$this->recArray,
			"fieldArray"=>$this->fieldArray,
			"iNewCounter"=>$this->iNewCounter,
			"labelLookupArray"=>$this->labelLookupArray );
		return $ar;
	}

	public static function deserialize( $aData ) {
		MeroveusClient::$meroveus = $aData["mero"]["host"];
		$oMero = new MeroveusClient( $aData["mero"]["akey"], $aData["mero"]["ekey"] );
		$oForm = new MeroveusForm( $oMero );
		$oForm->metaArray = $aData["metaArray"];
		$oForm->labelLookupArray = $aData["labelLookupArray"];
		$oForm->recArray = $aData["recArray"];
		$oForm->fieldArray = $aData["fieldArray"];
		$oForm->iNewCounter = $aData["iNewCounter"];
		return $oForm;
	}

	public static function isBreak( $oField, $oNextField, $aRow ) {
		if ( count( $aRow ) == 3 ) return true;
		if ( is_object($oNextField) && isset($oNextField->KEY) && MeroveusClient::parseDataClass( $oNextField->KEY ) == "set" ) return true;
		if ( is_object($oField) && isset($oField->KEY) && MeroveusClient::parseDataClass( $oField->KEY ) == "set" ) return true;
		if ( isset( $oField->FORMAT ) && isset($oField->FORMAT->BREAKAFTER) ) return $oField->FORMAT->BREAKAFTER;
		return false;
	}

	public function parseReturnPath($iParentRecId, $src="REQUEST_URI") {
		//$sReferPath = $_SERVER["HTTP_REFERER"];
		$sPath = strtok( $_SERVER[ $src ], "?" );
		$sPath = str_replace( "/-1/", "/$iParentRecId/", $sPath );
		$pos = strpos( $sPath, $this->containerTargetUrl );
		if ( $pos !== false ) {
			//if ( $src=="HTTP_REFERER" ) {
				$pos += strlen( $this->containerTargetUrl );
			//} else {
			//	$pos--;
			//}
			$sAddStr = substr( $sPath, $pos );
			if ( isset( $_REQUEST["return"] ) ) {
				$sAddStr .= "|".$_REQUEST["return"];
			}
			return "?return=".$sAddStr;
		}
		return "";
	}

	protected static function buildContactChecker( $oRec, $aContacts, $editLink=null ) {
		if ( !isset( $aContacts ) || $aContacts == null || !is_array( $aContacts ) ) return "";
		$isContact = false;
		$hasEmail = false;
		foreach ( self::$aContactFields as $cfldKey ) {
			$e = MeroveusClient::getMData( $oRec, $cfldKey."_static" );
			if ( strlen( $e ) > 0 ) {
				$hasEmail = true;
				break;
			}
		}
		if ( !$hasEmail ) {
			if ( $editLink != null ) return $editLink;
			return "";
		}
		if ( isset( $oRec->SCONTACT ) ) {
			$isContact = $oRec->SCONTACT;
		} else {
			foreach ( $aContacts as $oContact ) {
				if ( $oContact->ID == $oRec->ID ) {
					$isContact = true;
					break;
				}
			}
		}
		$sHtml = '<label id="surveyme_'.$oRec->ID.'" class="surveyme'.($isContact?" iscontact":"").'"><input type="checkbox"'.($isContact?" checked":"").' /> Survey Me</label>';
		return $sHtml;
	}

	protected function renderSet( $iFieldId, $oDat, $iMetaId, $oParentRec, $iParentMetaId ) {
		$iParentId = $oParentRec->ID;
		$aRecs = isset( $oDat->SET ) && isset( $oDat->SET->RECS ) ? $oDat->SET->RECS : array();
		$sRemoveConfirm = isset( $this->removeConfirmFunc ) ? $this->removeConfirmFunc :'confirm( \'Remove record?\' )';
		$sEditConfirm = isset( $this->editConfirmFunc ) ? $this->editConfirmFunc : "";
		$sHtml = "";
		$aContacts = isset( $oParentRec->CONTACTS ) ? $oParentRec->CONTACTS : array();
		$isContactsZone = ( $iParentMetaId == 0 && $oDat != null && isset($oDat->SET) && $oDat->SET->RECTYP == "Person" );
		foreach ( $aRecs as $oRec ) {
			$this->registerRec( $oRec );
			$target = '/'.$iMetaId.'/'.$oRec->ID.'/'.$iParentId.'/'.$iParentMetaId."/".$iFieldId.$this->parseReturnPath($iParentId);
			//$sHtml .= '<li>';
			$sHtml .= '<tr>';
			if ( $isContactsZone ) {
				$sHtml .= '<td class="surveymeTd">'.self::buildContactChecker($oRec, $aContacts, '<a href="#" onClick="'.$sEditConfirm.'document.getElementById(\'submitForm\').action=\''.$this->containerTargetUrl.$target.'\';document.getElementById(\'submitForm\').submit();">Add Email</a>').'</td>';
			}
			$sHtml .= '<td>';
			$sHtml .= '<a class="removeFromSet button" href="#" onClick="if ( !'.$sRemoveConfirm.' ) return false; document.getElementById(\'submitForm\').action=\''.$this->containerRemoveUrl.$target.'\';document.getElementById(\'submitForm\').submit();">Remove</a><a href="#" class="button" onClick="'.$sEditConfirm.'document.getElementById(\'submitForm\').action=\''.$this->containerTargetUrl.$target.'\';document.getElementById(\'submitForm\').submit();">Edit</a><a href="#" onClick="document.getElementById(\'submitForm\').action=\''.$this->containerTargetUrl.$target.'\';document.getElementById(\'submitForm\').submit();">'.$oRec->NAME.'</a>';
			//$sHtml .='</li>' . "\n";
			$sHtml .= '</td></tr>' . "\n";
		}
		$sHtml = '<tbody>'.$sHtml.'</tbody>';
		//$sHtml = '<thead><tr>'.($isContactsZone?'<th>Survey Contact</th>':"").'<th></th></tr></thead>' . $sHtml;
		$sHtml = '<table class="setTable">'.$sHtml.'</table>' . "\n";
		if ( $isContactsZone ) {
			$sHtml = '<p>Please indicate any people below who should be contacted for future surveys by checking <u>survey me</u></p>' . $sHtml;
		}
		$target = $this->containerTargetUrl.'/'.$iMetaId.'/-1/'.$iParentId.'/'.$iParentMetaId."/".$iFieldId.$this->parseReturnPath($iParentId);
		$sHtml .= '<a class="button create" href="#" onClick="'.$sEditConfirm.'document.getElementById(\'submitForm\').action=\''.$target.'\';document.getElementById(\'submitForm\').submit();">Create New</a>';
		return $sHtml;
	}

	protected function getLabels( $sKey ) {
		if ( !isset( $this->labelLookupArray[ $sKey ] ) ) {
			$this->labelLookupArray[ $sKey ] = $this->oMero->getLabels( $sKey, "*", 500 );
		} 
		return $this->labelLookupArray[ $sKey ];
	}

	protected function renderLabels( $oField, $oDat ) {
		$sKey = $oField->KEY;
		$isMult = false;
		$sHtml = '<select name="'.$sKey.'[]"';
		if ( isset( $oField->MSELECT ) && $oField->MSELECT == true ) {
			$sHtml .= ' class="multiple" multiple';
			$isMult = true;
		}
		$sHtml .= '>';
		$oLabels = $this->getLabels( $sKey );
		$aLabels = $oLabels->LABELS;
		if ( !$isMult ) {
			$sHtml .= '<option value=""></option>' . "\n";
		}
		$aLabelIds = array();
		if ( $oDat != null && isset( $oDat->LABELIDS ) && is_array( $oDat->LABELIDS ) ) {
			$aLabelIds = $oDat->LABELIDS;
		}
		foreach ( $aLabels as $oLabel ) {
			$sHtml .= '<option value="'.$oLabel->LABELID.'"';
			if ( in_array( $oLabel->LABELID, $aLabelIds ) ) {
				$sHtml .= ' selected';
			}
			$sHtml .= '>' .$oLabel->NAME. '</option>' . "\n";
		}
		if ( count( $aLabels ) == 100 ) {
			$sHtml .= '<option value="more">  [more ...]  </option>' . "\n";
		}
		$sHtml .= '</select>';
		if ( $isMult ) {
			$sHtml .= "<p>Use ctrl-click to select multiple values</p>";
		}
		return $sHtml;
	}

	protected function LockedText( &$oField, $oRec, $oMeta ) {
		$sHtml = "";
		if ( $oField->NAME != null && strlen($oField->NAME) > 0 ) {
			$sHtml .= '<label>'.MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY );
			if ( isset( $oField->INFO ) ) {
				$sHtml .= $this->renderTooltip( $oField->INFO );
			}
			$sHtml .= '<span class="locked-icon"></span>';
			$sHtml .= '</label>';
		}
		$sDClass = MeroveusClient::parseDataClass( $oField->KEY );
		if ( $sDClass == "set" ) {
			$oDat = MeroveusClient::getMDataObj( $oRec, $oField->KEY );
			if ( isset( $oDat->SET->RECS ) && is_array($oDat->SET->RECS) ) {
				$sHtml .= '<ul class="locked-set">';
				foreach( $oDat->SET->RECS as $oItem ) {
					$sHtml .= '<li>'.$oItem->NAME.'</li>' . "\n";
				}
				$sHtml .= '</ul>';
			}
			return $sHtml;
		}
		$sVal = "";
		if ( $oField->TYP == "Label" ) {
			$oDat = MeroveusClient::getMDataObj( $oRec, $oField->KEY );
			$aAllLabels = $this->getLabels( $oField->KEY );
			$aLabelIds = array();
			if ( $oDat != null && isset( $oDat->LABELIDS ) && is_array( $oDat->LABELIDS ) ) {
				$aLabelIds = $oDat->LABELIDS;
			}
			if ( count( $aLabelIds ) > 0 ) {
				foreach ( $aAllLabels->LABELS as $oLabel ) {
					if ( in_array( $oLabel->LABELID, $aLabelIds ) ) {
						$sVal .= (strlen($sVal)>0?"; ":"") . $oLabel->NAME;
					}
				}
			}
		} else {
			$sVal = MeroveusClient::getMData( $oRec, $oField->KEY );
		}
		if ( strlen( $sVal ) > 0 && is_numeric( $sVal ) ) {
			$sVal = number_format( $sVal, 2 );
			if ( strpos( $oField->KEY, "price" ) ) {
				$sVal = '$' . $sVal;
			} else if ( strpos( $sVal, ".") !== false ) {
				$sVal = rtrim( $sVal, "0" );
				$sVal = rtrim( $sVal, "." );
			}
		}
		
		$sHtml .= '<div class="minos-locked-text">'.$sVal.'&nbsp;</div>';
		
		//$sHtml .= '<input type="hidden" name="'.$oField->KEY.'" value="'.htmlentities($sVal).'" />';
		return $sHtml;
	}

	protected function renderDate( $oField, $oDat ) {
		$aMonths = array(
			"01"=>"January",
			"02"=>"February",
			"03"=>"March",
			"04"=>"April",
			"05"=>"May",
			"06"=>"June",
			"07"=>"July",
			"08"=>"August",
			"09"=>"September",
			"10"=>"October",
			"11"=>"November",
			"12"=>"December"
		);
		$sVal = ( $oDat != null && isset( $oDat->VAL ) ? $oDat->VAL : "" );
		if ( strlen( $sVal ) > 0 ) {
			$sVal = strtok( $sVal, " " );
			$aVal = explode( "-", $sVal );
		} else {
			$aVal = array();
		}
		$yrVal = isset( $aVal[0] ) ? $aVal[0] : "";
		$mnVal = isset( $aVal[1] ) ? $aVal[1] : "";
		$dyVal = isset( $aVal[2] ) ? $aVal[2] : "";
		$sMonth = '<select id="'.$oField->KEY.'-month" class="month" onChange="ACBJ.setDate(\''.$oField->KEY.'\');">';
		$sMonth .= '<option></option>' . "\n";
		foreach ( $aMonths as $sVal => $sTxt ) {
			$sMonth .= '<option value="'.$sVal.'"';
			if ( $sVal == $mnVal ) $sMonth .= ' selected';
			$sMonth .= '>'.$sTxt.'</option>' . "\n";
		}
		$sMonth .= '</select>';
		$sDay = '<select id="'.$oField->KEY.'-day" class="day" onChange="ACBJ.setDate(\''.$oField->KEY.'\');">';
		$sDay .= '<option></option>' . "\n";		
		for ( $d=1; $d<=31;$d++ ) {
			$dy = strlen( $d ) == 1 ? "0" . $d : $d;
			$sDay .= '<option value="'.$dy.'"';
			if ( $dy == $dyVal ) $sDay .= ' selected';
			$sDay .= '>'.$dy.'</option>' . "\n";
		}
		$sDay .= '</select>';
		$sYear = '<select id="'.$oField->KEY.'-year" class="year" onChange="ACBJ.setDate(\''.$oField->KEY.'\');">';
		$currYr = date( "Y", mktime() );
		$sYear .= '<option></option>' . "\n";
		for ( $yr = $currYr+10; $yr > $currYr - 220; $yr-- ) {
			$sYear .= '<option value="'.$yr.'"';
			if ( $yr == $yrVal ) $sYear .= ' selected';
			$sYear .= '>'.$yr.'</option>' . "\n";
		}
		$sYear .= '</select>';
		$sHtml = '<div class="dateField">' . $sMonth . $sDay . $sYear . '</div>';
		$sHtml .= '<input type="hidden" class="dateValue" value="" id="'.$oField->KEY.'" name="'.$oField->KEY.'" />';
		return $sHtml;
	}

	public function registerSet( &$oSet ) {
		if ( !isset( $oSet->RECS ) ) return;
		foreach ( $oSet->RECS as $oRec ) {
			$this->registerRec( $oRec, true );
		}
	}

	public function registerRec( &$oRec, $bRecursive=false ) {
		$this->recArray[ $oRec->ID ] = $oRec;
		if ( $bRecursive && isset( $oRec->DATA ) ) {
		foreach ( $oRec->DATA as $oData ) {
			if ( isset( $oData->SET->RECS ) ) {
				foreach ( $oData->SET->RECS as $rec ) {
					if ( !isset( $this->recArray[ $rec->ID ] ) ) {
						$this->registerRec( $rec, true );
					}
				}
			}
		}
		}
	}

	public function registerMeta( &$oMeta ) {
		if ( isset( $oMeta->registerId ) ) {
			return $oMeta->registerId;
		}
		$this->metaArray[] = $oMeta;
		$oMeta->registerId = count( $this->metaArray ) - 1;
		return $oMeta->registerId;
	}

	public function registerField( &$oField ) {
		if ( isset( $oField->registerId ) ) {
			return $oField->registerId;
		}
		$this->fieldArray[] = $oField;
		$oField->registerId = count( $this->fieldArray ) - 1;
		return $oField->registerId;
	}

	public function newRec($sRecTyp) {
		$this->iNewCounter++;
		$sJson = '{"ID":"TMP'.$this->iNewCounter.'", "RECTYP":"'.$sRecTyp.'"}';
		$oRec = json_decode( $sJson );
		$this->registerRec( $oRec );
		return $oRec;
	}

	public function LoadRec( $iRecId, $sRecTyp=null ) {
		if ( isset( $this->recArray[ $iRecId ] ) ) {
			return $this->recArray[ $iRecId ];
		}
		return ($sRecTyp==null?null:$this->newRec($sRecTyp));
	}

	public function LoadMeta( $iMetaId ) {
		if ( isset( $this->metaArray[ $iMetaId ] ) ) {
			return $this->metaArray[ $iMetaId ];
		}
		return null;
	}

	public function LoadField( $iFieldId ) {
		if ( isset( $this->fieldArray[ $iFieldId ] ) ) {
			return $this->fieldArray[ $iFieldId ];
		} else if ( !is_numeric( $iFieldId ) ) {
			foreach ( $this->fieldArray as $oField ) {
				if ( isset( $oField->KEY ) && $oField->KEY == $iFieldId ) {
					return $oField;
				}
			}
		}
		return null;
	}

	protected static function formNumberFormat( $str ) {
		if ( $str == null || !is_numeric( $str ) ) return $str;
		$f = number_format( $str, 2 );
		$f = str_replace( ".00", "", $f );
		return $f;
	}

	protected function getNumericClass( $sKey ) {
		$sDClass = MeroveusClient::parseDataClass( $sKey );
		$sClass = "numeric";
		if ( in_array( $sDClass, array( "volume", "price" ) ) ) {
			$sClass .= " currency";
		} else if ( $sDClass == "year" ) {
			$sClass .= " year";
		}
		return $sClass;
	}

	protected function renderSetCreateLabel( $oField ) {
		return "Create New ".$oField->TYP;
	}

	protected function renderSetRecLink( $oRec, $sEditOnClick ) {
		return '<a href="#" class="button surveyme-name" onClick="'.$sEditOnClick.'">'.$oRec->NAME.'</a>';
	}

	protected static function renderTooltip( $sText ) {
		$sHtml = '<p class="tooltip hint--right" data-hint="'.htmlentities($sText).'"><img src="/images/help21.png"></p>';
		return $sHtml;
	}

	public function renderField( &$oField, $oRec, $oMeta ) {
		if ( isset( $oField->FORMAT->HIDE ) && $oField->FORMAT->HIDE === true ) {
			return "";
		} else if ( isset( $oField->FORMAT->LOCK ) && $oField->FORMAT->LOCK === true ) {
			return $this->LockedText( $oField, $oRec, $oMeta );
		}
		if ( $oField->TYP == "Instructions" ) {
			$sHtml = '<p class="instructions">'.$oField->NAME.'</p>';
		} else if ( $oField->TYP == "Poll" ) {
			$isRequired = isset( $oField->FORMAT ) && isset( $oField->FORMAT->REQUIRED ) ? $oField->FORMAT->REQUIRED : false;
			$sHtml = '<div class="field poll-question'.($isRequired?" required":"").'">';
			$sHtml .= '<label>'.MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY );		
			if ( isset( $oField->INFO ) ) {
				$sHtml .= self::renderTooltip( $oField->INFO );
			}
			$sHtml .= '</label>';
			$sHtml .= MeroveusPoll::buildInput( $oField, $oRec );
			$sHtml .= '</div>';
		} else {
			$isRequired = isset( $oField->FORMAT ) && isset( $oField->FORMAT->REQUIRED ) ? $oField->FORMAT->REQUIRED : false;
			$reqAr = self::GetRequiredFieldsByRecTyp( $oRec->RECTYP );
			if ( in_array( $oField->KEY, $reqAr ) ) {
				$isRequired = true;
			}
			$sDClass = MeroveusClient::parseDataClass( $oField->KEY );
			if ( $sDClass == "set" ) {
				$sHtml = '<div class="set'.($isRequired?" required":"").'">';
				$sHtml .= '<label>'.MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY );
				if ( isset( $oField->INFO ) ) {
					$sHtml .= self::renderTooltip( $oField->INFO );
				}
				$sHtml .= '</label>';
				$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
				$this->registerMeta( $oField->META );
				$iFieldId = $this->registerField( $oField );
				$sHtml .= $this->renderSet( $iFieldId, $oDat, $oField->META->registerId, $oRec, $oMeta->registerId );
			} else {
				$sHtml = '<div class="field'.($isRequired?" required":"").'">';
				$sHtml .= '<label>'.MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY );			
				if ( isset( $oField->INFO ) ) {
					$sHtml .= self::renderTooltip( $oField->INFO );
				}
				$sHtml .= '</label>';
				if ( $oField->TYP == "Formula" ) {
					$sHtml .= '<p class="formula">Automatically calculated</p>';
				} else if ( $oField->TYP == "Label" ) {
					$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$sHtml .= $this->renderLabels( $oField, $oDat );
				} else if ( $oField->TYP == "Date" ) {
					$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$sHtml .= $this->renderDate( $oField, $oDat );
				} else if ( $sDClass == "range" ) {
					$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$from = isset( $oDat->FROM ) && is_numeric( $oDat->FROM ) ? $oDat->FROM : "";
					if ( $from != "" ) $from = self::formNumberFormat( $from );
					$to = isset( $oDat->TO ) && is_numeric( $oDat->TO ) ? $oDat->TO : "";
					if ( $to != "" ) $to = self::formNumberFormat( $to );
					$sHtml .= '<div class="range"><input id="'.$oField->KEY.'" type="text" name="'.$oField->KEY.'-from" value="'.$from.'" /> to <input type="text" name="'.$oField->KEY.'-to" value="'.$to.'" /></div>';
				} else {
					$val = MeroveusClient::GetMData( $oRec, $oField->KEY );
					if ( $val == null ) $val = "";
					if ( $sDClass == "blob" || $sDClass == "market" ) {
						$sHtml .= '<textarea id="'.$oField->KEY.'" name="'.$oField->KEY.'">'.$val.'</textarea>';
					} else if ( $sDClass == "yesno" ) {
						$sHtml .= '<select id="'.$oField->KEY.'" name="'.$oField->KEY.'">';
						$sHtml .= '<option value=""></option>';
						$sHtml .= '<option value="Y"'.($val=="Y"?" selected":"").'>Yes</option>';
						$sHtml .= '<option value="N"'.($val=="N"?" selected":"").'>No</option>';
						$sHtml .= '</select>';
					} else if ( isset( $oField->VALUELIST ) && is_array( $oField->VALUELIST ) ) {
						$aVList = $oField->VALUELIST;
						$sHtml .= '<ul class="valuelist" field-key="'.$oField->KEY.'">';
						$aVal = explode( "; ", $val );
						$sInpTyp = ( isset( $oField->MSELECT ) && $oField->MSELECT == 1 ? "checkbox" : "radio" );
						foreach ( $aVList as $oItem ) {
							$sLabel = isset( $oItem->LABEL ) && strlen( $oItem->LABEL ) > 0 ? $oItem->LABEL : $oItem->VAL;
							$sHtml .= '<li class="vlItem">';
							$sHtml .= '<input name="'.$oField->KEY.'_checker" type="'.$sInpTyp.'" value="'.$oItem->VAL.'"';
							if ( in_array( $oItem->VAL, $aVal ) ) {
								$sHtml .= ' checked';
							}
							$sHtml .= ' />';
							$sHtml .= '<label>'.$sLabel.'</label>';
							$sHtml .= '</li>';
						}
						$sHtml .= '</ul>';
						$sHtml .= '<input type="hidden" id="'.$oField->KEY.'" name="'.$oField->KEY.'" />';
					} else {
						if ( $oField->TYP=="Numeric" && is_numeric( $val ) && $sDClass != "year" ) {
							$val = self::formNumberFormat( $val );
						}
						$sHtml .= '<input id="'.$oField->KEY.'" class="'.( $oField->TYP=="Numeric" ? "numeric" : "") . '" type="text" name="'.$oField->KEY.'" value="'.htmlentities($val).'" />';
					}
				}
				
			}
			$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
			if ( isset( $oField->FORMAT ) ) {
				if ( isset( $oField->FORMAT->VERIFY ) ) {
					//$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$isChecked = ( $oDat != null && isset( $oDat->VERIFIED ) && $oDat->VERIFIED === true ? " checked" : "" );
					$sHtml .= '<p class="verification"><input type="checkbox" name="'.$oField->KEY.'-verify" value="1"'.$isChecked.' /> Verify that the above is correct</p>';
				}
				if ( isset( $oField->FORMAT->PRIVACY ) ) {
					//$oDat = MeroveusClient::GetMDataObj( $oRec, $oField->KEY );
					$isChecked = ( $oDat != null && isset( $oDat->PRIVATE ) && $oDat->PRIVATE === true ? " checked" : "" );
					$sHtml .= '<div class="privacyOptionWrapper"><input type="checkbox" name="'.$oField->KEY.'-privacy" value="1"'.$isChecked.' /> Preferred private';
					if ( $this->privacyText != null ) {
						$sHtml .= self::renderTooltip( $this->privacyText );
					}
					$sHtml .= '</div>';
				}
			} else if ( isset($oDat->PRIVATE) && $oDat->PRIVATE === true ) {
				$sHtml .= '<input type="hidden" name="'.$oField->KEY.'-privacy" value="1" />';
			}
			if ( isset( $oDat->FOOTNOTE ) && is_object( $oDat->FOOTNOTE ) && isset( $oDat->FOOTNOTE->TEXT ) && strlen( $oDat->FOOTNOTE->TEXT ) > 0 ) {
				$sHtml .= '<input type="hidden" name="'.$oDat->KEY.'-footnote" value="'.htmlentities($oDat->FOOTNOTE->TEXT).'" />';
			}
			$sHtml .= '</div>';
		}
		return $sHtml;
	}

	public function saveField( &$oField, $oRec, $oMeta, $aFormData=null ) {
		if ( $aFormData == null ) {
			$aFormData = $_POST;
		}
		if ( isset( $oField->FORMAT->HIDE ) || isset( $oField->FORMAT->LOCK ) ) {
			return;
		}
		if ( $oField->TYP == "Instructions" ) {
			return;
		}
		try {
			$sDClass = MeroveusClient::parseDataClass( $oField->KEY );
			$oData = new stdClass;
			$oData->KEY = $oField->KEY;
			$isRequired = isset( $oField->FORMAT ) && isset( $oField->FORMAT->REQUIRED ) ? $oField->FORMAT->REQUIRED : false;
			
			$reqAr = self::GetRequiredFieldsByRecTyp( $oRec->RECTYP );
			if ( in_array( $oField->KEY, $reqAr ) ) {
				$isRequired = true;
			}
			if ( $sDClass == "set" ) {
				if ( $this->bEnforceRequiredSets ) {
				$oDataObj = MeroveusClient::getMDataObj( $oRec, $oField->KEY );
				if ( $isRequired ) {
					
					$aRecs = array();
					if ( isset( $oDataObj->SET ) && is_object( $oDataObj->SET ) && isset( $oDataObj->SET->RECS ) && is_array( $oDataObj->SET->RECS ) ) {
						$aRecs = $oDataObj->SET->RECS;
					}
					if ( count( $aRecs ) == 0 ) {
						throw new MissingRequiredFieldException();
					}
				}
				if ( isset( $oField->FORMAT ) && isset( $oField->FORMAT->VERIFY ) ) {
					if ( isset( $aFormData[ $oField->KEY . "-verify" ] ) 
						&& $aFormData[ $oField->KEY . "-verify" ] == 1 ) {
						$oDataObj->VERIFIED = true;
						MeroveusClient::SetMDataObj( $oRec, $oDataObj );
					} else {
						throw new UnverifiedDataException();
					}
				}
				}
				return;
			} else {
				if ( $oField->TYP == "Poll" ) {
					if ( !isset( $oRec->POLL ) ) {
						$oRec->POLL = new MeroveusPoll();
					} else if ( !($oRec->POLL instanceof MeroveusPoll) ) {
						$oRec->POLL = new MeroveusPoll( $oRec->POLL ); 
					}
					$oRec->POLL->registerQuestion( $oField );
					return;
				} else if ( $oField->TYP == "Label" ) {
					$val = isset( $aFormData[ $oField->KEY ] ) ? $aFormData[ $oField->KEY ] : array();
					if ( !is_array( $val ) ) $val = array();
					$cleanVal = array();
					/* ensure no string-like values in LABELIDS:[] */
					foreach ( $val as $v ) {
						if ( strlen($v) == 0 || !is_numeric( $v ) ) continue;
						$cleanVal[] = $v;
					}
					if ( $isRequired && count( $cleanVal ) == 0 ) {
						throw new MissingRequiredFieldException();
					}
					$oData->LABELIDS = $cleanVal;
				} else if ( $sDClass == "range" ) {
					$from = isset( $aFormData[ $oField->KEY ."-from" ] ) ? $aFormData[ $oField->KEY ."-from" ] : null;
					if ( $from != null ) $from = str_replace( array('$',","), "", $from );
					$to = isset( $aFormData[ $oField->KEY ."-to" ] ) ? $aFormData[ $oField->KEY ."-to" ] : null;
					if ( $to != null ) $to = str_replace( ",", "", $to );
					if ( $from != null && strlen( $from ) > 0 && !is_numeric( $from ) ) {
						throw new NonNumericDataException();
					}
					if ( $to != null && strlen( $to ) > 0 && !is_numeric( $to ) ) {
						throw new NonNumericDataException();
					}	
					$oData->FROM = $from;
					$oData->TO = $to;
				} else {
					$val = isset( $aFormData[ $oField->KEY ] ) ? $aFormData[ $oField->KEY ] : "";
					if ( $oField->TYP == "Numeric" ) {
						$val = str_replace( array('$',","), "", $val );
					}
					$oData->VAL = $val;
					if ( $oField->TYP == "Date" && strtotime($val) == null ) {
						$val = "";
					}
					if ( $isRequired && strlen( $val ) == 0 ) {
						throw new MissingRequiredFieldException();
					}
					if ( strlen( $val ) > 0 && $oField->TYP == "Numeric" && !is_numeric( $val ) ) {
						throw new NonNumericDataException();
					}
					
				}
				
			}
			if ( isset( $oField->FORMAT ) ) {
				if ( isset( $oField->FORMAT->VERIFY ) ) {
					if ( isset( $aFormData[ $oField->KEY . "-verify" ] ) 
					&& $aFormData[ $oField->KEY . "-verify" ] == 1 ) {
						$oData->VERIFIED = true;
					} else {
						throw new UnverifiedDataException();
					}
				}
				if ( isset( $oField->FORMAT->PRIVACY ) ) {
					if ( isset( $aFormData[ $oField->KEY . "-privacy" ] ) 
					&& $aFormData[ $oField->KEY . "-privacy" ] == 1 ) {				
						$oData->PRIVATE = true;
					}
				}

			} else if ( isset( $aFormData[ $oField->KEY . "-privacy" ] ) 
					&& $aFormData[ $oField->KEY . "-privacy" ] == 1 ) {
				$oData->PRIVATE = true;
			}
			if ( isset( $aFormData[ $oField->KEY . "-footnote" ] ) && strlen($aFormData[ $oField->KEY . "-footnote" ]) > 0  ) {
				$oData->FOOTNOTE = new stdClass;
				$oData->FOOTNOTE->TEXT = $aFormData[ $oField->KEY . "-footnote" ];
			}
			MeroveusClient::SetMDataObj( $oRec, $oData );
		} catch ( MissingRequiredFieldException $e ) {
			$sName = (isset( $oRec->NAME ) ? $oRec->NAME . ": " : "");
			throw new MeroveusFormException( $sName . "Required field ".MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY )." not populated!", $oField->KEY );
		} catch ( NonNumericDataException $e ) {
			$sName = (isset( $oRec->NAME ) ? $oRec->NAME . ": " : "");
			throw new MeroveusFormException( $sName . "Numeric field ".MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY )." must be submitted as a number (no commas, dollar signs, letters)!", $oField->KEY );
		} catch ( UnverifiedDataException $e ) {
			$sName = (isset( $oRec->NAME ) ? $oRec->NAME . ": " : "");
			throw new MeroveusFormException( $sName . MeroveusClient::mergeLabel( $oField->NAME, $oField->KEY )." must be verified!", $oField->KEY );
		}
	}

	public static function renderRow( $aRow ) {
		$sHtml = "";
		$aSpan = array(100,6);
		switch ( count($aRow) ) {
			case 2:
			$aSpan = array(50,3);
			break;

			case 3:
			$aSpan = array(33,2);
			break;

			default:
			$aSpan = array(100,6);
			break;
			
		}
		foreach ($aRow as $sHtm ) {
			$sHtml .= '<td colspan="'.$aSpan[1].'" class="colspan'.$aSpan[0].'" style="width:'.$aSpan[0].'%">' . $sHtm .'</td>';
		}
		return '<tr>'.$sHtml.'</tr>' . "\n";
	}

	public function fromMeta( &$oMeta, &$oRec ) {
		$this->registerMeta( $oMeta );
		
		$this->registerRec( $oRec );
		$sHtml = "";
		$aRow = array();
		/*echo '<pre>';
		print_r( $oMeta->FIELDS );
		echo '</pre>';
		exit();*/
		foreach ($oMeta->FIELDS as $ii => $oField ) {
			$aRow[] = $this->renderField( $oField, $oRec, $oMeta );
			$oNextField = isset( $oMeta->FIELDS[ $ii + 1 ] ) ?  $oMeta->FIELDS[ $ii + 1 ] : null;
			if ( self::isBreak($oField, $oNextField, $aRow) ) {
				$sHtml .= self::renderRow( $aRow );
				$aRow = array(); //clear the row
			}
		}
		if ( count( $aRow ) ) {
			$sHtml .= self::renderRow( $aRow );
		}
		return '<table>'.$sHtml.'</table>';
	}

	public function forceSaveMeta( $oMeta, &$oRec, $aFormData=null ) {
		foreach ($oMeta->FIELDS as $ii => $oField ) {
			try {
				$this->saveField( $oField, &$oRec, $oMeta, $aFormData );
			} catch ( Exception $e ) {
				continue;
			}
		}
		if ( isset( $oRec->POLL ) && $oRec->POLL != null && $oRec->POLL instanceof MeroveusPoll ) {
			try {
				$oRec->POLL->parseFormData( $aFormData );
			} catch ( Exception $e ) {
				//do nothing
			}
			$oRec->POLL = $oRec->POLL->serialize();
		}
		$oRec->NAME = MeroveusClient::parseRecName( $oRec );
	}

	public function saveMeta( $oMeta, &$oRec, $aFormData=null ) {
		foreach ($oMeta->FIELDS as $ii => $oField ) {
			$this->saveField( $oField, &$oRec, $oMeta, $aFormData );
		}
		if ( isset( $oRec->POLL ) && $oRec->POLL != null && $oRec->POLL instanceof MeroveusPoll ) {
			$oRec->POLL->parseFormData( $aFormData );
			$oRec->POLL = $oRec->POLL->serialize();
		}
		$oRec->NAME = MeroveusClient::parseRecName( $oRec );
	}

	private function resetSerializer() {
		$this->aSerializedRecIds = array();
		$this->aSerializedRecFields = array();
	}

	private function setAsSerializedRecField( $sRecId, $sFieldKey ) {
		if ( !isset( $this->aSerializedRecFields[ $sRecId ] ) ) $this->aSerializedRecFields[ $sRecId ] = array();
		$this->aSerializedRecFields[ $sRecId ][$sFieldKey] = true;
	}

	private function isSerializedRecField( $sRecId, $sFieldKey, $sRecTyp ) {
		 if ( self::IsRequiredFieldByRecTyp( $sFieldKey, $sRecTyp ) ) return false;
		return isset( $this->aSerializedRecFields[ $sRecId ][$sFieldKey] );
	}

	private function isSerializedRec( $sRecId ) {
		return in_array( $sRecId, $this->aSerializedRecIds );
	}

	private function setAsSerialized( $sRecId ) {
		$this->aSerializedRecIds[] = $sRecId;
	}

	public function serializeSet( $oSet ) {
		$oNewSet = new stdClass;
		$oNewSet->RECTYP = $oSet->RECTYP;
		$aRecs = array();
		if ( isset( $oSet->RECS ) && is_array( $oSet->RECS ) ) {
		
		foreach ( $oSet->RECS as $oRec ) {
			//echo "rec id = " . $oRec->ID;
			$oRecRegistered = $this->LoadRec( $oRec->ID );
			//echo "serialize: ". $oRec->ID;
			$oRec = ( $oRecRegistered != null ? $oRecRegistered : $oRec );
			$aData = array();
			//$this->setAsSerialized( $oRec->ID );
			if ( isset( $oRec->DATA ) && is_array( $oRec->DATA ) ) {
			foreach ( $oRec->DATA as $oData ) {
				if ( $oData == null || !isset( $oData->KEY ) ) continue;
				$dClass = MeroveusClient::parseDataClass( $oData->KEY );
				//echo $dClass; continue;
				
				if ( $dClass == "set" ) {
					if ( $this->isSerializedRecField( $oRec->ID, $oData->KEY, $oRec->RECTYP ) ) {
						continue;
					}
					$this->setAsSerializedRecField( $oRec->ID, $oData->KEY );
					if ( !isset($oData->SET) || 
						!is_object($oData->SET) || 
						$oData->SET == null ) {
						continue;
					} else {
						$oData->SET = $this->serializeSet( $oData->SET );
					}
				}
				$aData [] = $oData;
			}
			}
			
			$oRec2 = new stdClass;
			$oRec2->ID = $oRec->ID;
			$oRec2->RECTYP = $oRec->RECTYP;
			if ( isset( $oRec->AlreadySaved ) ) {
				$oRec2->AlreadySaved = $oRec->AlreadySaved;
			}
			if ( isset( $oRec->SYNC ) ) {
				$oRec2->SYNC = $oRec->SYNC;
			}
			if ( isset( $oRec->POLL ) ) {
				$oRec2->POLL = $oRec->POLL;
			}
			if ( isset( $oRec->CONTACTS ) ) {
				$oRec2->CONTACTS = $oRec->CONTACTS;
			}
			if ( isset( $oRec->SCONTACT ) ) {
				$oRec2->SCONTACT = $oRec->SCONTACT;
			}
			if ( isset( $oRec->LABELIDS ) ) {
				$oRec2->LABELIDS = $oRec->LABELIDS;
			}
			$oRec2->DATA = $aData;
			$oRec2->NAME = MeroveusClient::parseRecName( $oRec2 );
			$aRecs [] = $oRec2;
		}
		}
		if ( count( $aRecs ) > 0 ) {
			$oNewSet->RECS = $aRecs;
		}
		return $oNewSet;
	}

	public function serializeData( $oTopSet ) {
		$this->resetSerializer();
		$oTopSet = $this->serializeSet( $oTopSet );
		return $oTopSet;
	}
}
?>
