<?php
include "db.php";
/*Updates the Block's metadata Title*/
$identifier = array 
(
	'path' => array('path' => '/my-xml-block'),
	'type' => 'block'
);

$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
$reply = $client->read($readParams);

if ($reply->readReturn->success=='true')
{
	$xmlBlock = $reply->readReturn->asset->xmlBlock;
	$xmlBlock->metadata->title="A new title";
	$editParams = array ('authentication' => $auth, 'asset' => array('xmlBlock' => $xmlBlock));
	$reply = $client->edit($editParams);
	if ($reply->editReturn->success=='true')		
		echo "<p>Metadata updated Successfully.</p>";
	else
		echo "<p>Error occurred when issuing an edit: " . $reply->editReturn->message."</p>";
}
else
	echo "<p>Error occurred when reading: " . $reply->readReturn->message."</p>";
?>