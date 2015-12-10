<?php
class SSCColorScheme {

	private static $aSeriesColors = array(
array( "bg"=>"#5BA586", "line"=>"#E7F2ED" ),
array( "bg"=>"#f8981c", "line"=>"#E7F2ED" ),
array( "bg"=>"#35d3a7", "line"=>"#E7F2ED" ),
array( "bg"=>"#a767d5", "line"=>"#E7F2ED" ),
array( "bg"=>"#689ad3", "line"=>"#E7F2ED" ),
array( "bg"=>"#ff8073", "line"=>"#E7F2ED" ),
array( "bg"=>"gray", "line"=>"#E7F2ED" )
);

	public static function RenderCSS() {
		foreach ( self::$aSeriesColors as $i => $color ) {
			echo '.SSC_legend div:nth-child('.($i+1).') span.dot, .featuring li:nth-child('.($i+1).') span.dot {
				background-color: '.$color["bg"].';
				border-color: '.$color["line"].';
			}' . "\n";
		}
	}
}
?>
