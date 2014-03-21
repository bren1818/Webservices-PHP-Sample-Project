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
	$accessRightsInformation = $reply->readAccessRightsReturn->accessRightsInformation;
	$aclEntries = $accessRightsInformation->aclEntries->aclEntry; //May give notice of Undefined property
	
	if (sizeof($aclEntries)==0)
		$aclEntries = array();
    else if (!is_array($aclEntries)) // For less than 2 elements, the returned object isn't an array
		$aclEntries=array($aclEntries);
	
	$aclEntries[] = array('level' => 'read', 'type' => 'user', 'name' => 'admin');
	$accessRightsInformation->aclEntries->aclEntry=$aclEntries;

	$editParams = array
	(
		'authentication' => $auth, 
		'accessRightsInformation' => $accessRightsInformation
	);

    $reply = $client->editAccessRights($editParams);
    if ($reply->editAccessRightsReturn->success=='true')		
		echo "<p>Success.</p>";
	else
		echo "<p>Error occurred when editing access rights: " . $reply->editAccessRightsReturn->message."</p>";
}
else
	echo "<p>Error occurred: " . $reply->readAccessRightsReturn->message."</p>";
?>