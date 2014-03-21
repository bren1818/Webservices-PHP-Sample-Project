<?php
include "db.php";
/*Creates Block in Global Site*/
$identifier = array 
(
	'path' => array
	(
		'path' => '/my-xml-block'
	),
	'type' => 'xmlBlock'
);

$xmlBlock = array
(
	'xml' => '<xml>Test</xml>',
	'metadataSetPath' => '/Default',
	'parentFolderPath' => '/',
	'name' => 'my-xml-block'
);

$asset = array('xmlBlock' => $xmlBlock);
$createParams = array ('authentication' => $auth, 'asset' => $asset);
$reply = $client->create ($createParams);

if ($reply->createReturn->success=='true')
	echo "<p>Success. Created asset's id is " . $reply->createReturn->createdAssetId."</p>";
else
	echo "<p>Error occurred: " . $reply->createReturn->message."</p>";
?>