<?php
include "db.php";

$searchInfo = array 
(
	'assetName' => 'index', 			//[string] 
	'matchType' => 'match-any', 		//[match-all, match-any] *REQUIRED
	'searchBlocks' => true, 			//[boolean]
	'searchFiles' => true,				//[boolean]
	'searchFolders' => true,			//[boolean]
	'searchPages' => true,				//[boolean]
	'searchStylesheets' => true,		//[boolean]
	'searchSymlinks' => true,			//[boolean]
	'searchTemplates' => true			//[boolean]
);

$searchParams = array ('authentication' => $auth, 'searchInformation' => $searchInfo);
$reply = $client->search ($searchParams);

if ($reply->searchReturn->success=='true'){
	
	if( isset($reply->searchReturn->matches->match) && sizeof($reply->searchReturn->matches->match) > 0 ){
		echo "<p><b>Found ".sizeof($reply->searchReturn->matches->match)." items:</b></p>";
		//Echo out Structured array(object) -- comment out to hide
		echo '<pre>'.print_r( (array)$reply->searchReturn->matches->match, true ).'</pre>';
		
		//Echo as List --comment out to hide
		foreach( $reply->searchReturn->matches->match as $match ){
			echo "<p>ID: ".$match->id.", type: ".$match->type.", Recycled: ".$match->recycled.", Path: [path] ".$match->path->path.", [siteId] ".$match->path->siteId.", [siteName] ".$match->path->siteName."</p>";
		}
		
	}else{
		echo "<p><b>Sorry No Results Found</b></p>";
	}
	
}else{
	echo "<p>Error occurred: " . $reply->searchReturn->message."</p>";
}
?>