<?php
include "db.php";

$identifier = array 
(
	'path' => array('path' => '/my-xml-block'),
	'type' => 'block'
);

$deleteParams = array ('authentication' => $auth, 'identifier' => $identifier);
$reply = $client->delete($deleteParams);

if ($reply->deleteReturn->success=='true')
	echo "<p>Success.</p>";
else
	echo "<p>Error occurred when deleting: " . $reply->deleteReturn->message."</p>";
?>