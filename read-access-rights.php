<?php
include "db.php";

$identifier = array 
(
	'path' => array('path' => '/my-xml-block'),
	'type' => 'block'
);

$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
$reply = $client->readAccessRights($readParams);

if ($reply->readAccessRightsReturn->success=='true')
{
	$aclEntries = $reply->readAccessRightsReturn->accessRightsInformation->aclEntries->aclEntry;
                
    if (!is_array($aclEntries)) // For less than 2 elements, the returned object isn't an array
		$aclEntries=array($aclEntries);

	for($i=0; $i<sizeof($aclEntries); $i++)
	{
		$aclEntry = $aclEntries[$i];
		if ($aclEntry->name=='admin' && $aclEntry->type=='user')
		{
			echo '<p>User admin has acl entry level of '.$aclEntry->level."</p>";
			exit;
		}
	}
	
	echo '<p>Could not find an acl entry for user admin</p>';
}
else
	echo "<p>Error occurred: " . $reply->readAccessRightsReturn->message."</p>";
?>