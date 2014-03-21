<?php
include "db.php";

$listSitesParams = array ('authentication' => $auth);
$reply = $client->listSites($listSitesParams);

if ($reply->listSitesReturn->success=='true')
{
	$sites = $reply->listSitesReturn->sites->assetIdentifier;
	if (sizeof($sites)==0)
		$sites = array();
	else if (!is_array($sites)) // For less than 2 elements, the returned object isn't an array
		$sites=array($sites);
	
	echo "<p><strong>Sites:</strong></p>";
	echo "<p>";
	foreach($sites as $site)
		echo $site->path->path . " (" . $site->id . ")<br />";
	echo "</p>";
}
else
	echo "Error occurred when getting a list of sites: " . $reply->listSitesReturn->message;
?>