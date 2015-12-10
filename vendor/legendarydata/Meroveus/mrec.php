<?php
/*
 * @filename mrec.php 
 * @description Core MRec class for manipulating Meroveus Recs in PHP
 * @author D.Feiveson
 * @created_at 20130716
 * @updated_at 
 */
class MInvalidRecException extends Exception {}

class MRec {

	public $Id;
	public $Name;

	private $aLabels;
	private $Sync;
	private $aVars;

	private $aHistory = array();

	public function ParseParamName( $k, $t ) {
		$ar = explode( "-", $k );
		$n = "";
		foreach ( $ar as $e ) {
			$n .= ucfirst( $e );
		}
		if ( $t != "static" && $t != "current" ) $n .= "_" . $t;
		return $n;
	}

	protected static function ParseSync( $sync ) {
		$aResp = array("facebook"=>array(), "linkedin"=>array(), "twitter"=>array() );
		if ( isset( $sync->facebook ) && is_array( $sync->facebook ) ) $aResp["facebook"] = $sync->facebook;
		if ( isset( $sync->twitter ) && is_array( $sync->twitter ) ) $aResp["twitter"] = $sync->twitter;
		if ( isset( $sync->linkedin ) && is_array( $sync->linkedin ) ) $aResp["linkedin"] = $sync->linkedin;
		return $aResp;
	}

	protected function LoadLabelData( $rec, $sCrux, $labels ) {
		return MeroveusClient::getMLabelData( $rec, $sCrux, $labels );
	}

	public function ToArray() {
		$aParams = array("Id","Name" );
		$aResponse = array();
		foreach ( $aParams as $sParam ) {
			$aResponse[$sParam] = $this->$sParam;
		}
		foreach ( $this->aVars as $sParam ) {
			$aResponse[$sParam] = $this->$sParam;
		}
		$aResponse["Html"] = $this->MakeIcon();
		return $aResponse;
	}

	public static function Retrieve( $iRecId, $sRecType, $oMero ) {
		$aResp = $oMero->retrieve( $iRecId, $sRecType );
		if ( !isset($aResp["REC"]->ID) ) {
			throw new MInvalidRecException("Invalid record ID.");	
		}
		$oRec = self::Load( $aResp["REC"], $aResp["LABELS"] );
		
		return $oRec;
	}

	public static function Load( $rec, $labels ) {
		$oRec = new MRec();
		$oRec->Id = $rec->ID;
		$oRec->Name = $rec->NAME;
		//$this->Address1 = MeroveusClient::getMData( $rec, "street-address_static" );
		//$this->Phone = MeroveusClient::getMData( $rec, "contact-phone_static" );
		//$this->City = MeroveusClient::getMData( $rec, "street-city_static" );
		//$this->State = MeroveusClient::getMLabelData( $rec, "street-state_static", $labels, "PostalCode" );
		//$this->ZipCode = MeroveusClient::getMData( $rec, "street-zip_static" );
		
		if ( isset($rec->SYNC) && is_object( $rec->SYNC ) ) {
			$oRec->Sync = self::ParseSync( $rec->SYNC );
		}

		//$this->FacebookId = MeroveusClient::getMSyncPrimary( $rec, "facebook" );
		//$this->TwitterId = MeroveusClient::getMSyncPrimary( $rec, "twitter" );
		//$this->LinkedInId = MeroveusClient::getMSyncPrimary( $rec, "linkedin" );
		//$this->StrataScoreId = MeroveusClient::getMSyncPrimary( $rec, "stratascore" );


		$oRec->aData = $rec->DATA;

		foreach ( $oRec->aData as $oData ) {
			$sCrux = $oData->KEY;
			$sKey = strtok( $sCrux, "_" );
			$sTime = strtok( "_" );
			
			$sVarName = $oRec->ParseParamName( $sKey, $sTime );
		
			$oRec->aVars[] = $sVarName;
			if ( isset( $oData->HISTORY ) ) {
				$oRec->History[$sVarName] = MeroveusClient::getMHistoryData( $rec, $sCrux );
				$val = self::lastValFromHistory( $oRec->History[$sVarName] );
				$oRec->$sVarName = MUtils::FormatNumeric( $sVarName, $val );
			} else if ( isset( $oData->LABELS ) ) {
				$oRec-$sVarName = $oRec->LoadLabelData( $rec, $sCrux, $labels );
			} else {
				$oRec->$sVarName = MeroveusClient::getMData( $rec, $sCrux );
			}
			
		}
		return $oRec;
		
	}

	protected static function GetStatVal( $oStat ) {
		if ( !is_array( $oStat ) && !is_object( $oStat ) ) return null;
		foreach ( $oStat as $dt => $val ) {
			return $val;
		}
	}

	protected static function lastValFromHistory( $aHist ) {
		$aHist = $aHist[0]->DATA;
		$oLast = @$aHist[ count( $aHist ) - 1 ];
		return self::GetStatVal( $oLast );
	}

	protected static function FormatNumeric( $key, $val ) {
		
		$val = self::NumberFormat( $val, 0);
		if ( substr( $key, -6 ) == "Volume" || substr( $key, -5 ) == "value" ) {
			$val = '$' . $val;
		}
		return $val;
	}

	public function MakeIcon( $selected="false") {
		$sIcon = '<li id="rec'.$this->Id.'" class="droppable'.($selected===true?' selected':'').'"><span class="dot"></span><label>'.$this->Name.'</label>';
		$sIcon .= '</li>';
		return $sIcon;
	}

	public function ExtractChartData($sKey) {
		if ( !isset( $this->History[$sKey] ) ) {
			//echo "no history for key: $sKey";
			return null;
		}
		
		if ( isset( $this->SubKeys ) ) {
			$aDt = array();
			
			for ( $i=1; $i<count( $this->History[$sKey] ); $i++ ) {
				$oSet = $this->History[$sKey][$i];
				if ( in_array( strtolower($oSet->SUBKEY), $this->SubKeys ) ) {
					foreach ( $oSet->DATA as $oItem ) {
						foreach ( $oItem as $dt => $val ) {
							if ( !isset( $aDt[ $dt ] ) ) $aDt[ $dt ] = 0;
							$aDt[ $dt ] += (1 * $val);
						}
					}
				}
			}
			$aData = array();
			foreach ( $aDt as $dt => $val ) {
				$aData[] = (object) array( $dt => $val );
			}
			return $aData;
		}
		if ( !is_array( $this->History[$sKey] ) || !isset($this->History[$sKey][0]) || !is_object( $this->History[$sKey][0] ) ) return null;
		
		// this returns the total for the channel
		return $this->History[$sKey][0]->DATA;
	}
}

?>
