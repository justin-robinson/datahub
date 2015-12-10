<?php
 /* @filename model/widget.php
  * @description class User
  * @created_at 20130122
  * @author D.Feiveson
  * @updated_at 
  */

class SSCWidget extends DBObject {

	public $id = null;
	public $title = null;
	private $reportId;
	public $dayRange;
	public $graphKey;
	public $aRecs = array();
	public $listId = null;
	
	public function __construct($aData=null) {
		parent::__construct();
		if ( is_numeric( $aData ) ) {
			$this->id = $aData;
		} else if ( is_array( $aData ) ) {
			if ( isset( $aData[ "id" ] ) ) {
				$this->id = $aData[ "id" ];
			}
			if ( isset( $aData[ "dayrange" ] ) ) {
				$this->dayRange = $aData[ "dayrange" ];
			}
			if ( isset( $aData[ "graphkey" ] ) ) {
				$this->graphKey = $aData[ "graphkey" ];
			}
			if ( isset( $aData[ "title" ] ) ) {
				$this->title = $aData[ "title" ];
			}
			if ( isset( $aData[ "recs" ] ) && is_array( $aData[ "recs" ] ) ) {
				foreach ( $aData[ "recs" ] as $oRec ) {
					$this->aRecs[] = (array) $oRec;
				}
			}
		}
		if ( is_numeric( $this->id ) ) {
			$this->Retrieve();
		}
	}

	public function ReportId() {
		return $this->reportId;
	}

	public function Retrieve() {
		/* retrieve from db */
		$hRes = $this->Select( "SELECT * from widget where id = $this->id" );
		if ( $aRow = $this->GetRow( $hRes ) ) {
			if ( $this->graphKey == null )
				$this->graphKey = $aRow["graphkey"];
			if ( $this->dayRange == null )
				$this->dayRange = $aRow["dayrange"];
			if ( $this->title == null )
				$this->title = $aRow["title"];
			$this->reportId = $aRow["reportid"];
		}
		if ( count( $this->aRecs ) == 0 ) {
			$hRes = $this->Select( "SELECT recid as id, name from widgetrec where widgetid = $this->id ORDER BY position asc" );
			while ( $aRow = $this->GetRow( $hRes ) ) {
				$this->aRecs[] = $aRow;
			}
		}
	}

	public function HasNoRecs() {
		return ( count( $this->aRecs ) == 0 );
	}

	public function GetReport() {
		$oReport = new Report( (int) $this->reportId );
		return $oReport;
	}

	public function ToArray() {
		foreach ( $this->GetRecs() as $oRec ) {
			$aRecs[] = $oRec->ToArray();
		}
		$aResponse = array(
			"id"=>$this->id,
			"dayrange"=>$this->dayRange,
			"graphkey"=>$this->graphKey,
			"recs"=>$aRecs
		);
		return $aResponse;
	}

	public static function MakeChartData( $aRecs, $sKey, $iDays=31 ) {
		//if ( $sKey == "FacebookAvgTimeOfDay" ) {
		//	return self::MakeChartTimeOfDayData( $aRecs, $sKey );
		//}
		$aResponse = array();
		/*$aInit = array();
		$iInterval = self::GetChartInterval( $iDays );
		for ( $dy=$iDays; $dy>=0; $dy=$dy-$iInterval ) {
			$dt = $dy == 0 ? mktime() : strtotime( "-".$dy." days" );
			$sDt = date( "Y-m-d", $dt );
			$aInit[ $sDt ] = array();
		}*/

		$sKey = strtok( $sKey, "_" );
		$bDelta = ( strtok( "_" ) == "Change" );

		$aInit = SSCUtils::GrokDateStream( $iDays, $aRecs[0]->ExtractChartData( $sKey ), false );
		
		$aZeroArray = array();
		
		foreach ( $aRecs as $oRec ) {
			$aZeroArray["rec".$oRec->Id ] = 0;
			try {
				//if ( !isset( $oRec->History[$sKey] ) ) continue;
				//if ( !is_object( $oRec->History[$sKey][0] ) ) continue;
				//here's where I am taking only the first (no SUBKEY)
				//$aData = $oRec->History[$sKey][0]->DATA;
				$aData = $oRec->ExtractChartData($sKey);
				
				if ( !is_array( $aData ) ) continue;
			} catch ( Exception $e ) {
				continue;
			}
			$lastVal = null;
			foreach ( $aData as $oItem ) {
				foreach ( $oItem as $dt => $val ) {
					if ( $sKey == "CurrentScore" ) {
						$val =MUtils::NumberFormat( $val * 100, 1 ) - 1;
					}
					if ( isset( $aInit[ $dt ] ) ) {
						if ( $bDelta ) {
							if ( $lastVal != null ) {
								$newVal = $val - $lastVal;
								$lastVal = $val;
								$val = $newVal;
								
							} else {
								$lastVal = $val;
								continue;
							}
							
						}
						//echo $oRec->Name . ": ".$val." ($dt)\n";
						$aInit[ $dt ][ "rec".$oRec->Id ] = $val;
					}
				}
			}
		}
		foreach ( $aInit as $dt => $dat ) {
			if ( count( $dat ) == 0 ) {
				continue;
			}
			$dat[ "date" ] = $dt;
			$aResponse[] = $dat;
		}
		return $aResponse;
	}

	public function ToJson() {
		return json_encode( $this->ToArray() );
	}

	public static function randomFileName($iLen=15) {
    		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		$randomString = '';
    		for ($i = 0; $i < $iLen; $i++) {
        		$randomString .= $characters[rand(0, strlen($characters) - 1)];
    		}
    		return $randomString;
	}

	public function Cache( $sSource="", $bPrimaryOnly=true ) {
		$iCount=0;
		while ( !isset( $sLink ) || $this->GetRow( $this->Select( "SELECT * from widgetcache where widgetcachekey='$sLink'" ) ) ) {
			$sLink = self::randomFileName(5);
			$iCount++;
			if ( $iCount > 5 ) die( "iCount = ".$iCount );
		}
		//$sFileName = Widget::randomFileName();
		//$sFilePath = $this->ToFile( $sFileName );
		$sSVG = self::ToSVG($bPrimaryOnly);
		$this->Insert(
			"INSERT INTO widgetcache (widgetcachekey, svg, source) VALUES
			('$sLink', '".DBObject::EscapeString($sSVG)."', '".DBObject::EscapeString($sSource)."');"
		);
		return $sLink;
	}

	public static function LoadImageFromCache( $sCacheKey ) {
		$oWidget = new Widget();
		$hRes = $oWidget->Select( "SELECT svg, source from widgetcache where widgetcachekey = '$sCacheKey'" );
		if ( $aRow = $oWidget->GetRow( $hRes ) ) {
			return array( $aRow["svg"], $aRow["source"] );
		}
	}

	public function ToSVG($bPrimaryOnly=true) {
		return self::Graph( $this->GetRecs(), $this->graphKey, $this->dayRange, array(
			"peeravg"=>false,
			"legend"=>true,
			"title"=>"",
			"width"=>470,
			"height"=>350,
			"override"=>array(
				"back_colour"=>"white"
			),
			"toVar"=>true
		), $bPrimaryOnly);
	}

	public function ToFile( $sFileName, $sFormat="png" ) {
		$sFilePath = "/tmp/".$sFileName.".svg";
		self::Graph( $this->GetRecs(), $this->graphKey, $this->dayRange, array(
			"peeravg"=>false,
			"legend"=>true,
			"title"=>"",
			"width"=>470,
			"height"=>350,
			"override"=>array(
				"back_colour"=>"white"
			),
			"filePath"=>$sFilePath
		));
		$sPath = $_SERVER["DOCUMENT_ROOT"];
		$sOutPath = $sPath."/cache/${sFileName}.${sFormat}";
		//${sPath}/images/ssc-graph-header.png 
		$sCmd = "/usr/bin/convert ${sPath}${sFilePath} ${sPath}/images/ssc-graph-footer.png -append $sOutPath";
		//echo $sCmd;
		exec( $sCmd, $a1, $a2 );
		//print_r( $a1 );
		//print_r( $a2 );
		//convert images/ssc-logo-notext.png tmp/somefile.svg -append new.png
		return "/cache/${sFileName}.${sFormat}";
	}

	public function Save( $iReportId=null, $iPosition=0 ) {
		/* save the widget to db */
		if ( $this->id == null ) {
			$hRes = $this->Insert( "INSERT INTO widget (reportid, position, dayrange, graphkey)
			VALUES ($iReportId, $iPosition, $this->dayRange, '$this->graphKey');" );
			$this->id = $this->GetInsertId( $hRes );
		}
		
		$this->Update( "UPDATE widget 
		SET dayrange = '$this->dayRange', graphKey='$this->graphKey', 
			title='".DBObject::EscapeString($this->title)."'
		WHERE id = $this->id" );		

		$this->Delete( "Delete from widgetrec where widgetid = $this->id" );
		
		foreach ( $this->aRecs as $iPos => $aRec ) {
			$this->Insert( "Insert into widgetrec (widgetid, position, recid, name) VALUES
			($this->id, $iPos, ".$aRec["id"].", '".DBObject::EscapeString($aRec["name"])."');" );
		}
	}

	public function Remove() {
		$this->Delete( "Delete from widgetrec where widgetid = $this->id" );
		$this->Delete( "Delete from widget where id = $this->id" );
	}

	public static function QueryRecs( $sRecIdQry, $iListId=null ) {
		$aRecs0 = Rec::Search( "ID:(".$sRecIdQry.")", $iListId );
		//$aRecs0 = ScoreCard::Search( "ID:(".$sRecIdQry.")" );
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

	public function GetRecs() {
		$sRecIds = "";
		foreach ( $this->aRecs as $aRec ) {
			$sRecIds .= ( strlen( $sRecIds ) > 0 ? " " : "" ) . $aRec["id"];
		}
		/*$aRecs0 = ScoreCard::Search( "ID:(".$sRecIds.")", 50 );
		
		$aRecs = array();
		$aRecIds = explode( " ", $sRecIds );
		foreach ( $aRecIds as $recId ) {
			foreach ( $aRecs0 as $oRec ) {
				if ( $oRec->Id == $recId ) {
					$aRecs[] = $oRec;
					break;
				}
			}
		}
		return $aRecs;*/
		return self::QueryRecs( $sRecIds, $this->listId );
	}

	public static function Graph( $aRecs, $graphKey, $dayRange, $aConf=array(
			"peeravg"=>false,
			"legend"=>true,
			"title"=>"",
			"width"=>470,
			"height"=>350
		), $bPrimaryOnly=true ) {
		
		$aSeriesColors = array("#5BA586", "#f8981c","#35d3a7","#a767d5","#689ad3","#ff8073","#242424");
		if ( count( $aRecs ) == 0 ) return "";
		require_once( $_SERVER["DOCUMENT_ROOT"] . "/lib/svgGraph/SVGGraph.php" );
		$bIncludePeerAvg = (isset($aConf["peeravg"]) && $aConf["peeravg"] === true);
		list( $aData, $min, $max ) = ScoreCard::MakeWidgetData( $aRecs, $graphKey, $dayRange, $bIncludePeerAvg, $bPrimaryOnly );
		//axis_max_v'=>1,
		$settings = array(
		  'back_colour'       => 'transparent',    'stroke_colour'      => '#000',
		  'back_stroke_width' => 0,         'back_stroke_colour' => '#eee',
		  'axis_colour'       => '#242424',    'axis_overlap'       => 2,
		  'axis_font'         => 'Georgia', 'axis_font_size'     => 10,
		  'grid_colour'       => '#eee',    'label_colour'       => '#242424',
		  'pad_right'         => 20,        'pad_left'           => 20,
		  'link_base'         => '/',       'link_target'        => '_top',
		  //'fill_under'        => array(true, false),
		  'marker_size'       => 3,
		  'marker_type'       => array('circle'),
		  'marker_colour'     => $aSeriesColors,
		  'marker_stroke_width' => 1,
			'marker_stroke_colour'=>'#dddddd',
			'axis_text_angle_h' => -45,
			'label_y' => $graphKey,
			'label_x' => "Last ".$dayRange." days",
			'force_assoc' => true
		);
		
		if ( $max == $min ) {
			$settings[ "axis_max_v" ] = 10;
		} else {
			$settings[ "axis_max_v" ] = $max;
			$settings[ "axis_min_v" ] = $min;
		}
		if ( $aConf["legend"] ) {
			$settings['legend_position'] = "upper left 10 10";
			$settings['legend_back_colour'] = "#ccc";
			$settings['legend_columns'] = 1;
			$settings['legend_round'] = 5;
			$settings['legend_entry_height'] = 5;
			
			if ( is_array( $aConf["legend"] ) ) {
				foreach ( $aConf["legend"] as $key => $val ) {
					$settings['legend_'.$key] = $val;
				}
			}

			if ( !isset( $settings[ 'legend_entries' ] ) ) {
				$aRecNames = array();
				foreach ( $aRecs as $oRec ) {
					$aRecNames[] = $oRec->Name;
				}
				$settings['legend_entries'] = $aRecNames;
			}
		}

		if ( isset( $aConf["override"] ) && is_array( $aConf["override"] ) ) {
			foreach ( $aConf["override"] as $key => $val ) {
				$settings[$key] = $val;
			}
		}

		if ( isset( $aConf["title"] ) && $aConf["title"] ) {
			$settings[ 'graph_title' ] = $aConf["title"];
			$settings[ 'graph_title_font_weight' ] = 'bold';
		}

		$graph = new SVGGraph($aConf["width"], $aConf["height"], $settings );
 		$graph->colours = $aSeriesColors;
 		$graph->Values($aData);

		//echo $graph->Fetch('MultiLineGraph', false, false );
		//$svg = str_replace( '"init()"', '""', $svg );
		//echo $svg;
		if ( isset( $aConf[ "filePath" ] ) ) {
			file_put_contents( $_SERVER["DOCUMENT_ROOT"].$aConf["filePath"], $graph->Fetch('MultiLineGraph', false, false ) );
		} else if ( isset( $aConf[ "toVar" ] ) ) {
			return $graph->Fetch('MultiLineGraph', false, false );
		} else {
			$graph->Render('MultiLineGraph', false, false );
		}
	}

	public function RenderForPrint() {
		$aRecs = $this->GetRecs();
		echo '<li class="droppable" id="'.$this->id.'">';
		self::MakeLegend( $aRecs, true );
		self::Graph( $aRecs, $this->graphKey, $this->dayRange, array(
			"height"=>240,
			"width"=>260,
			"title"=>$this->title,
			"legend"=>false,
			"override"=>array( "label_space"=>0, "label_font_size"=>10, "axis_font_size"=>9 )
		) );
		echo '</li>';
	}

	public function BuildForReport() {
		self::Graph( $this->GetRecs(), $this->graphKey, $this->dayRange, array(
			"legend"=>false,
			"title"=>$this->title,
			"width"=>470,
			"height"=>350
		) );
	}

	

	public function Render() {
		/* method that pulls in data and returns SVG for printing to screen or file! */
		/*if ( count( $this->aRecs ) == 0 ) return "";
		require_once( $_SERVER["DOCUMENT_ROOT"] . "/lib/svgGraph/SVGGraph.php" );
		$aRecs = $this->GetRecs();
		$aData = ScoreCard::MakeWidgetData( $aRecs, $this->graphKey, $this->dayRange );

		$aSeriesColors = array("#5BA586", "#f8981c","#35d3a7","#a767d5","#689ad3","#ff8073","#242424");

		$aRecNames = array();
		foreach ( $aRecs as $oRec ) {
			$aRecNames[] = $oRec->Name;
		}

		$settings = array(
		  'back_colour'       => 'transparent',    'stroke_colour'      => '#000',
		  'back_stroke_width' => 0,         'back_stroke_colour' => '#eee',
		  'axis_colour'       => '#242424',    'axis_overlap'       => 2,
		  'axis_font'         => 'Georgia', 'axis_font_size'     => 10,
		  'grid_colour'       => '#eee',    'label_colour'       => '#242424',
		  'pad_right'         => 20,        'pad_left'           => 20,
		  'link_base'         => '/',       'link_target'        => '_top',
		  //'fill_under'        => array(true, false),
		  'marker_size'       => 3,
		  'marker_type'       => array('circle'),
		  'marker_colour'     => $aSeriesColors,
			'axis_text_angle_h' => -45,
			'legend_entries' => $aRecNames,
			'legend_position' => "top left 12 12",
			'legend_back_colour' => "#ccc",
			'legend_round' => 5,
			'legend_opacity'=> 0.5,
			'label_y' => $this->graphKey,
			'label_x' => "Last ".$this->dayRange." days"
		);

		if ( $this->title ) {
			$settings[ 'graph_title' ] = $this->title;
			$settings[ 'graph_title_font_weight' ] = 'bold';
		}

		$w = 470;
		$h = 350;
		if ( $printMode ) {
			$w = 290;
			$h = 216;
		}

 		$graph = new SVGGraph($w, $h, $settings );
 		$graph->colours = $aSeriesColors;
 		$graph->Values($aData);
 		//$graph->Links('/Tom/', '/Dick/', '/Harry/');*/

		echo '<li class="droppable" id="'.$this->id.'">';
 		//$graph->Render('MultiLineGraph', false, false );
		//echo '<object height="350" width="470" data="/ajax/report/graph?widgetId='.$this->id.'" type="image/svg+xml" />';
		echo '<input type="button" class="edit green" value="Edit" />';
		echo '<input type="button" class="delete green" value="Delete" />';
		$aRecs = $this->GetRecs();
		self::MakeLegend( $aRecs );
		self::Graph( $aRecs, $this->graphKey, $this->dayRange, array(
			"legend"=>false,
			"title"=>$this->title,
			"width"=>335,
			"height"=>300
		), true );
		//echo '" type="image/svg+xml" />';
		echo '</li>';
	}

	private static function makeLegend( $aRecs, $bInlineColors=false ) {
		echo '<div class="SSC_legend">';
		$aColorSeries = ConfigObject::Get( "ColorSeries" );
		foreach ( $aRecs as $i => $oRec ) {
			echo '<div>';
			if ( $bInlineColors ) {
				$color = $aColorSeries[ $i ];
				//echo 'style="width:5px;height:5px;margin-top:4px;border-radius:20px;float:left;background-color:'.$color['bg'].';border-color:'.$color['line'].';" ';
				echo '<svg style="margin-left:0;" height="6" width="6" xmlns="http://www.w3.org/2000/svg" version="1.1">
  <circle cx="3" cy="3" r="3" stroke="'.$color["line"].'" stroke-width="1" fill="'.$color["bg"].'"/></svg> '.$oRec->Name;
			} else {
				echo '<span class="dot"></span>';
				echo '<label>'.$oRec->Name.'</label>';
			}
			echo '</div>';
		}
		echo '</div>';
	}
}

?>
