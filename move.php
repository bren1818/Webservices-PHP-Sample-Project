<?php
// Move/Rename an asset

include "db.php";


/*
	As a simple hint, when looking at the URL within cascade, you can get the id and type by clicking on an asset, eg a block. When looking at the URL you'd see something like this:
	/entity/open.act?id=e4b706330a0a4a86551ffcc20c7eea5e&type=block  - where id is the id, and type is block
*/
	
$identifier = array 
(
// ID or path of the asset
	'id' => 'Your-Page-ID-Here',
	'type' => 'page'
);

$destFolderIdentifier = array 
// Optional if you're renaming not moving
(
	'id' => 'Your-New-Folder-ID',
	'type' => 'folder'
);

$moveParams = array 
(
	'authentication' => $auth, 
	'identifier' => $identifier, 
	'moveParameters' => array
	(
		// Must specify a new name and/or new container for the asset - only one is required
		'destinationContainerIdentifier' => $destFolderIdentifier,
		'newName' => 'New-Page-Name',
		// Required: true or false
		'doWorkflow' => false,
	)
);

$reply = $client->move($moveParams);

if ($reply->moveReturn->success=='true')
	echo "<p>Success.</p>";
else
	echo "<p>Error occurred when moving/renaming: " . $reply->moveReturn->message."</p>";
?>
