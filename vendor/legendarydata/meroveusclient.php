<?php
/*
 * @filename meroveusclient.php
 * @description Core MeroveusClient class for communicating with a Meroveus instance from PHP
 * @author D.Feiveson
 * @created_at 20111001
 * @updated_at 20111005
 */
include( "Meroveus/mutils.php" );
include( "Meroveus/mrec.php" );
include( "Meroveus/mrecs.php" );

class MeroveusDuplicateMDataException extends Exception {}
class MeroveusSyntaxException extends Exception {}

class MeroveusClient {
	/* Special class to be available inside Sugar Research Module that provides various methods required for synchronizing data inside
	 * Meroveus with data inside Sugar (specifically, utilities for mapping Account and Contact data to corresponding RECs inside Meroveus */
	public static $meroveus; // THE HOST URL OF THE MEROVEUS INSTANCE
	public static $meroveusRoot; // THE ROOT HOST *:8080
	public $AKEY;
	public $EKEY;
	public static $meroveusRootKey;

	private $LISTID;
	private $TIMEFRAME;

	private $latitude;
	private $longitude;

	private static $aRecs = array();

	private $aManualSort = null;
	private $sSortHistory = null;

	private static $iTmpId = 0;

	private static $bExposePrivateData = false;


	public function __construct( $aKey=null, $eKey=null ) {
		$this->AKEY = $aKey;
		$this->EKEY = $eKey;
		$this->TIMEFRAME = date( "Y", mktime() );
	}

	public static function loadRec( $oRec ) {
		if ( isset( self::$aRecs[ $oRec->ID ] ) ) {
			return self::$aRecs[ $oRec->ID ];
		} else {
			self::$aRecs[ $oRec->ID ] = $oRec;
		}
		return $oRec;
	}

	public static function setExposePrivateData( $on=true ) {
		self::$bExposePrivateData = $on;
	}

	/* 20140409 tdf added following static methods for traversing a set of records and ensuring that summarized
	 * recs get fully fleshed out references to complete DATA */

	private static function traverseData( &$oRec ) {
		$aDat = isset( $oRec->DATA ) ? $oRec->DATA : array();
		foreach ( $aDat as $oDat ) {
			if ( isset( $oDat->SET ) ) {
				self::traverseSet( $oDat->SET );
			}
		}
	}

	/* 20140930 tdf added method to reset the local cache of recs returned from a search mode, to be called before
	 * traversing sets when multiple lists are built in sequence
	 ***************************************************************************/
	public static function resetRecCache() {
		self::$aRecs = array();
	}

	private static function mergeData( &$oRecMaster, $oRecAppend=null ) {
		$aDat = isset( $oRecMaster->DATA ) ? $oRecMaster->DATA : array();
		$aDat2 = $oRecAppend != null && isset( $oRecAppend->DATA ) ? $oRecAppend->DATA : array();
		foreach ( $aDat2 as $oDat ) {
			if ( isset( $oDat->SET ) ) {
				self::traverseSet( $oDat->SET );
			}
			try {
				foreach ( $aDat as $oDat0 ) {
					if ( $oDat0->KEY == $oDat->KEY ) {
						throw new MeroveusDuplicateMDataException();
					}
				}
				$aDat[]=$oDat;
			} catch ( MeroveusDuplicateMDataException $e ) {
				continue;
			}
		}
		$oRecMaster->DATA = $aDat;
	}

	private static function traverseRec( &$oRec ) {
		if ( isset( self::$aRecs[ $oRec->ID ] ) ) {
			$oRecExist = self::$aRecs[ $oRec->ID ];
			self::mergeData( $oRecExist, $oRec );
			$oRec = $oRecExist;
		} else {
			self::traverseData( $oRec );
			self::$aRecs[ $oRec->ID ] = $oRec;
		}
		//if ( !isset( $oRec->ID ) ) print_r( $oRec );
	}

	public static function traverseSet( &$oSet ) {
		if ( $oSet == null || !isset( $oSet->RECS ) || !is_array( $oSet->RECS ) ) return;
		$aRecs = $oSet->RECS;
		$aRecsNew = array();
		foreach ( $aRecs as $oRec ) {
			if ( !is_numeric( $oRec->ID ) ) self::applyTmpId( $oRec->ID );
			self::traverseRec( $oRec );
			$aRecsNew [] = $oRec;
		}
		$oSet->RECS = $aRecsNew;
	}

	public static function getNewRecCounter() {
		return self::$iTmpId;
	}

	private static function applyTmpId( $sId ) {
		if ( is_numeric( $sId ) || strpos( $sId, "TMP" ) === false ) return;
		$iId = str_replace( "TMP", "", $sId."" ) * 1;
		self::$iTmpId = max( self::$iTmpId, $iId );
	}

	/* end traverse methods */

	public static function parseDataClass( $sKey ) {
		try {
			$ar = explode( "-", strtok( $sKey, "_" ) );
			return $ar[ count($ar) - 1 ];
		} catch ( Exception $e ) {
			return null;
		}
	}

	public static function isContainerField( $oField ) {
		if ( !isset( $oField->KEY ) ) return false;
		$sDClass = self::parseDataClass( $oField->KEY );
		return ( $sDClass == "set" );
	}

	public static function mergeLabel( $sLabel, $sKey ) {
		strtok( $sKey, "_" );
		if ( !( $tf = strtok( "_" ) ) ) return $sLabel;
		$ar = explode( "-", $tf );
		if ( count( $ar ) == 1 && !is_numeric( $ar[0] ) ) return $sLabel;
		$y = $ar[0];
		$m = isset( $ar[1] ) ? $ar[1] : "";
		$d = isset( $ar[2] ) ? $ar[2] : "";
		$sLabel = str_replace( array( "[Y]", "[M]", "[D]" ), array( $y, $m, $d ), $sLabel );
		$sLabel = str_replace( array( "@Y@", "@M@", "@D@" ), array( $y, $m, $d ), $sLabel );
		$sLabel = str_replace( "@X@", $tf, $sLabel );
		return $sLabel;
	}

	public static function SupportedHistoryOptions() {
		return array(
			array( "value"=>"-1 day", "name"=>"1 Day", "range"=>1 ),
			array( "value"=>"-1 week", "name"=>"1 Week", "range"=>7 ),
			array( "value"=>"-2 weeks", "name"=>"2 Weeks", "range"=>14 ),
			array( "value"=>"-1 month", "name"=>"1 Month", "range"=>31 ),
			array( "value"=>"-3 months", "name"=>"3 Months", "range"=>90 ),
			array( "value"=>"-6 months", "name"=>"6 Months", "range"=>180 )
		);
	}

	public function setListId( $listId ) {
		$this->LISTID = $listId;
	}

	public function setLatLong( $lat, $long ) {
		$this->latitude = $lat;
		$this->longitude = $long;
	}

	public static function prepJSON( $str ) {
		$str = str_replace( '"', '\"', $str );
		$str = str_replace( array( "\n" ), array( '\n' ), $str );
		return $str;
	}

	public static function GetInstance() {

		self::$meroveus = ConfigObject::Get('MeroveusHost');
		//self::$meroveusRoot = ConfigObject::Get('MeroveusRootHost');
		//self::$meroveusRootKey = ConfigObject::Get('MeroveusRootKey');

		/* check that the Meroveus host is set */
		if ( MeroveusClient::$meroveus == null ) {
			throw new Exception('Meroveus host not set in configuration.');
		}

		return new MeroveusClient();

		/* set the credentials */
		/*list( $AKEY, $EKEY ) = array(
			ConfigObject::Get('MeroveusAKEY'),
			ConfigObject::Get('MeroveusEKEY')
		);

		/* check that the credentials are set *
		if ( $AKEY == null || $EKEY == null ) {
			throw new Exception('Meroveus credentials not set in configuration.');
		}

		/* instantiate the meroveus instance *
		$mero = new MeroveusClient(
				$AKEY,
				$EKEY
			);
		return $mero;*/
	}

	public function getLists( $recTyp=null, $env=null ) {
		$req = '{"AKEY":"'.$this->AKEY.'", "EKEY":"'.$this->EKEY.'", "MODE":"LISTSEARCH"';
		if ( $recTyp != null ) $req .= ',"META":{"RECTYP":"'.$recTyp.'"}';
		if ( $env != null ) $req .= ', "ENV":"'.$env.'"';
		$req .= '}';
		$json = self::sendRequest( $req );
		$dat = json_decode( $json );
		return $dat;
	}

	public function getLabels($sKey, $sVal="*", $iMaxRows=100) {
		$req = '{"AKEY":"'.$this->AKEY.'", "EKEY":"'.$this->EKEY.'", "MODE":"LABELSEARCH"';
		$req .= ', "LABELKEY":"'.$sKey.'", "LABELVAL":"'.$sVal.'"';
		$req .= ', "MAXROWS":'.$iMaxRows;
		$req .= '}';
		$json = self::sendRequest( $req );
		$dat = json_decode( $json );
		return $dat;
	}

	public function setSortFields( $aFields ) {
		$this->aManualSort = array();
		foreach ( $aFields as $aField ) {
			if ( !isset( $aField["KEY"] ) ) continue;
			$bRev = isset( $aField["REVERSE"] ) ? $aField["REVERSE"]===true : false;
			$this->aManualSort [] = array(
				"KEY"=>$aField["KEY"],
				"REVERSE"=>$bRev
			);
		}
	}

	public function setSortHistory( $sHist ) {
		$this->sSortHistory = $sHist;
	}

	public function getList( $listId, $maxRows=20, $startRow=1, $kw=null ) {
		$this->setListId( $listId );
		return $this->search( $kw, null, $maxRows, $startRow );
	}

	public static function getSortFields( $oMeta ) {
		$aFields = $oMeta->FIELDS;
		$aAr = array(); //start with empty array
		foreach ( $aFields as $oField ) {
			if ( isset( $oField->SORT ) ) {
				$sKey = $oField->SORT->POS . ",".$oField->KEY;
				$aAr[ $sKey ] = $oField;
			}
		}
		ksort( $aAr );
		$aSortFields = array();
		foreach ( $aAr as $oField ) {
			$aSortFields [] = $oField;
		}
		return $aSortFields;
	}

	public function search( $terms="", $recTyp="Business", $maxRows=10, $startRow=1 ) {
		$req = '{"AKEY":"'.$this->AKEY.'","EKEY":"'.$this->EKEY.'","MODE":"SEARCH"';
		$req .= ',"MAXROWS":"'.$maxRows.'","STARTROW":"'.$startRow.'"';
		if ( $terms != null && strlen( $terms ) > 0 ) {
			$req .= ',"KEYWORDS":"'.self::prepJSON( $terms ).'"';
		}
		if ( $this->aManualSort != null && count( $this->aManualSort ) > 0 ) {
			$req .= ', "MANUALSORT":'.json_encode( $this->aManualSort );
		}
		if ( $this->sSortHistory != null && strlen( $this->sSortHistory ) > 0 ) {
			$req .= ', "HISTORY":"'.self::prepJSON($this->sSortHistory).'"';
		}
		if ( isset( $this->LISTID ) && $this->LISTID != null && is_numeric( $this->LISTID ) ) {
			$req .= ',"LIST":{"LISTID":"'.$this->LISTID.'",';
			$req .= '"LOAD":true}';
		} else {
			$req .= ',"SET":{"RECTYP":"'.$recTyp.'"}';
		}
		if ( isset( $this->latitude ) && is_numeric( $this->latitude ) ) {
			$req .= ',"ORIGIN":{"LATLONG":['.$this->latitude.','.$this->longitude.']}';
		}
		$req .= '}';

		$json = self::sendRequest( $req );

		$dat = json_decode( $json );

		return $dat;
	}

	public function buildMSet($oRec, $sKey) {
		$req = '{"MODE":"SETBUILD","EKEY":"'.$this->EKEY.'","AKEY":"'.$this->AKEY.'", "REC":{"ID":"'.$oRec->ID.'", "DATA":[{"KEY":"'.$sKey.'"}]}}';
		$json = self::sendRequest( $req );
		$dat = json_decode( $json );
		return $dat;
	}

	public function retrieve( $id, $recTyp="Business" ) {
		$labels = array();
		try {
			$dat = $this->search( "ID:${id}", $recTyp, 1 );
			$rec = $dat->SET->RECS[0];
			$labels = $dat->LABELS;
		} catch ( Exception $e ) {
			$rec = new stdClass;
		}
		return array( "REC"=>$rec, "LABELS"=>$labels );
	}

	private static function cleanField( $fld ) {
		if ( strpos( "_", $fld ) === false ) {
			$fld .= "_static";
		}
		$fld = str_replace( "-", "__", $fld );
		return $fld;
	}

	public static function parseQueryFromArray( $arr ) {
		$keywords = "";
		foreach ( $arr as $termQry ) {
			$termQry = (array) $termQry;
			foreach ( $termQry as $fld => $val ) {
				$fld = self::cleanField( $fld );
				$val = trim( $val );
				if ( strlen( $val ) == 0 ) continue;
				if ( strpos( $val, " " ) !== false ) {
					$val = "(".$val.")";
				}
				$keywords .= (strlen( $keywords ) > 0 ? " AND " : "") . $fld.":".$val;
			}
		}
		return $keywords;
	}

	public static function merge( $recObj1, $recObj2 ) {
		$dat2 = $recObj2->DATA;
		$dat1 = $recObj1->DATA;

		foreach ( $dat1 as $dat ) {
			$tmp = self::gerMDataObj( $recObj2, $dat->KEY );
			if ( !isset( $tmp->KEY ) ) $dat2[] = $dat;
		}

		$recObj1->DATA = $dat2;
		return $recObj1;
	}

	public static function getMHistoryData( $recObj, $key ) {
		if ( !isset( $recObj->DATA ) || !( $dat = $recObj->DATA ) ) return null;
		if ( count( $dat ) == 0 ) return null;
		for ( $d=0; $d<count( $dat ); $d++ ) {
			$dPt = $dat[ $d ];
			if ( !isset( $dPt->KEY ) ) continue;
			if ( $dPt->KEY == $key && isset( $dPt->HISTORY ) ) {
				return $dPt->HISTORY;
			}
		}
		return null;
	}

	public static function getMLabelData( $recObj, $key, $labelArr, $variant="NAME" ) {
		/* retrieve a DATA val from a standard MCore REC object */
		if ( !isset( $recObj->DATA ) || !( $dat = $recObj->DATA ) ) return "NULL";
		if ( count( $dat ) == 0 ) return "";
		for ( $d=0; $d<count( $dat ); $d++ ) {
			$dPt = $dat[ $d ];
			if ( !isset( $dPt->KEY ) ) continue;
			if ( $dPt->KEY == $key && isset( $dPt->LABELIDS ) ) {
				$val = "";
				foreach ( $labelArr as $labelObj ) {
					if ( in_array( $labelObj->LABELID, $dPt->LABELIDS ) ) {
						$val .= ( strlen( $val ) > 0 ? ", " : "" ) . (isset($labelObj->$variant)?$labelObj->$variant:$labelObj->NAME);
					}
				}
				return $val;
			}
		}
		return "";
	}

	public static function getMLabelIds( $recObj, $key ) {
		/* retrieve a DATA val from a standard MCore REC object */
		if ( !isset( $recObj->DATA ) || !( $dat = $recObj->DATA ) ) return array();
		if ( count( $dat ) == 0 ) return array();
		for ( $d=0; $d<count( $dat ); $d++ ) {
			$dPt = $dat[ $d ];
			if ( !isset( $dPt->KEY ) ) continue;
			if ( $dPt->KEY == $key && isset( $dPt->LABELIDS ) ) {
				return $dPt->LABELIDS;
			}
		}
		return array();
	}

	public static function getMRangeData( $recObj, $key, $avg=false ) {
		/* retrieve a DATA val from a standard MCore REC object */
		if ( !isset( $recObj->DATA ) || !( $dat = $recObj->DATA ) ) return "NULL";
		if ( count( $dat ) == 0 ) return "";
		for ( $d=0; $d<count( $dat ); $d++ ) {
			$dPt = $dat[ $d ];
			if ( !isset( $dPt->KEY ) ) continue;
			if ( $dPt->KEY == $key ) {
				$from = isset( $dPt->FROM ) ? $dPt->FROM : ( $avg ? 0 : null );
				$to = isset( $dPt->TO ) ? $dPt->TO : ( $avg ? 0 : null );
				if ( $avg ) {
					$val = ( $to + $from ) / 2;
				} else if ( is_numeric( $from ) && !is_numeric( $to ) ) {
					$val = "&gt; " . number_format( $from );
				} else if ( is_numeric( $to ) && !is_numeric( $from ) ) {
					$val = "&lt; " . number_format( $to );
				} else {
					$val = number_format( $from ) . " to " . number_format( $to );
				}
				return $val;
			}
		}
		return "";
	}

	public static function getMDataObj( $recObj, $key ) {
		/* retrieve a DATA val from a standard MCore REC object */
		if ( !isset( $recObj->DATA ) || !( $dat = $recObj->DATA ) ) return "NULL";
		if ( count( $dat ) == 0 ) return ( $prepSQL ? "NULL" : "" );
		for ( $d=0; $d<count( $dat ); $d++ ) {
			$dPt = $dat[ $d ];
			if ( !isset( $dPt->KEY ) ) continue;
			if ( $dPt->KEY == $key ) {
				return $dPt;
			}
		}
		$oNew = new stdClass;
		$oNew->KEY = $key;
		return $oNew;
	}

	public static function setMDataObj( $recObj, $oData ) {
		if ( !isset( $recObj->DATA ) || !is_array( $recObj->DATA ) ) $recObj->DATA = array();
		$key = $oData->KEY;
		for ( $d=0; $d<count( $recObj->DATA ); $d++ ) {
			$dPt = $recObj->DATA[ $d ];
			if ( !isset( $dPt->KEY ) ) continue;
			if ( $dPt->KEY == $key ) {
				$recObj->DATA[ $d ] = $oData;
				return;
			}
		}
		$recObj->DATA[] = $oData;
	}

	public static function getMSyncPrimary( $recObj, $src ) {
		try {
		$sync = $recObj->SYNC;
		if ( !is_object( $sync ) || !isset( $sync->$src ) ) return null;
		$sync = $recObj->SYNC->$src;
		if ( !is_array( $sync ) ) return null;
		$id = null;
		foreach ( $sync as $obj ) {
			$obj->PRIMARY = isset( $obj->PRIMARY ) ? $obj->PRIMARY : 0;
			if ( $obj->PRIMARY || $id == null ) {
				$id = $obj->ID;
			}
			if ( $obj->PRIMARY ) break;
		}
		return $id;
		} catch ( Exception $e ) {
			return null;
		}
	}

	public static function getMData( $recObj, $key, $prepSQL=false ) {
		/* retrieve a DATA val from a standard MCore REC object */
		if ( !isset( $recObj->DATA ) || !( $dat = $recObj->DATA ) ) return ( $prepSQL==true ? "NULL" : "" );
		if ( count( $dat ) == 0 ) return ( $prepSQL==true ? "NULL" : "" );
		for ( $d=0; $d<count( $dat ); $d++ ) {
			$dPt = $dat[ $d ];
			if ( !isset( $dPt->KEY ) ) continue;
			if ( $dPt->KEY == $key && isset( $dPt->VAL ) ) {
				if ( !self::$bExposePrivateData && isset( $dPt->PRIVATE ) && $dPt->PRIVATE == true ) {
					return ( $prepSQL==true ? "NULL" : "" );
				}
				$val = $dPt->VAL;
				if ( $prepSQL ) $val = "'" . MeroveusHelper::escapeStr( $val ) . "'";
				return $val;
			}
		}
		return ( $prepSQL===true ? "NULL" : "" );
	}

	public static function parseRecName( $oRec ) {
		switch ( $oRec->RECTYP ) {
			case "Business":
			$sNam = self::getMData( $oRec, "firm-name_static" );
			break;

			case "Person":
			$sNam = self::getMData( $oRec, "last-name_static" ) . ", " . self::getMData( $oRec, "first-name_static" );
			break;

			case "Property":
			$sNam = self::getMData( $oRec, "street-address_static" ) . ", " . self::getMData( $oRec, "street-city_static" );
			break;

			case "Project":
			$sNam = self::getMData( $oRec, "proj-name_static" );
			break;

			case "Program":
			$sNam = self::getMData( $oRec, "prog-name_static" );
			break;

			case "Event":
			$sNam = self::getMData( $oRec, "evnt-name_static" );
			break;

			case "Transaction":
			$sNam = self::getMData( $oRec, "trans-name_static" );
			break;

			case "Admin":
			$sNam = self::getMData( $oRec, "admin-name_static" );
			break;

			default:
			$sNam = "Name unavailable";
			break;
		}
		return $sNam;
	}

	public static function getFieldObject( $aFields, $sKey ) {
		foreach( $aFields as $oField ) {
			if ( !isset( $oField->KEY ) ) continue;
			if ( $oField->KEY == $sKey ) return $oField;
		}
		return null;
	}

	private static function parseNumberNotation( $sFormat ) {
		if ( $sFormat == null ) return "";
		if ( strlen($sFormat) == 0 ) return "";
		$n = ""; $chr="";
		for ( $x=strlen($sFormat)-1; $x>0; $x-- ) {
			$chr = substr( $sFormat, $x, 1 );
			if ( 	$chr == "*" ||
				$chr == "#" ||
				( $chr == "." && substr( $sFormat, $x-1, 1 ) == "#" ) ) break;
			$n = $chr . $n;
		}
		$n = ltrim( $n, "0" );
		return $n;
	}

	public static function formatDate( $val, $dtStr="M d, Y" ) {
		$dt = strtotime( strtok( $val, " " ) );
		if ( !$dt ) return $val;
		$str = date( "M j, Y", $dt );
		$str = str_replace(
			array( "Jan ", "Feb ", "Mar ", "Apr ", "Jun ", "Jul ", "Aug ", "Sep ", "Nov ", "Dec "),
			array( "Jan. ", "Feb. ", "March ", "April ", "June ", "July ", "Aug. ", "Sep. ", "Nov. ", "Dec. "), $str );
		return $str;
	}

	public static function formatNumber( $val, $numStr ) {
		if ( !is_numeric( $val ) ) return $val;
		$bCurrency = false;
		if ( substr( $numStr, 0, 1 ) == '$' ) {
			$bCurrency = true;
			$numStr = substr( $numStr, 1 );
		}
		$num0 = strtok( $numStr, "." );
		$num1 = strtok( "." );
		$dec = ( $num1 && substr($num1,0,1)=="#" ? strlen($num1) - strlen( str_replace( "#", "", $num1 ) ) : 0 );

		$notation = self::parseNumberNotation( $numStr );

		if ( strlen( $notation ) > 0 ) {
			$n = trim( strip_tags($notation) ); //in case a space-separator
			if ( strtolower( substr( $n, 0, 1 ) ) == "m" ) {
				if ( $val > 1000000000000 ) { //greater than a trillion
					$val = $val / 1000000000000;
					$notation = str_replace( array("mi", "Mi"), array("tri","Tri"), $notation );
					$notation = str_replace( array("m", "M"), array("t","T"), $notation );
				} else if ( $val > 1000000000 ) { //greater than a billion
					$val = $val / 1000000000;
					$notation = str_replace( array("m", "M"), array("b","B"), $notation );
				} else if ( $val > 1000000 ) { //greater than 1 million
					$val = $val / 1000000;
				} else { //less than 1 million, wipe out the notation, so real number
					$notation = "";
					$dec = 0;
				}
			}
			if ( $notation == "[price]" ) {
				$dec = 2;
			}
		}

		$val = number_format( $val, $dec );
		if ( strpos( $num0, "," ) === false ) {
			$val = str_replace( ",", "", $val );
		}
		if ( $bCurrency ) {
			$val = '$' . $val;
		}
		if ( $notation == "[price]" ) {
			$notation = "";
		} else if ( strpos( $val, "." ) == true ) {
			$val = trim(trim( $val, "0" ),".");
		}
		$val .= $notation;
		return $val;
	}

	public static function listFormatData( $val, $fType, $oFormat=null ) {
		if ( is_object( $oFormat ) ) {
			if ( $fType == "Numeric" || $fType == "Formula" ) {
				if ( isset( $oFormat->NUMBER ) ) {
					$val = self::formatNumber( $val, $oFormat->NUMBER );
				}
			} else if ( $fType == "Date" ) {
				$val = self::formatDate( $val, $oFormat->DATE );
			}
		} else if ( $fType == "Date" ) {
			$val = self::formatDate( $val );
		}
		return $val;
	}

	public static function listFormatLabel( $val, $oLayoutField ) {
		if ( !isset( $oLayoutField->KEY ) ) return $val;
		$key = $oLayoutField->KEY;
		strtok( $key, "_" );
		if ( !( $tf = strtok( "_" ) ) ) return $val;
		$ar = explode( "-", $tf );
		if ( count( $ar ) == 1 && !is_numeric( $ar[0] ) ) return $val;
		$y = $ar[0];
		$m = isset( $ar[1] ) ? $ar[1] : "";
		$d = isset( $ar[2] ) ? $ar[2] : "";
		$val = str_replace( array( "[Y]", "[M]", "[D]" ), array( $y, $m, $d ), $val );
		$val = str_replace( array( "@Y@", "@M@", "@D@" ), array( $y, $m, $d ), $val );
		return $val;
	}

	public static function formatDataContainer( $oRec, $sKey, $aConfig=null ) {
		$oData = self::getMDataObj( $oRec, $sKey );
		if ( !is_array( $aConfig ) || !isset( $aConfig["LayoutField"] ) || !isset( $aConfig["Field"] ) ) {
			throw new MeroveusSyntaxException( "Third parameter must be an array containing elements \"LayoutField\" and \"Field\"" );
		}
		$oLayoutField = $aConfig["LayoutField"];
		if ( !is_object( $oData ) ) return "";
		if ( !isset( $oData->SET ) || !is_object( $oData->SET ) ) return "";
		if ( !isset( $oData->SET->RECS ) || !is_array( $oData->SET->RECS ) ) return "";
		if ( !is_object( $oLayoutField ) || !isset( $oLayoutField->FIELDS ) || !is_array( $oLayoutField->FIELDS) ) return "";
		$aRecs = $oData->SET->RECS;
		$aLayoutFields = $oLayoutField->FIELDS;
		$aFields = $aConfig["Field"]->META->FIELDS;
		$iLen = count( $aRecs );
		$out="";
		$sSep = isset($oLayoutField->SEPARATOR) ? $oLayoutField->SEPARATOR : "";
		if ( $sSep == "BR" ) $sSep = "<br />";
		$aReplaceTxt = array();
		$aReplaceWith = array();
		for ( $x=0; $x<$iLen; $x++ ) {
			$oRec = self::loadRec( $aRecs[$x] );
			$sRow = "";
			$sCellContent = "";
			foreach ( $aLayoutFields as $oLayoutField ) {
				if ( $oLayoutField->HIDE ) continue;
				$oField = self::getFieldObject( $aFields, $oLayoutField->KEY );
				$aConfig["LayoutField"] = $oLayoutField;
				$aConfig["Field"] = $oField;
				$raw = self::getMData( $oRec, $oLayoutField->KEY );
				//$val = self::listFormatVal( $raw, $oField );
				$val = self::formatData( $oRec, $oLayoutField->KEY, $aConfig );
				$val = strlen($val) > 0 ? self::listFormatVal( $val, $oLayoutField ) : "";
				if ( $oLayoutField->KEY == "department-title_static" ) {
					if ( strlen( $raw ) == 0 ) {
						continue;
					}
					$sTxt = "@@TITLE_$x@@";
					$aReplaceTxt[] = $sTxt;
					$aReplaceWith[] = $val;
					$val = $sTxt;
				}
				$sRow .= $val;
				$sCellContent .= $raw;
				/* 20141216 tdf removed: && strlen(trim($raw)) > 0 */
				if ( $oLayoutField->BREAKAFTER == true && strlen(trim($sCellContent)) > 0 ) $sRow .= '<br />';
			}
			$out .= ( strlen( $out ) > 0 ? $sSep : "" ) . $sRow;

		}
		if ( count( $aReplaceWith ) > 0 ) {
			try {
				if ( count( $aReplaceWith ) == 1 ) {
					throw new Exception( "Only one!" );
				}
				$prevTxt = $aReplaceWith[0];
				$aNewReplace = array();
				foreach ( $aReplaceWith as $txt ) {
					if ( $txt != $prevTxt ) throw new Exception( "Not all the same!" );
					$aNewReplace [] = "";
				}
				$aNewReplace[ count( $aNewReplace ) - 1 ] = $prevTxt . "s";
				$out = str_replace( $aReplaceTxt, $aNewReplace, $out );
			} catch ( Exception $e ) {
				$out = str_replace( $aReplaceTxt, $aReplaceWith, $out );
			}
		}
		$out = str_replace( '<br /><br />', '<br />', $out );
		return $out;
	}

	public static function listFormatContainer( $oData, $oLayoutField, $aConfig=array() ) {
		/* 20140616 tdf updated to better reflect javascript layout */
		if ( !is_object( $oData ) ) return "";
		if ( !isset( $oData->SET ) || !is_object( $oData->SET ) ) return "";
		if ( !isset( $oData->SET->RECS ) || !is_array( $oData->SET->RECS ) ) return "";
		if ( !is_object( $oLayoutField ) || !isset( $oLayoutField->FIELDS ) || !is_array( $oLayoutField->FIELDS) ) return "";
		$aRecs = $oData->SET->RECS;
		$aLayoutFields = $oLayoutField->FIELDS;
		$aFields = $aConfig["Field"]->META->FIELDS;
		$iLen = count( $aRecs );
		$out="";
		$sSep = isset($oLayoutField->SEPARATOR) ? $oLayoutField->SEPARATOR : "";
		if ( $sSep == "BR" ) $sSep = "<br />";
		$aReplaceTxt = array();
		$aReplaceWith = array();
		for ( $x=0; $x<$iLen; $x++ ) {
			$oRec = self::loadRec( $aRecs[$x] );
			$sRow = "";
			$sCellContent = "";
			foreach ( $aLayoutFields as $oLayoutField ) {
				if ( $oLayoutField->HIDE ) continue;
				//$oField = self::getFieldObject( $aFields, $oLayoutField->KEY );
				$aConfig["LayoutField"] = $oLayoutField;
				//$aConfig["Field"] = $oField;
				$raw = self::getMData( $oRec, $oLayoutField->KEY );
				//$val = self::listFormatVal( $raw, $oField );
				$val = self::formatData( $oRec, $oLayoutField->KEY, $aConfig );
				$val = strlen($val) > 0 ? self::listFormatVal( $val, $oLayoutField ) : "";
				if ( $oLayoutField->KEY == "department-title_static" ) {
					if ( strlen( $raw ) == 0 ) continue;
					$sTxt = "@@TITLE_$x@@";
					$aReplaceTxt[] = $sTxt;
					$aReplaceWith[] = $val;
					$val = $sTxt;
				}
				$sRow .= $val;
				$sCellContent .= $raw;
				if ( $oLayoutField->BREAKAFTER == true && strlen(trim($sCellContent)) > 0 ) $sRow .= '<br />';
			}
			$out .= ( strlen( $out ) > 0 ? $sSep : "" ) . $sRow;

		}
		if ( count( $aReplaceWith ) > 0 ) {
			try {
				if ( count( $aReplaceWith ) == 1 ) {
					throw new Exception( "Only one!" );
				}
				$prevTxt = $aReplaceWith[0];
				$aNewReplace = array();
				foreach ( $aReplaceWith as $txt ) {
					if ( $txt != $prevTxt ) throw new Exception( "Not all the same!" );
					$aNewReplace [] = "";
				}
				$aNewReplace[ count( $aNewReplace ) - 1 ] = $prevTxt . "s";
				$out = str_replace( $aReplaceTxt, $aNewReplace, $out );
			} catch ( Exception $e ) {
				$out = str_replace( $aReplaceTxt, $aReplaceWith, $out );
			}
		}
		$out = str_replace( '<br /><br />', '<br />', $out );
		return $out;
	}

	private static function listFormatVal( $val, $oLayoutField ) {
		$sClassName = $oLayoutField->KEY;
		if ( isset($oLayoutField->BEFORETEXT) && $oLayoutField->BEFORETEXT ) {
			$val = $oLayoutField->BEFORETEXT . $val;
		}
		if ( isset($oLayoutField->AFTERTEXT) && $oLayoutField->AFTERTEXT ) {
			$val .= $oLayoutField->AFTERTEXT;
		}
		$span = '<span class="'.$sClassName.'"';
		if ( isset( $oLayoutField->STYLE ) && count( $oLayoutField->STYLE ) > 0 ) {
			$sStyle = "";
			foreach ( $oLayoutField->STYLE as $attr => $v ) {
				$sStyle .= $attr.":".$v;
			}
			//$val = '<span class="'.$sClassName.'" style="'.$sStyle.'">'.$val.'</span>';
			$span .= ' style="'.$sStyle.'"';
		}
		$val = $span . ">" . $val . '</span>';
		return $val;
	}

	public static function registerContainers( $aRecs ) {
		if ( !is_array( $aRecs ) ) return;
		foreach ( $aRecs as $oRec ) {
			self::loadRec( $oRec );
			if ( !isset( $oRec->DATA ) ) continue;
			$aData = $oRec->DATA;
			foreach ( $aData as $oData ) {
				if ( isset( $oData->SET ) && is_object( $oData->SET ) && isset( $oData->SET->RECS ) ) {
					self::registerContainers( $oData->SET->RECS );
				}
			}
		}
	}

	public static function isPrivateData( $oRec, $sKey ) {
		$oDataObj = self::getMDataObj( $oRec, $sKey );
		if ( $oDataObj == null || !is_object( $oDataObj ) ) return false;
		if ( isset( $oDataObj->PRIVATE ) && $oDataObj->PRIVATE ) return true;
		return false;
	}

	/*******************************************************************************************
	 * STATIC METHOD formatData - 2014-04-28 tdf
	 * method to quickly format a given data point. This should work for all types of fields that are not
	 * container fields ... Numeric, Date, Text
	 * Parameter 1 - A REC object obtained via the Meroveus API
	 * Parameter 2 - A String KEY identifier, e.g. firm-name_static, revenue-volume_2012, etc.
	 * Parameter 3 (optional) - an associative array containing any (or none) of the following elements:
	 *		Field => A META->FIELD object obtained via the Meroveus API
	 *		LayoutField => A LAYOUT->FIELD object obtained via the Meroveus API
	 *		Labels => The LABELS array of LABEL object returned via a MODE=SEARCH Meroveus API call
	 *		FormattingByClass => An associative array as class=>[ FORMAT object or Numeric format ] e.g.
	 *		  Array ( "count"=>{NUMBER:"#,###"}, "volume"=>"$#,###.## Million" }
	 ********************************************************************************************/

	public static function formatData( $oRec, $sKey, $aConfig=array(
		"Field"=>null, "LayoutField"=>null, "Labels"=>null
		) ) {
		$oField = isset( $aConfig["Field"] ) ? $aConfig["Field"] : null;
		$oLayoutField = isset( $aConfig["LayoutField"] ) ? $aConfig["LayoutField"] : null;
		$aLabels = isset( $aConfig["Labels"] ) ? $aConfig["Labels"] : null;
		$aClassFormats = isset( $aConfig["FormattingByClass"] ) && is_array( $aConfig["FormattingByClass"] ) ? $aConfig["FormattingByClass"] : null;
		$sTyp = "Text";
		if ( $oField != null && isset( $oField->TYP) ) {
			$sTyp = $oField->TYP;
		} else if ( $oLayoutField != null && isset( $oLayoutField->TYP) ) {
			$sTyp =$oLayoutField->TYP;
		}
		$val = "";
		$oFormat = ( $oLayoutField != null && isset( $oLayoutField->FORMAT ) ? $oLayoutField->FORMAT : null );
		$dClass = self::parseDataClass( $sKey );
		if ( ( $oFormat == null || !is_object($oFormat) || !isset( $oFormat->NUMBER ) ) &&
			$aClassFormats != null && isset( $aClassFormats[$dClass] ) ) {
			$fmt = $aClassFormats[$dClass];
			if ( !is_object( $fmt ) ) {
				$fmt = new stdclass();
				$fmt->NUMBER = $aClassFormats[$dClass];
			}
			$oFormat = $fmt;
		}
		if ( !self::$bExposePrivateData && self::isPrivateData( $oRec, $sKey ) ) {
			return "";
		}

		switch ( $sTyp ) {
			case "Label":
			$variant = "NAME";
			if ( $oFormat != null && isset( $oFormat->VARIANT ) ) {
				$variant = $oFormat->VARIANT;
			}
			$val = self::getMLabelData( $oRec, $sKey, $aLabels, $variant );
			break;

			case "Numeric":
			if ( $dClass == "range" ) {
				$obj = self::getMDataObj( $oRec, $sKey );
				if ( $obj == null || $obj == "NULL" ) {
					return "";
				}
				$from = isset($obj->FROM) && is_numeric($obj->FROM) ? $obj->FROM : "";
				$to = isset($obj->TO) && is_numeric($obj->TO) ? $obj->TO : "";
				if ( $from == $to ) {
					return self::listFormatData( $from, $sTyp, $oFormat );
				}
				$val = "";//strlen($from) > 0 ? self::listFormatData( $from, $sTyp, $oFormat ) : "";
				if ( strlen( $from ) > 0 && strlen( $to ) > 0 ) {
					$val = self::listFormatData( $from, $sTyp, $oFormat ) . ' to ' . self::listFormatData( $to, $sTyp, $oFormat );
				} else if ( strlen( $from ) > 0 && strlen( $to ) == 0 ) {
					$val = "&gt; ".self::listFormatData( $from, $sTyp, $oFormat );
				} else if ( strlen( $val ) == 0 && strlen( $to ) > 0 ) {
					$val = "&lt; ".self::listFormatData( $to, $sTyp, $oFormat );
				}
			} else {
				$raw = self::getMData( $oRec, $sKey );
				$val = self::listFormatData( $raw, $sTyp, $oFormat );
				if ( substr( $sKey, -7 ) == "_change" && $raw > 0 ) {
					$val = "+".$val;
				}
			}
			break;

			default:
			$raw = self::getMData( $oRec, $sKey );
			$val = self::listFormatData( $raw, $sTyp, $oFormat );
			break;
		}
		return $val;
	}

	public static function listToArray( $oRes ) {
		$aFields = $oRes->LIST->META->FIELDS;
		$aLayoutFields = $oRes->LIST->LAYOUT->FIELDS;
		$aBlocks = $oRes->LIST->LAYOUT->BLOCKS;
		$aFields = $oRes->LIST->META->FIELDS;
		$oRecs = $oRes->SET->RECS;
		self::registerContainers( $oRecs );
		//print_r( self::$aRecs[ "27102" ] );exit();
		$aExtraFields = array();
		foreach ( $aFields as $oField ) {
			if ( !isset( $oField->KEY ) ) continue;
			$fKey = $oField->KEY;
			try {
				foreach ( $aLayoutFields as $oLayoutField ) {
					if ( $oLayoutField->KEY == $fKey ) throw new Exception( "Found key in layout" );
				}
			} catch ( Exception $e ) {
				continue;
			}
			$aExtraFields[]=$oField;
		}
		$aOutput = array();
		foreach ( $oRecs as $ii => $oRec ) {
			$openTd = false;
			$aRow = array();
			foreach ( $aLayoutFields as $oLayoutField ) {
				if ( !$openTd ) {
					$html = "";
					$aCell = array("FIELDS"=>array());
					$openTd = true;
				}
				if ( $oLayoutField->KEY == "rank-number" ) {
					$val = '<rank>' . $oRec->RANK->VAL . '</rank>';
					$raw = $oRec->RANK->VAL;
				} else if ( $oLayoutField->KEY == "prior-rank" ) {
					$val = '<prevrank>' . $oRec->PREVRANK . '</prevrank>';
					$raw = $oRec->PREVRANK;
				} else {
					$oField = self::getFieldObject( $aFields, $oLayoutField->KEY );
					if ( $oField == null ) {
						$val = "";
						$raw = "";
					} else {
						if ( $oField->TYP == "Label" ) {
							$variant = "NAME";
							if ( isset( $oLayoutField->FORMAT )
							&& isset( $oLayoutField->FORMAT->VARIANT ) ) {
								$variant = $oLayoutField->FORMAT->VARIANT;
							}
							$val = self::getMLabelData( $oRec, $oLayoutField->KEY, $oRes->LABELS, $variant );
							$raw = $val;
						} else if ( self::isContainerField( $oField ) ) {
							$obj = self::getMDataObj( $oRec, $oLayoutField->KEY );
							$val = self::listFormatContainer( $obj, $oLayoutField );
							$raw = strip_tags( $val, "<br><rank><prevrank>" );
						} else {
							$raw = self::getMData( $oRec, $oLayoutField->KEY );
							$oFormat = ( isset( $oLayoutField->FORMAT ) ? $oLayoutField->FORMAT : null );
							$val = self::listFormatData( $raw, $oField->TYP, $oFormat );
						}
					}
				}
				if ( strlen( $val ) > 0 ) {
					$val = self::listFormatVal( $val, $oLayoutField );
				}
				$aCell["FIELDS"][$oLayoutField->KEY] = $raw;
				$html .= $val;
				if ( $oLayoutField->BREAKAFTER ) {
					$html .= '<br />';
				} else if ( $oLayoutField->RETURNAFTER ) {
					///$html .= '</td>';
					$aCell["FORMATTED"] = strip_tags( $html, "<br><rank><prevrank>" );
					$aRow [] = $aCell;
					$openTd = false;
				}
			}
			if ( $openTd && strlen( $html ) ) {
				$aCell["FORMATTED"] = strip_tags( $html, "<br><rank><prevrank>" );
				$aRow [] = $aCell;
			}
			foreach ( $aExtraFields as $oField ) { //now the metafields
				$aCell = array("FIELDS"=>array());
				if ( $oField->TYP == "Label" ) {
					$variant = "NAME";
					$val = self::getMLabelData( $oRec, $oField->KEY, $oRes->LABELS, $variant );
				} else if ( self::isContainerField( $oField ) ) {
					$obj = self::getMDataObj( $oRec, $oField->KEY );
					$val = "";
					if ( isset( $obj->SET ) && is_object( $obj->SET ) && isset( $obj->SET->RECS ) && is_array( $obj->SET->RECS ) ) {
						foreach ( $obj->SET->RECS as $oRc ) {
							$val .= (strlen( $val )>0 ? "; " : "") . $oRc->NAME;
						}
					}
				} else {
					$raw = self::getMData( $oRec, $oField->KEY );
					$val = self::listFormatData( $raw, $oField->TYP );
				}
				$aCell["FIELDS"][$oField->KEY] = $val;
				$aRow[]=$aCell;
			}
			$aOutput [] = $aRow;
		}
		return $aOutput;
	}

	/*******************************************************************************************
	 * STATIC METHOD cloneLayoutField - 2014-07-29 tdf
	 * method to create a clone of a meroveus-returned LAYOUT->FIELD object
	 * Parameter 1 - LAYOUT->FIELD object
	 ********************************************************************************************/

	private static function cloneLayoutField( $oFld ) {
		$oNew = new stdclass();
		$aEles = array( "KEY", "LABEL", "RETURNAFTER", "BREAKAFTER", "NAMARK", "NOAPPEND", "HIDE" );
		foreach ( $aEles as $sEle ) {
			if ( isset( $oFld->$sEle ) ) {
				$oNew->$sEle = $oFld->$sEle;
			}
		}
		return $oNew;
	}

	/*******************************************************************************************
	 * STATIC METHOD flattenLayoutFields - 2014-07-29 tdf
	 * method to break apart any container field blocks that have RETURNAFTER set to true. MUST be called
	 * prior to first iteration in building out an array or table based on the returned LAYOUT object
	 * Parameter 1 - An array of Layout fields, typically $res->LIST->LAYOUT->FIELDS;
	 ********************************************************************************************/

	public static function flattenLayoutFields( $aFields ) {
		if ( !is_array($aFields) ) {
			throw new MeroveusSyntaxException( "::flattenLayoutFields requires parameter one be an array of LAYOUTFIELD objects" );
		}
		$aNewFlds = array();
		foreach( $aFields as $oField ) {
			if ( isset( $oField->FIELDS ) && is_array( $oField->FIELDS ) ) {
				$aFlds = array();
				foreach( $oField->FIELDS as $ii => $oFld ) {
					//if ( $oFld->HIDE == true ) continue;
					$aFlds [] = $oFld;
					if ( $oFld->RETURNAFTER == true ) {

						$oNext = ( isset( $oField->FIELDS[ $ii+1 ] ) ? $oField->FIELDS[ $ii+1 ] : null );
						$oNew = self::cloneLayoutField( $oField );
						$oNew->FIELDS = $aFlds;
						//if ( $ii > 0 ) {
						//	$oNew->LABEL = $aFlds[0]->LABEL;
						//}
						if ( $oNext != null ) {
							$oField->LABEL = $oNext->LABEL;
						}
						$aNewFlds [] = $oNew;
						$aFlds = array();

					}


				}
				$oField->FIELDS = $aFlds;
			}
			$aNewFlds [] = $oField;
		}
		return $aNewFlds;
	}

	/*******************************************************************************************
	 * STATIC METHOD listToTable - revised 2014-07-29 tdf
	 * method to convert a meroveus MODE=SEARCH call that loads a LIST object into an HTML Table
	 * Parameter 1 - The full, json_decoded response from meroveus for a MODE=SEARCH, LIST:{LISTID:123}
	 * Parameter 2 (optional) - the field KEY indicating the list's top ranking criteria
	 ********************************************************************************************/

	public static function listToTable( $oRes, $rankKey="" ) {
		$aLayoutFields = self::flattenLayoutFields( $oRes->LIST->LAYOUT->FIELDS );
		$aBlocks = $oRes->LIST->LAYOUT->BLOCKS;
		$aFields = $oRes->LIST->META->FIELDS;
		$oRecs = $oRes->SET->RECS;
		self::registerContainers( $oRecs );
		$html = '<table>';
		$html .= '<thead><tr>';
		$openTd = false;
		$iCol = 0;
		foreach ( $aLayoutFields as $oLayoutField ) {

			$val = isset( $oLayoutField->LABEL ) ? $oLayoutField->LABEL : "";
			if ( !$openTd ) {
				$html .= '<th';
				if ( is_array( $aBlocks ) && isset( $aBlocks[$iCol] ) ) {
					$html .= ' style="width:'.$aBlocks[$iCol].'%"';
				}
				$html .= '>';
				$openTd = true;
			}

			if ( strlen( $val ) > 0 ) {
				$val = self::listFormatLabel( $val, $oLayoutField );
				$val = self::listFormatVal( $val, $oLayoutField );
			}
			$html .= $val;
			if ( substr( $html, -6) != '<br />' && $oLayoutField->BREAKAFTER ) {
				$html .= '<br />';
			} else if ( $oLayoutField->RETURNAFTER ) {
				$html .= '</th>';
				$iCol++;
				$openTd = false;
			}
		}
		if ( $openTd ) {
			$html .= '</th>';
		}
		$html .= '</tr></thead>';
		$html .= '<tbody>';
		foreach ( $oRecs as $ii => $oRec ) {
			$html .= '<tr id="rec'.$oRec->ID.'" rec-id="'.$oRec->ID.'" class="'.( fmod( $ii, 2 ) ? "even" : "odd" ).'">';
			$openTd = false;
			foreach ( $aLayoutFields as $oLayoutField ) {
				if ( !$openTd ) {
					$html .= '<td>';
					$openTd = true;
				}
				if ( $oLayoutField->KEY == "rank-number" ) {
					$val = $oRec->RANK->VAL;
				} else {
					$oField = self::getFieldObject( $aFields, $oLayoutField->KEY );
					$aConfig = array(
						"Field"=>$oField,
						"LayoutField"=>$oLayoutField,
						"Labels"=>$oRes->LABELS,
						"FormattingByClass"=>array( "formula"=>"#,###.##" )
					);
					if ( $oField == null ) {
						$val = "";
					} else if ( self::isContainerField( $oField ) ) {
						//$obj = self::getMDataObj( $oRec, $oLayoutField->KEY );
						//$val = self::listFormatContainer( $obj, $oLayoutField );
						$val = self::formatDataContainer( $oRec, $oField->KEY, $aConfig );
					} else {
						$val = self::formatData( $oRec, $oField->KEY, $aConfig );
						/*if ( $oField->TYP == "Label" ) {
							$variant = "NAME";
							if ( isset( $oLayoutField->FORMAT )
							&& isset( $oLayoutField->FORMAT->VARIANT ) ) {
								$variant = $oLayoutField->FORMAT->VARIANT;
							}
							$val = self::getMLabelData( $oRec, $oLayoutField->KEY, $oRes->LABELS, $variant );
						} else if ( $oField->TYP == "Neighborhood" ) {
							$val = self::listFormatContainer( self::getMDataObj( $oRec, $oLayoutField->KEY ), $oLayoutField );
						} else {
							$val = self::getMData( $oRec, $oLayoutField->KEY );
							$oFormat = ( isset( $oLayoutField->FORMAT ) ? $oLayoutField->FORMAT : null );
							if ( strpos( $oField->KEY, "_change" ) !== false ) {
								$oFormat->PLUSMINUS = true;
							}
							$val = self::listFormatData( $val, $oField->TYP, $oFormat );
						}*/
					}
				}
				if ( strlen( $val ) > 0 ) {
					$val = self::listFormatVal( $val, $oLayoutField );
				}
				if ( $oLayoutField->KEY == $rankKey ) {
					$val = '<span class="rankedBy">' . $val . '</span>';
				}
				$html .= $val;
				if ( substr( $html, -6) != '<br />' && $oLayoutField->BREAKAFTER ) {
					$html .= '<br />';
				} else if ( $oLayoutField->RETURNAFTER ) {
					$html .= '</td>';
					$openTd = false;
				}
			}
			if ( $openTd ) {
				$html .= '</td>';
			}
			$html .= '</tr>' . "\n";
		}
		$html .= '</tbody></table>';
		return $html;
	}


	public static function sendRootRequest( $json ) {
		self::sendRequest( $json, self::$meroveusRoot );
	}

	public static function sendRequest( $json, $isRootRequest = false) {
		/* send a request to Meroveus! takes JSON string, posts via curl, returns JSON string */
		$json = str_replace( '%2B', '+', $json ); //fix plus symbols disappearing 20140320 tdf
		$ch = curl_init(); // init curl
		$sMeroveus = ( $isRootRequest ? self::$meroveusRoot : self::$meroveus );

		// set the target url
		curl_setopt($ch, CURLOPT_URL, $sMeroveus);

		// how many parameters to post
		curl_setopt($ch, CURLOPT_POST, 1);
		// this just for a bad response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
		// the parameter 'username' with its value 'johndoe'
		curl_setopt($ch, CURLOPT_POSTFIELDS,($isRootRequest?"MROOT":"MCORE")."=".urlencode($json) );
		curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
		curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false); //ignore protocol if https
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 ); //ignore ssl name
		//echo 'Curl error: ' . curl_error($ch);

		$result= curl_exec ($ch);

		curl_close ($ch);
		//decompress the response
		//echo "result size = " . strlen($result);
		//die( self::gzdecode($result) );
		//echo $json;
		//echo self::gzdecode($result);
		//echo $sMeroveus;
		return str_replace( ":NaN", ":0", self::gzdecode($result));
		//return str_replace( '&43;', '+', str_replace( ":NaN", ":0", self::gzdecode($result)));

	}

	private static function gzdecode($data,&$filename='',&$error='',$maxlength=null) {
		/* static method for de-gzencoding data returned from meroveus */
		return gzinflate(substr($data,10,-8));
		$len = strlen($data);
		if ($len < 18 || strcmp(substr($data,0,2),"\x1f\x8b")) {
			$error = "Not in GZIP format.";
			return null;  // Not GZIP format (See RFC 1952)
		}
		$method = ord(substr($data,2,1));  // Compression method
		$flags  = ord(substr($data,3,1));  // Flags
		if ($flags & 31 != $flags) {
			$error = "Reserved bits not allowed.";
			return null;
		}
		// NOTE: $mtime may be negative (PHP integer limitations)
		$mtime = unpack("V", substr($data,4,4));
		$mtime = $mtime[1];
		$xfl   = substr($data,8,1);
		$os    = substr($data,8,1);
		$headerlen = 10;
		$extralen  = 0;
		$extra     = "";
		if ($flags & 4) {
			// 2-byte length prefixed EXTRA data in header
			if ($len - $headerlen - 2 < 8) {
				return false;  // invalid
			}
			$extralen = unpack("v",substr($data,8,2));
			$extralen = $extralen[1];
			if ($len - $headerlen - 2 - $extralen < 8) {
				return false;  // invalid
			}
			$extra = substr($data,10,$extralen);
			$headerlen += 2 + $extralen;
		}
		$filenamelen = 0;
		$filename = "";
		if ($flags & 8) {
			// C-style string
			if ($len - $headerlen - 1 < 8) {
				return false; // invalid
			}
			$filenamelen = strpos(substr($data,$headerlen),chr(0));
			if ($filenamelen === false || $len - $headerlen - $filenamelen - 1 < 8) {
				return false; // invalid
			}
			$filename = substr($data,$headerlen,$filenamelen);
			$headerlen += $filenamelen + 1;
		}
		$commentlen = 0;
		$comment = "";
		if ($flags & 16) {
			// C-style string COMMENT data in header
			if ($len - $headerlen - 1 < 8) {
				return false;    // invalid
			}
			$commentlen = strpos(substr($data,$headerlen),chr(0));
			if ($commentlen === false || $len - $headerlen - $commentlen - 1 < 8) {
				return false;    // Invalid header format
			}
			$comment = substr($data,$headerlen,$commentlen);
			$headerlen += $commentlen + 1;
		}
		$headercrc = "";
		if ($flags & 2) {
			// 2-bytes (lowest order) of CRC32 on header present
			if ($len - $headerlen - 2 < 8) {
				return false;    // invalid
			}
			$calccrc = crc32(substr($data,0,$headerlen)) & 0xffff;
			$headercrc = unpack("v", substr($data,$headerlen,2));
			$headercrc = $headercrc[1];
			if ($headercrc != $calccrc) {
				$error = "Header checksum failed.";
				return false;    // Bad header CRC
			}
			$headerlen += 2;
		}
		// GZIP FOOTER
		$datacrc = unpack("V",substr($data,-8,4));
		$datacrc = sprintf('%u',$datacrc[1] & 0xFFFFFFFF);
		$isize = unpack("V",substr($data,-4));
		$isize = $isize[1];
		// decompression:
		$bodylen = $len-$headerlen-8;
		if ($bodylen < 1) {
			// IMPLEMENTATION BUG!
			return null;
		}
		$body = substr($data,$headerlen,$bodylen);
		$data = "";
		if ($bodylen > 0) {
			switch ($method) {
				case 8:
				// Currently the only supported compression method:
				$data = gzinflate($body,$maxlength);
				break;
				default:
				$error = "Unknown compression method.";
				return false;
			}
		}  // zero-byte body content is allowed
		// Verifiy CRC32
		$crc   = sprintf("%u",crc32($data));
		$crcOK = $crc == $datacrc;
		$lenOK = $isize == strlen($data);
		if (!$lenOK || !$crcOK) {
			$error = ( $lenOK ? '' : 'Length check FAILED. ') . ( $crcOK ? '' : 'Checksum FAILED.');
			return false;
		}
		return urldecode( $data );
	}

}


?>
