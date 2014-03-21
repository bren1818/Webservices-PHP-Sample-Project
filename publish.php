<?php
// Publish a page or file

include "db.php";

$identifier = array 
(
	// ID or path of the asset
	'id' =>'Your-Page-ID-Here',
	'type' => 'page'
);

$destinationIdentifier = array
(
	// ID or path of the destination
	'id' => 'Your-Destination-ID-Here',
	'type' => 'destination'
);

$publishInformation = array
(
	'identifier' => $identifier,
 	'destinations' => array ($destinationIdentifier), // This is optional, not providing this will result in publishing to all enabled destinations available to authenticating user 
	'unpublish' => false // This is optional, default is false
);

$publishParams = array ('authentication' => $auth, 'publishInformation' => $publishInformation); 
$reply = $client->publish($publishParams);

if ($reply->publishReturn->success=='true')
	echo "<p>Success: Published.</p>";
else
	echo "<p>Error occurred when publishing: " . $reply->publishReturn->message."</p>";

?>
