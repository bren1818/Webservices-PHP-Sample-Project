<?php
include "db.php";

$identifier = array 
(
	'path' => array('path' => '/my-xml-block'),
	'type' => 'block'  
	/*valid types: assetfactory, assetfactorycontainer, block, block_FEED, block_INDEX, block_TEXT, block_XHTML_DATADEFINITION, block_XML, block_TWITTER_FEED, connectorcontainer, twitterconnector, facebookconnector, wordpressconnector, googleanalyticsconnector, contenttype, contenttypecontainer, destination, file, folder, group, message, metadataset, metadatasetcontainer, page, pageconfigurationset, pageconfiguration, pageregion, pageconfigurationsetcontainer, publishset, publishsetcontainer, reference, role, datadefinition, datadefinitioncontainer, format, format_XSLT, format_SCRIPT, site, sitedestinationcontainer, symlink, target, template, transport, transport_fs, transport_ftp, transport_db, transportcontainer, user, workflow, workflowdefinition, workflowdefinitioncontainer */
);



$destFolderIdentifier = array 
(
	'path' => array('path' => '/my-folder'),  /*Must be a valid folder in the CCS*/
	'type' => 'folder'
);

$copyParams = array 
(
	'authentication' => $auth, 
	'identifier' => $identifier, 
	'copyParameters' => array
	(
		'destinationContainerIdentifier' => $destFolderIdentifier,
		'doWorkflow' => false,
		'newName' => 'my-xml-block-copy',
	)
);

$reply = $client->copy($copyParams);

if ($reply->copyReturn->success=='true')
	echo "<p>Success.</p>";
else
	echo "<p>Error occurred when copying: " . $reply->copyReturn->message."</p>";
?>