<?php
	/*
		Simple example on how to list all folders, files and pages within each site in a Cascade Instance
		At the bottom of the file, check the comment if you want to list each site, or just one.
		Example by: Brendon Irwin :D | March 21 / 2014
	*/

	include "db.php";

	$listSitesParams = array ('authentication' => $auth);
	$reply = $client->listSites($listSitesParams);

	//These are the 'types' I'm ignoring but are technically available
	$ignoredTypes = array( "assetfactory", "assetfactorycontainer", "block", "block_FEED", "block_INDEX", "block_TEXT", "block_XHTML_DATADEFINITION", "block_XML", "block_TWITTER_FEED", "connectorcontainer", "twitterconnector", "facebookconnector", "wordpressconnector", "googleanalyticsconnector", "contenttype", "contenttypecontainer", "destination",  "group", "message", "metadataset", "metadatasetcontainer",  "pageconfigurationset", "pageconfiguration", "pageregion", "pageconfigurationsetcontainer", "publishset", "publishsetcontainer", "reference", "role", "datadefinition", "datadefinitioncontainer", "format", "format_XSLT", "format_SCRIPT",  "sitedestinationcontainer", "symlink", "target", "template", "transport", "transport_fs", "transport_ftp", "transport_db", "transportcontainer", "user", "workflow", "workflowdefinition", "workflowdefinitioncontainer");
	
	//These are types I'm using in this example
	$safeTypes = array( "folder", "file", "page", "site" );
	
	//This function just allows you to print out an obj. I was using it for debugging and will leave it here
	function print_form( $obj ){
		echo '<pre>'.print_r($obj,true).'</pre>';
	}
	
	//function which will call itself to make the tree with some classes
	function read_folders($folder, $siteId){
		global $auth, $client;
		if( isset ( $folder->readReturn->asset->folder ) ) {
			$folder = $folder->readReturn->asset->folder;
			if( isset( $folder->readReturn->asset->folder->name ) ){
				echo $folder->readReturn->asset->folder->name;
			}else{
				echo $folder->name;
			}
			echo "<ul class='folder folderContents'>"; 
				$path = $folder->path;
				$identifier = array('path' => array('siteId' => $siteId, 'path' => $path), 'type' => 'folder'  ); //will read the folder itself...
				$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
				$folder = $client->read($readParams);

				$folderPath = $folder->readReturn->asset->folder->path;
				$folderChildren = null;
				if( isset($folder->readReturn->asset->folder->children->child) ){
					$folderChildren = $folder->readReturn->asset->folder->children->child; //array
				}

				if( isset($folderChildren) ){
					$children = $folder->readReturn->asset->folder->children->child; //array
					foreach($children as $child ){
						
						if( isset( $child->type ) && $child->type == "folder"  ){
							$folderPath = $child->path->path;
							echo "<li class='folder'>";
							show_contents( $child->path->path, $siteId );
							echo "</li>";
						}else if( isset( $child->type ) && $child->type == "file" ) {
							$filePath = $child->path->path;
							echo "<li class='file'>".$filePath."</li>";
						
						}else if( isset( $child->type ) && $child->type == "page" ) {
							$pagePath = $child->path->path;
							echo "<li class='page'>".$pagePath."</li>";
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
		$folder = $client->read($readParams);
		read_folders($folder, $siteId);
	}	
	
	//Initial function to read a site
	function read_site( $namePath ){
		global $auth, $client;
		$identifier = array('path' => array('path' => $namePath),'type' => 'site');
		$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
		$reply = $client->read($readParams);
		echo "<h2>".$reply->readReturn->asset->site->name." (".$reply->readReturn->asset->site->url.")</h2>";
		echo "<ul class='site'>";
			show_contents( '/', $reply->readReturn->asset->site->id );
		echo "</ul>";
	}
	
	if (isset($reply->listSitesReturn) && $reply->listSitesReturn->success=='true'){
		$sites = $reply->listSitesReturn->sites->assetIdentifier;
		if( is_array($sites) && sizeof( $sites ) > 0 ){
			foreach( $sites as $site){
				//id, path[path, siteId, siteName], type, recycled
				echo "Site Name: ".($site->path->siteName == "" ? $site->path->path : $site->path->siteName)." (id: ".$site->id.")<br />";
		
				//If we're only interested in reading one site
				//if( $site->path->path == "SITE_NAME"){
				//	read_site( $site->path->path );
				//}
				
				//otherwise just show them all
				read_site( $site->path->path );
				echo '<hr />';
			}
		}
	}
?>