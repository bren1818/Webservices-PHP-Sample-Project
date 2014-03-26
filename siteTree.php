<?php
	/*
		Simple example on how to list all folders, files and pages within each site in a Cascade Instance
		At the bottom of the file, check the comment if you want to list each site, or just one.
		Example by: Brendon Irwin :D | March 21 / 2014
	*/

	include "db.php";
	include "classes/file.php";
	include "classes/baseAsset.php";
	


	//These are the 'types' I'm ignoring but are technically available
	$ignoredTypes = array( "assetfactory", "assetfactorycontainer", "block", "block_FEED", "block_INDEX", "block_TEXT", "block_XHTML_DATADEFINITION", "block_XML", "block_TWITTER_FEED", "connectorcontainer", "twitterconnector", "facebookconnector", "wordpressconnector", "googleanalyticsconnector", "contenttypecontainer", "destination",  "group", "message", "metadataset", "metadatasetcontainer",  "pageconfigurationsetcontainer", "publishset", "publishsetcontainer", "reference", "role", "datadefinition", "datadefinitioncontainer", "format", "format_XSLT", "format_SCRIPT",  "sitedestinationcontainer", "symlink", "target", "template", "transport", "transport_fs", "transport_ftp", "transport_db", "transportcontainer", "user", "workflow", "workflowdefinition", "workflowdefinitioncontainer");
	
	//These are types I'm using in this example
	$safeTypes = array( "folder", "file", "page", "site", "pageconfiguration", "pageconfigurationset", "pageregion", "contenttype"  );
	
	//URL variable used to build anchor tags
	$CURRENT_SITE_URL = "http://cascade.wlu.ca/";
	
	
	//This function just allows you to print out an obj. I was using it for debugging and will leave it here
	function print_form( $obj ){
		echo '<pre>'.print_r($obj,true).'</pre>';
	}
	
	function readPage($pageID){
	
		global $auth, $client, $CURRENT_SITE_URL;
	
		$asset = new BaseAsset($client, $auth);
		$p = $asset->getById( BaseAsset::$type_page, $pageID );
		$ct = $asset->getById( BaseAsset::$type_contentType, $p->getContentTypeId() );
		$cs = $asset->getById( BaseAsset::$type_pageConfigurationSet , $ct->getPageConfigurationSetId() );
		
		//$pc =  $cs->getPageConfigurations();
		$apc = $cs->getActiveConfiguration();
		
		//check if page is publishable
		if( $p->isPublished() ){
			echo "<a target='_blank' href='".$CURRENT_SITE_URL.$p->getPath().$apc->getOutputExtension()."'>".$p->getName()."</a> [Published: ".$p->isPublished()."] by: ".$p->getCreatedBy();
		}
		
	}
	
	function read_File( $fileID ){
		global $auth, $client, $CURRENT_SITE_URL;
		$asset = new BaseAsset($client, $auth);
		$file = $asset->getById( BaseAsset::$type_file, $fileID );
		echo "<a target='_blank' href='".$CURRENT_SITE_URL.$file->getPath()."'>".$file->getName()."</a>";
	}
	
	//function which will call itself to make the tree with some classes
	function read_folder($folder){
		global $CURRENT_SITE_URL;	
		if( isset ( $folder )  ) {
			$displayPath = 0;
			if( $folder->hasChildren() ){
				foreach( $folder->getChildren() as $child ){

					if( $child->getType() == "page" && end( explode( "/", $child->getPath() ) ) == "index" ){
						$displayPath = 1;
						break;
					}					
				}
			}
			
			if( $displayPath ){
				echo "<a target='_blank' href='".$CURRENT_SITE_URL.$folder->getPath()."/index.html'>".$folder->getName()."</a>";
			}else{
				echo $folder->getName();
			}

			echo "<ul class='folder folderContents'>"; 
				if( $folder->hasChildren() ){
					$children = $folder->getChildren(); //null;
					foreach($children as $child ){ //array of childFolder elements	
						if(  $child->getType() == "folder"  ){
							$nextFolder = show_contents( $child->getPath(), $child->getSiteId() );
							if( $nextFolder->getShouldBePublished() ){
								echo "<li class='folder'>";
									read_folder( $nextFolder );	
								echo "</li>";
							}
						}else if(  $child->getType() == "file" ) {
							echo "<li class='file'>";
								read_File( $child->getId() );
							echo "</li>";
						}else if(  $child->getType() == "page" ) {
							echo "<li class='page'>";
								readPage( $child->getId() );
							echo "</li>";
						}else{
							//Not something we're likely interested in
						}
					}
				}else{
					//no children elements
				}
			echo "</ul>";
		}
	}
	
	//Looks at the contents of a folder or site root and calls the read_folders function
	function show_contents( $path, $siteId ){
		global $auth, $client;
		$asset = new BaseAsset($client, $auth);
		$folder = $asset->getByPath( BaseAsset::$type_folder, $path, $siteId );
		return $folder;
	}	
	
	//Initial function to read a site
	function read_site( $sitePath ){
		global $auth, $client;
		$asset = new BaseAsset($client, $auth);
		$site = $asset->getByPath( BaseAsset::$type_site, $sitePath );
		
		echo "<h2>".$site->getName()." (".$site->getUrl().")</h2>";
		//global $CURRENT_SITE_URL;
		//$CURRENT_SITE_URL = $site->getUrl();
		echo "<ul class='site'>";
			read_folder( show_contents( '/', $site->getId() ) );
		echo "</ul>";
	}
	
	$sites = new BaseAsset($client, $auth);
	$sites = $sites->listSites();
	
	if( is_array($sites) && sizeof( $sites ) > 0 ){
		foreach( $sites as $site){
			echo "Site Name: ".($site->getSiteName() == "" ? $site->getPath() : $site->getSiteName())." (id: ".$site->getId().")<br />";
			
			//If we're only interested in reading one site
			if( $site->getPath() == "Introduction"){
				read_site( $site->getPath() );
			}
		}
	}
?>