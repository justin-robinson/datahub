<?php


class SSCUtils {

	public static function GrokDateStream( $iDays, $oSampleData, $bForWidget=false, $sForceType=null ) {
		$t = "days";
		
		if ( is_array( $oSampleData ) ) {
			foreach ( $oSampleData as $i => $dtObj ) {
				foreach ( $dtObj as $dt => $stat ) {
					$ar = explode( "-", $dt );
					if ( count( $ar ) == 3 ) {
						$t="days";
					} else if ( count( $ar ) == 1 ) {
						$t="years";
					} else if ( count( $ar ) == 2 ) {
						if ( substr($ar[1],0,1) == "Q" ) {
							$t="quarters";
						} else {
							$t="months";
						}
					}
				}
				break;
			}
		}
		if ( $t == "days" && $sForceType == "months" ) {
			$t = "monthlybenchmark";
		}
		$aInit = array();
		
		switch ( $t ) {

			case "quarters":
			$y = ceil( $iDays / 365 );
			
			$startTime = strtotime( "-".$iDays." days" );
			for ( $yy=$y; $yy>0; $yy-- ) {
				$yr=date( "Y", mktime())-$yy;
				for ( $qq=1; $qq<=4; $qq++ ) {
					$tf = $yr."-Q".$qq;
					if ( self::ToTime( $tf ) < $startTime ) continue;
					if ( $bForWidget ) {
						$aInit[] = $tf;
					} else {
						$aInit[ $tf ] = array();
					}
				}
			}
			break;

			case "monthlybenchmark":
			$y = ceil( $iDays / 365 );
			
			$startTime = strtotime( "-".$iDays." days" );
			$endTime = strtotime( date( "Y", mktime()) ."-".(date("m",mktime())-1)."-01" );
			for ( $yy=$y; $yy>=0; $yy-- ) {
				$yr=date( "Y", mktime())-$yy;
				for ( $mm=1; $mm<=12; $mm++ ) {
					$mm = str_pad($mm, 2, "0", STR_PAD_LEFT);
					$tf = $yr."-".$mm."-01";
					if ( self::ToTime( $tf ) < $startTime ) continue;
					if ( self::ToTime( $tf ) > $endTime ) break;
					if ( $bForWidget ) {
						$aInit[] = $tf;
					} else {
						$aInit[ $tf ] = array();
					}
				}
			}
			break;

			case "years":
			$y = ceil( $iDays / 365 );
			
			$startTime = strtotime( "-".$iDays." days" );
			for ( $yy=$y; $yy>0; $yy-- ) {
				$yr=date( "Y", mktime())-$yy;
				if ( self::ToTime( $yr ) < $startTime ) continue;
				if ( $bForWidget ) {
					$aInit[] = $yr;
				} else {
					$aInit[ $yr ] = array();
				}
			}
			break;

			default:
			$iInterval = self::GetChartInterval( $iDays );
			for ( $dy=$iDays; $dy>=0; $dy=$dy-$iInterval ) {
				$dt = $dy == 0 ? mktime() : strtotime( "-".$dy." days" );
				$sDt = date( "Y-m-d", $dt );
				if ( $bForWidget ) {
					$aInit[] = $sDt;
				} else {
					$aInit[$sDt] = array();
				}
			}
			break;
		}
		return $aInit;
	}

	public static function GetChartInterval( $iDays ) {
		$iInterval = 1;
		if ( $iDays > 31 && $iDays <= 60 ) {
			$iInterval = 4;
		} else if ( $iDays == 31 ) {
			$iInterval = 2;
		} else if ( $iDays > 60 ) {
			$iInterval = 7;
		}
		return $iInterval;
	}
}

?>
