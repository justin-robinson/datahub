<?php

class MUtils {
	public static function NumberFormat( $nNum, $iDec, $posNeg=false ) {
		if ( !is_numeric( $nNum ) ) return $nNum;
		$sNum = number_format( $nNum, $iDec );
		if ( $posNeg && $nNum != 0 ) {
			$sNum = ($nNum > 0 ? "+" : "" ) . $sNum;
		}
		return $sNum;
	}

	public static function FormatNumeric( $key, $val ) {
		
		$val = self::NumberFormat( $val, 0);
		if ( substr( $key, -6 ) == "Volume" || substr( $key, -5 ) == "value" ) {
			$val = '$' . $val;
		}
		return $val;
	}
}

?>
