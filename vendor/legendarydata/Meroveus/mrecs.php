<?php

class MRecs {

	private $oMero;

	public function __construct($oMero) {
		$this->oMero = $oMero;
	}

	public function Search( $sKeywords, $iListId ) {
		
		$this->oMero->setListId( $iListId  );
		$aResponse = array();
		try {
			$aData = $this->oMero->search( $sKeywords, null, 50 );
			
			if ( !is_object( $aData ) || $aData->RECCOUNT == 0 || !is_object( $aData->SET ) ) {
				throw new Exception( "No records found!" );
			}
			$aLabels = $aData->LABELS;
			$aRecs = $aData->SET->RECS;
			
			foreach ( $aRecs as $rec ) {
				$aResponse[] = MRec::Load( $rec, $aLabels );
			}
		} catch ( Exception $err ) {
			return array();
		}
		return $aResponse;
	}

	public static function Retrieve( $sRecIdQry, $iListId, $oMero ) {
		if ( is_array( $sRecIdQry ) ) {
			$sRecIdQry = implode( " ", $sRecIdQry );
		}
		$oRecs = new MRecs( $oMero );
		$aRecs0 = $oRecs->Search( "ID:(".$sRecIdQry.")", $iListId );
		$aRecs = array();
		$aRecIds = explode( " ", $sRecIdQry );
		foreach ( $aRecIds as $recId ) {
			foreach ( $aRecs0 as $oRec ) {
				if ( $oRec->Id == $recId ) {
					$aRecs[] = $oRec;
					break;
				}
			}
		}
		return $aRecs;
	}
}

?>
