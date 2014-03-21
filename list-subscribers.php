<?php
include "db.php";

$identifier = array 
(
	/*
		As a simple hint, when looking at the URL within cascade, you can get the id and type by clicking on an asset, eg a block. When looking at the URL you'd see something like this:
		/entity/open.act?id=e4b706330a0a4a86551ffcc20c7eea5e&type=block  - where id is the id, and type is block
	*/
	'id' => 'e4b706330a0a4a86551ffcc20c7eea5e',//'your-asset-id',
	'type' => 'block'//'your-asset-type'
	/* Valid Types: assetfactory, assetfactorycontainer, block, block_FEED, block_INDEX, block_TEXT, block_XHTML_DATADEFINITION, block_XML, block_TWITTER_FEED, connectorcontainer, twitterconnector, facebookconnector, wordpressconnector, googleanalyticsconnector, contenttype, contenttypecontainer, destination, file, folder, group, message, metadataset, metadatasetcontainer, page, pageconfigurationset, pageconfiguration, pageregion, pageconfigurationsetcontainer, publishset, publishsetcontainer, reference, role, datadefinition, datadefinitioncontainer, format, format_XSLT, format_SCRIPT, site, sitedestinationcontainer, symlink, target, template, transport, transport_fs, transport_ftp, transport_db, transportcontainer, user, workflow, workflowdefinition, workflowdefinitioncontainer */
);

$listSubscribersParams = array ('authentication' => $auth, 'identifier' => $identifier);
$reply = $client->listSubscribers($listSubscribersParams);

if ($reply->listSubscribersReturn->success=='true')
{
	echo "<p><strong>Subscribers:</strong></p>";
	$subscribers = $reply->listSubscribersReturn->subscribers->assetIdentifier; //may cause notice of "Undefined property"
	if (sizeof($subscribers)==0)
	{
		echo "<p>NONE</p>";
		exit;
	}
	else if (!is_array($subscribers)) // For less than 2 elements, the returned object isn't an array
		$subscribers=array($subscribers);
		
	foreach($subscribers as $identifier)
		echo "<p>[".$identifier->type."] site://".$identifier->path->siteName."/".$identifier->path->path."</p>";
}
else
	echo "<p>Error occurred: " . $reply->listSubscribersReturn->message."</p>";
?>