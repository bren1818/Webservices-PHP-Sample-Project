<?php
include "db.php";

$identifier = array 
(
	'id' => 'folder-id-here',
	'type' => 'folder'
);

$readParams = array ('authentication' => $auth, 'identifier' => $identifier);
$reply = $client->readWorkflowSettings($readParams);

if ($reply->readWorkflowSettingsReturn->success=='true')
{
	echo "<p>Inherit workflows: ".($reply->readWorkflowSettingsReturn->workflowSettings->inheritWorkflows?"true":"false")."</p>";
	echo "<p>Required workflow: ".($reply->readWorkflowSettingsReturn->workflowSettings->requireWorkflow?"true":"false")."</p>";
	
	$workflowDefinitions = $reply->readWorkflowSettingsReturn->workflowSettings->workflowDefinitions->assetIdentifier;
	if (sizeof($workflowDefinitions)==0)
		$workflowDefinitions = array();
	else if (!is_array($workflowDefinitions)) // For less than 2 elements, the returned object isn't an array
		$workflowDefinitions=array($workflowDefinitions);		
	echo "<p>Workflow definitions: </p>";
	foreach($workflowDefinitions as $identifier)
		echo "<p>site://" .$identifier->path->siteName."/".$identifier->path->path . " </p>";
		
	$inheritedWorkflowDefinitions = $reply->readWorkflowSettingsReturn->workflowSettings->inheritedWorkflowDefinitions->assetIdentifier;
	if (sizeof($inheritedWorkflowDefinitions)==0)
		$inheritedWorkflowDefinitions = array();
	else if (!is_array($inheritedWorkflowDefinitions)) // For less than 2 elements, the returned object isn't an array
		$inheritedWorkflowDefinitions=array($inheritedWorkflowDefinitions);
	echo "<p>Inherited workflow definitions: </p>";
	foreach($inheritedWorkflowDefinitions as $identifier)
		echo "<p>site://" .$identifier->path->siteName."/".$identifier->path->path . " </p>";
	

}
else
	echo "<p>Error occurred: " . $reply->readWorkflowSettingsReturn->message."</p>";
?>