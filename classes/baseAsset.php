<?php
/*
 *Simple Base Asset Class 
 *by Brendon Irwin
 */
	require_once("fileSystemAsset.php");
	require_once("file.php");
	require_once("page.php");
	require_once("folder.php");
	
	require_once("contentType.php");
	require_once("pageConfiguration.php");
	require_once("configurationSet.php");
	require_once("site.php");

	class BaseAsset{
		private $authentication;
		private $client;
		
		public static $type_folder = 'folder';
		public static $type_file = 'file';
		public static $type_page = 'page';
		public static $type_contentType = 'contentType';
		public static $type_pageConfigurationSet = 'pageConfigurationSet';
		public static $type_site = 'site';
	
		function __construct( $client, $auth ){
			$this->setAuth($auth);
			$this->setClient($client);
		}
		
		function getById($TYPE, $ID){
			$identifier = array('id'=>$ID, 'type'=>strtolower($TYPE));
			return $this->getAsset($TYPE, $identifier);
		}
		
		function getByPath($TYPE, $PATH, $SITE_ID = ""){
			if( $TYPE == BaseAsset::$type_site ){
				$identifier = array('path' => array('path' => $PATH),'type' => strtolower($TYPE) );
			}else{
				$identifier = array('path' => array('siteId' => $SITE_ID, 'path' => $PATH), 'type' => strtolower($TYPE)  );
			}
			return $this->getAsset($TYPE, $identifier);
		}
		
		function setAuth($auth){
			$this->authentication = $auth;
		}
		
		function setClient($client){
			$this->client = $client;
		}
		
		private function getAsset($TYPE, $identifier){
			$readParameters = array('authentication'=>  $this->authentication , 'identifier' => $identifier);
			$asset = $this->client->read( $readParameters );
			
			if( $asset->readReturn->success == true && isset(  $asset->readReturn->asset->$TYPE ) ){
			
				switch ($TYPE){
					case BaseAsset::$type_page:
						return new Page( $asset->readReturn->asset->$TYPE );
						break;
					case BaseAsset::$type_contentType:
						return new ContentType( $asset->readReturn->asset->$TYPE );
						break;
					case BaseAsset::$type_pageConfigurationSet:
						return new ConfigurationSet( $asset->readReturn->asset->$TYPE );
						break;
					case BaseAsset::$type_folder:
						return new Folder( $asset->readReturn->asset->$TYPE );
						break;
					case BaseAsset::$type_file:
						return new AssetFile( $asset->readReturn->asset->$TYPE );
						break;
					case BaseAsset::$type_site:
						return new Site($asset->readReturn->asset->$TYPE); // to do make class
						break;
					default:
					break;
				}
			
			}else{
				return $asset;
				//return array("Error" => "Could not read ".$TYPE." with identifier: ".print_r( $identifier, true));
			}
		
		}
		
		/*
		function getAuth(){
			return $this->authentication;
		}
		*/
	
	}
?>