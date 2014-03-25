<?php
	/*
		Simple example on how to list all folders, files and pages within each site in a Cascade Instance
		At the bottom of the file, check the comment if you want to list each site, or just one.
		Example by: Brendon Irwin :D | March 21 / 2014
	*/

	include "db.php";
	include "classes/page.php";
	include "classes/folder.php";
	include "classes/file.php";
	include "classes/contentType.php";
	include "classes/configurationSet.php";

	$listSitesParams = array ('authentication' => $auth);
	$reply = $client->listSites($listSitesParams);

	//These are the 'types' I'm ignoring but are technically available
	$ignoredTypes = array( "assetfactory", "assetfactorycontainer", "block", "block_FEED", "block_INDEX", "block_TEXT", "block_XHTML_DATADEFINITION", "block_XML", "block_TWITTER_FEED", "connectorcontainer", "twitterconnector", "facebookconnector", "wordpressconnector", "googleanalyticsconnector", "contenttype", "contenttypecontainer", "destination",  "group", "message", "metadataset", "metadatasetcontainer",  "pageconfigurationset", "pageconfiguration", "pageregion", "pageconfigurationsetcontainer", "publishset", "publishsetcontainer", "reference", "role", "datadefinition", "datadefinitioncontainer", "format", "format_XSLT", "format_SCRIPT",  "sitedestinationcontainer", "symlink", "target", "template", "transport", "transport_fs", "transport_ftp", "transport_db", "transportcontainer", "user", "workflow", "workflowdefinition", "workflowdefinitioncontainer");
	
	//These are types I'm using in this example
	$safeTypes = array( "folder", "file", "page", "site" );
	
	//URL variable used to build anchor tags
	$CURRENT_SITE_URL = "http://cascade.wlu.ca/";
	
	
	//This function just allows you to print out an obj. I was using it for debugging and will leave it here
	function print_form( $obj ){
		echo '<pre>'.print_r($obj,true).'</pre>';
	}
	
	
	
	function read_configurationSet( $configID ){
		global $auth, $client;
		$identifier = array('id' => $configID, 'type' => 'pageconfigurationset'  ); 
		$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
		$CS = $client->read($readParams);
		
		//echo "Configuration ID: ".$configID ;
		
		if( $CS->readReturn->success == true &&  isset( $CS->readReturn->asset->pageConfigurationSet ) ){ 
			$configurationSet = new ConfigurationSet($CS->readReturn->asset->pageConfigurationSet);
			return $configurationSet;
		}
		
	}
	
	
	function read_contentType( $contentType ){
		global $auth, $client;
		//echo "Content Type ID: ".$contentType;
		
		$identifier = array('id' => $contentType, 'type' => 'contenttype'  ); //will read the page itself...
		$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
		$CT = $client->read($readParams);
			
		if( $CT->readReturn->success == true &&  isset( $CT->readReturn->asset->contentType ) ){ 
			$contentType = new ContentType($CT->readReturn->asset->contentType);
			return $contentType;
		}

	}
	
	
	function readPage($pageID){
		global $auth, $client, $CURRENT_SITE_URL;
		
		$identifier = array('id' => $pageID, 'type' => 'page'  ); //will read the page itself...
		$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
		$page = $client->read($readParams);
		
		if( isset($page->readReturn->success) && $page->readReturn->success == true ){
			$page = $page->readReturn->asset->page;
		
			$p = new Page( $client, $readParams );
			$ct = read_contentType( $p->getContentTypeId() );
			$cs = read_configurationSet( $ct->getPageConfigurationSetId() );
			
			$pc =  $cs->getPageConfigurations();
		
			$apc = $cs->getActiveConfiguration();
			
			//check if page is publishable
			if( $p->isPublished() ){
				echo "<a target='_blank' href='".$CURRENT_SITE_URL.$p->getPath().$apc->getOutputExtension()."'>".$p->getName()."</a> [Published: ".$p->isPublished()."] by: ".$p->getCreatedBy();
			}
		}else{
		
		}
		//print_form( $page );
	}
	
	function read_File( $fileID ){
		global $auth, $client, $CURRENT_SITE_URL;
		$identifier = array('id' => $fileID, 'type' => 'file'  ); //will read the page itself...
		$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
		
		$file = new AssetFile( $client, $readParams );
		
		echo "<a target='_blank' href='".$CURRENT_SITE_URL.$file->getPath()."'>".$file->getName()."</a>";

	}
	
	//function which will call itself to make the tree with some classes
	function read_folder($folder){
		if( isset ( $folder )  ) {
			echo $folder->getName();
			
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
		$identifier = array('path' => array('siteId' => $siteId, 'path' => $path), 'type' => 'folder'  ); //will read the folder itself...
		$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
		$folder = new Folder( $client, $readParams );
		
		return $folder;
	}	
	
	//Initial function to read a site
	function read_site( $namePath ){
		global $auth, $client;
		$identifier = array('path' => array('path' => $namePath),'type' => 'site');
		$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
		$reply = $client->read($readParams);
		
		echo "<h2>".$reply->readReturn->asset->site->name." (".$reply->readReturn->asset->site->url.")</h2>";
		global $CURRENT_SITE_URL;
			   //$CURRENT_SITE_URL = $reply->readReturn->asset->site->url;
		echo "<ul class='site'>";
			read_folder( show_contents( '/', $reply->readReturn->asset->site->id ) );
		echo "</ul>";
	}
	
	if (isset($reply->listSitesReturn) && $reply->listSitesReturn->success=='true'){
		$sites = $reply->listSitesReturn->sites->assetIdentifier;
		if( is_array($sites) && sizeof( $sites ) > 0 ){
			foreach( $sites as $site){
				//id, path[path, siteId, siteName], type, recycled
				echo "Site Name: ".($site->path->siteName == "" ? $site->path->path : $site->path->siteName)." (id: ".$site->id.")<br />";
				
				
				//If we're only interested in reading one site
				if( $site->path->path == "Introduction"){
					read_site( $site->path->path );
				}
				
				//otherwise just show them all
				//read_site( $site->path->path );
				//echo '<hr />';
			}
		}
	}
?>