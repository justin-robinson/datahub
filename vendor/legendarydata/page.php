<?php
/* @filename page.php 
 * @description base page class from which all other pages are extended
 * @author D.Feiveson
 * @created_at 20121011 tdf
 * @updated_at 20130818 tdf
 */

class PageNotFoundException extends Exception {}

class UnauthorizedAccessException extends Exception {}

class Page {

	public $headerFile = "header.php";
	public $footerFile = "footer.php";
	public $oUser = null;
	public $publicPage = false;
	public $pathBase = null;
	public $pageBase = null;
	public $ajaxRequest = false;
	
	private $contentArr = array();
	private $subnavArr = array();
	
	public function __construct( $bPublicPage=false ) {
		self::LoadInclude( "meta.php", "controller" );
		$this->publicPage = $bPublicPage;
		//$this->AuthorizeAccess();
		Router::AuthorizeAccess( $this );
	}
	
	public static function IsAjaxRequest() {
		return strpos( $_SERVER["REQUEST_URI"], "/ajax/" ) !== false;
	}
	
	public static function BasePath() {
		return $_SERVER["DOCUMENT_ROOT"];
	}

	public static function SigningOut() {
		return (strpos($_SERVER["REQUEST_URI"], "/user/SignOut")!==false);
	}
	
	public static function HeaderRedirect( $sUrl="/" ) {
		if ( $sUrl == "/" || strpos( $_SERVER[ "REQUEST_URI" ], $sUrl ) === false ) {
			header( 'Location: '.$sUrl );
			exit();
		}
	}
	
	public static function LoadInclude( $sFileName, $sType="view", $aParams=array() ) {
		if ( $sFile = self::GetInclude( $sFileName, $sType ) ) {
			if ( is_array( $aParams ) ) {
				foreach ( $aParams as $sParamName => $sParamVal ) {
					${$sParamName} = $sParamVal;
				}
			}
			require_once( $sFile );
		} else {
			throw new PageNotFoundException();
		}
	}
	
	public static function GetInclude( $sFileName, $sType="" ) {
		$sType = ( $sType ? "/$sType/" : "/" );
		$sPath = self::BasePath() . $sType . $sFileName;
		
		if ( file_exists( $sPath ) ) {
			return $sPath;
		} else {
			return false;
		}
	}
	
	public function ClearFrame() {
		$this->headerFile = "";
		$this->footerFile = "";
	}

	public function SetContent( $sMethodName, $aParams = array() ) {
		$this->contentArr = array( $sMethodName => $aParams );
	}
	
	public function AddContent( $sMethodName, $aParams = array() ) {
		$this->contentArr[ $sMethodName ] = $aParams;
	}
	
	public function AddSubNav( $sMethodName, $aParams = array() ) {
		$this->subnavArr[ $sMethodName ] = $aParams;
	}
	
	public function Resolve( $aMethodNames, $sQueryString ) {
		try {
			$this->Main($aMethodNames, $sQueryString);
			$this->Output();
		} catch ( UnauthorizedAccessException $e ) {
			$this->SendHeader();
			echo '<h1>' . $e->getMessage() . '</h1>';
			$this->SendFooter();
		} catch ( PageNotFoundException $e ) {
			self::SendPageNotFound();
		}
	}

	public static function SendPageNotFound() {
		$oPg = new Page();
		$oPg->SendHeader();
		echo '<h1>Page not found</h1>';
		$oPg->SendFooter();
	}
	
	public static function ParseQueryString( $sQS ) {
		if ( strlen( $sQS ) == 0 ) {
			return array();
		}
		try {
			$aAr = explode( "&", $sQS );
			$aResponse = array();
			foreach ( $aAr as $sTerm ) {
				$sParam = strtok( $sTerm, "=" );
				$sVal = strtok( "=" );
				$aResponse[ $sParam ] = $sVal;
			}
			return $aResponse;
		} catch ( Exception $e ) {
			return array();
		}
	}

	public static function prepJson( $str, $addSlashes=true ) {
		$str = str_replace( array("\n","\r","\t"), array('\n','\r','\t'), $str );
		if ( $addSlashes ) {
			$str = str_replace( array('"'), array('\"'), $str );
		}
		//$str= strtr ($str,chr(13),'-'); // replace carriage return with dash
		//$str=strtr ($str,chr(10),chr(32)); // replace line feed with space
		//$str = str_replace( chr(10), "", $str );
		return $str;
	}

	protected static function ReadExternal( $sPath ) {
		$ch = curl_init(); // init curl
		curl_setopt($ch, CURLOPT_URL, $sPath);
		
		curl_setopt($ch,CURLOPT_ENCODING, '');
		// how many parameters to post
		//curl_setopt($ch, CURLOPT_GET, 1);
		// this just for a bad response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:','Accept-Encoding: gzip,deflate'));
		// the parameter 'username' with its value 'johndoe'
		//curl_setopt($ch, CURLOPT_POSTFIELDS,($isRootRequest?"MROOT":"MCORE")."=".urlencode($json) );
		curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false); //ignore protocol if https
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 ); //ignore ssl name
		$result= curl_exec ($ch);
		
		curl_close ($ch);
		return $result;
	}

	private static function IEVersion( $sAgent ) {
		try {
			$str = substr( $sAgent, strpos($sAgent, "MSIE"));
			$str = str_replace( ".", " ", $str );
			$ar = explode( " ", $str );
			return (int) $ar[1];
		} catch ( Exception $e ) {
			return (int) 0;
		}
	}

	public static function IncompatibleBrowser() {
		$sAgent = $_SERVER['HTTP_USER_AGENT'];
		if ( strpos( $sAgent, "MSIE" ) ) {
			$iVersion = self::IEVersion($_SERVER['HTTP_USER_AGENT']);
			if ( $iVersion < 9 ) return true;
		}
		return false;
	}
	
	public function Main($aMethodNames, $sQueryString) {
		//override in subclasses
		$aQuery = self::ParseQueryString( $sQueryString );
		
		if ( count( $aMethodNames ) ) {
			foreach ( $aMethodNames as $sMethodName ) {
				if ( strlen( $sMethodName ) ) {
					$sMethodName = str_replace( array(".","-"), "_", $sMethodName );
					$this->$sMethodName( $aQuery );
				}
			}
		}
	}
	
	public function BuildParams() {
		return array(
			"oUser"=>$this->oUser,
			"pathId"=>$this->pathBase,
			"pageId"=>$this->pageBase
		);
	}
	
	public function SendHeader() {
		if ( !$this->headerFile ) return;
		$this->LoadInclude( $this->headerFile, "view", $this->BuildParams() );
	}
	
	public function SendFooter() {
		if ( !$this->footerFile ) return;
		self::LoadInclude( $this->footerFile, "view", $this->BuildParams() );
	}
	
	public function SendContent() {
		foreach ( $this->contentArr as $sMethodName  => $aParams ) {
			$this->$sMethodName($aParams);
		}
	}

	public function Output() {
		//include( $_SERVER["DOCUMENT_ROOT"] . "/config.php" );
		$this->SendHeader();
		$this->SendContent();
		$this->SendFooter();
		
	}

	public static function URLTranslateString( $str ) {
		return str_replace(" ", "_", preg_replace("/[^a-zA-Z0-9\s]/", "", strtolower($str)));
	}

	public static function ActiveMenuKey() {
		$uri = strtolower($_SERVER["REQUEST_URI"]);
		if ( strpos( $uri, "polls" ) ) return "polls";
		if ( strpos( $uri, "search" ) ) return "search";
		if ( strpos( $uri, "advanced" ) ) return "advanced";
		if ( strpos( $uri, "inbox" ) ) return "inbox";
		return "";
	}

}
?>
