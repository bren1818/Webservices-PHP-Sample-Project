<?php
include "db.php";

$identifier = array 
(
	'path' => array('path' => '/my-xml-block'),
	'type' => 'block'
);

$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
$reply = $client->read($readParams);

if ($reply->readReturn->success=='true')
	echo "<p>Success. Block's xml: " . $reply->readReturn->asset->xmlBlock->xml."</p>";
else
	echo "<p>Error occurred: " . $reply->readReturn->message."</p>";
?>