<?php
include "db.php";

$identifier = array 
(
	'id' => 'Your-Folder-ID',
	'type' => 'folder'
);

$workflowDefinitionIdentifier = array
(
	'id' => 'Your-workflowdefinition-ID',
	'type' => 'workflowdefinition'
);

$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
$reply = $client->readWorkflowSettings($readParams);

if ($reply->readWorkflowSettingsReturn->success=='true')
{
	$workflowDefinitions = $reply->readWorkflowSettingsReturn->workflowSettings->workflowDefinitions->assetIdentifier;
	if (sizeof($workflowDefinitions)==0)
		$workflowDefinitions = array();
	else if (!is_array($workflowDefinitions)) // For less than 2 elements, the returned object isn't an array
		$workflowDefinitions=array($workflowDefinitions);		
	$alreadyContains = false;
	foreach($workflowDefinitions as $identifier)
		if($identifier->id==$workflowDefinitionIdentifier->id)
			$alreadyContains = true;

	if ($alreadyContains)
	{
		echo "<p>Workflow definition is already assigned</p>";
	}
	else
	{
		$workflowDefinitions[] = $workflowDefinitionIdentifier;
		$reply->readWorkflowSettingsReturn->workflowSettings->workflowDefinitions->assetIdentifier=$workflowDefinitions;
		$editParams = array
		(
			'authentication' => $auth, 
			'workflowSettings' => $reply->readWorkflowSettingsReturn->workflowSettings,
			'applyInheritWorkflowsToChildren' => false, // Optional, false is default
			'applyRequireWorkflowToChildren' => false, // Optional, false is default
		);
		$reply = $client->editWorkflowSettings($editParams);
		
	    if ($reply->editWorkflowSettingsReturn->success=='true')		
			echo "<p>Success.</p>";
		else
			echo "<p>Error occurred when editing workflow settings: " . $reply->editWorkflowSettingsReturn->message."</p>";		
	}	
}
else
	echo "<p>Error occurred: " . $reply->readWorkflowSettingsReturn->message."</p>";
?>