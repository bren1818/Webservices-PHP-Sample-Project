<?php
/*
 *Simple Site Class 
 *by Brendon Irwin
 */
	class Site{
		private $id;
		private $name;
		private $url;
		private $defaultMetadataSetId;
		private $defaultMetadataSetPath;
		private $cssFileId;
		private $cssFilePath;
		private $cssFileRecycled;
		private $siteAssetFactoryContainerId;
		private $siteAssetFactoryContainerPath;
		private $siteStartingPageId;
		private $siteStartingPagePath;
		private $siteStartingPageRecycled;
		private $cssClasses;
		private $roleAssignments;
		private $usesScheduledPublishing;
		private $timeToPublish;
		private $publishIntervalHours;
		private $publishDaysOfWeek;
		private $cronExpression;
		private $sendReportToUsers;
		private $sendReportToGroups;
		private $sendReportOnErrorOnly;
		private $recycleBinExpiration;
		private $rootFolderId;
		private $rootAssetFactoryContainerId;
		private $rootPageConfigurationSetContainerId;
		private $rootContentTypeContainerId;
		private $rootConnectorContainerId;
		private $rootDataDefinitionContainerId;
		private $rootMetadataSetContainerId;
		private $rootPublishSetContainerId;
		private $rootSiteDestinationContainerId;
		private $rootTransportContainerId;
		private $rootWorkflowDefinitionContainerId;

		function __construct( $site ){
			$this->setId( $site->id );
			$this->setName( $site->name );
			$this->setUrl( $site->url );
			
			//implements others later
			
		}
		
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setUrl($url) { $this->url = $url; }
		function getUrl() { return $this->url; }
		function setDefaultMetadataSetId($defaultMetadataSetId) { $this->defaultMetadataSetId = $defaultMetadataSetId; }
		function getDefaultMetadataSetId() { return $this->defaultMetadataSetId; }
		function setDefaultMetadataSetPath($defaultMetadataSetPath) { $this->defaultMetadataSetPath = $defaultMetadataSetPath; }
		function getDefaultMetadataSetPath() { return $this->defaultMetadataSetPath; }
		function setCssFileId($cssFileId) { $this->cssFileId = $cssFileId; }
		function getCssFileId() { return $this->cssFileId; }
		function setCssFilePath($cssFilePath) { $this->cssFilePath = $cssFilePath; }
		function getCssFilePath() { return $this->cssFilePath; }
		function setCssFileRecycled($cssFileRecycled) { $this->cssFileRecycled = $cssFileRecycled; }
		function getCssFileRecycled() { return $this->cssFileRecycled; }
		function setSiteAssetFactoryContainerId($siteAssetFactoryContainerId) { $this->siteAssetFactoryContainerId = $siteAssetFactoryContainerId; }
		function getSiteAssetFactoryContainerId() { return $this->siteAssetFactoryContainerId; }
		function setSiteAssetFactoryContainerPath($siteAssetFactoryContainerPath) { $this->siteAssetFactoryContainerPath = $siteAssetFactoryContainerPath; }
		function getSiteAssetFactoryContainerPath() { return $this->siteAssetFactoryContainerPath; }
		function setSiteStartingPageId($siteStartingPageId) { $this->siteStartingPageId = $siteStartingPageId; }
		function getSiteStartingPageId() { return $this->siteStartingPageId; }
		function setSiteStartingPagePath($siteStartingPagePath) { $this->siteStartingPagePath = $siteStartingPagePath; }
		function getSiteStartingPagePath() { return $this->siteStartingPagePath; }
		function setSiteStartingPageRecycled($siteStartingPageRecycled) { $this->siteStartingPageRecycled = $siteStartingPageRecycled; }
		function getSiteStartingPageRecycled() { return $this->siteStartingPageRecycled; }
		function setCssClasses($cssClasses) { $this->cssClasses = $cssClasses; }
		function getCssClasses() { return $this->cssClasses; }
		function setRoleAssignments($roleAssignments) { $this->roleAssignments = $roleAssignments; }
		function getRoleAssignments() { return $this->roleAssignments; }
		function setUsesScheduledPublishing($usesScheduledPublishing) { $this->usesScheduledPublishing = $usesScheduledPublishing; }
		function getUsesScheduledPublishing() { return $this->usesScheduledPublishing; }
		function setTimeToPublish($timeToPublish) { $this->timeToPublish = $timeToPublish; }
		function getTimeToPublish() { return $this->timeToPublish; }
		function setPublishIntervalHours($publishIntervalHours) { $this->publishIntervalHours = $publishIntervalHours; }
		function getPublishIntervalHours() { return $this->publishIntervalHours; }
		function setPublishDaysOfWeek($publishDaysOfWeek) { $this->publishDaysOfWeek = $publishDaysOfWeek; }
		function getPublishDaysOfWeek() { return $this->publishDaysOfWeek; }
		function setCronExpression($cronExpression) { $this->cronExpression = $cronExpression; }
		function getCronExpression() { return $this->cronExpression; }
		function setSendReportToUsers($sendReportToUsers) { $this->sendReportToUsers = $sendReportToUsers; }
		function getSendReportToUsers() { return $this->sendReportToUsers; }
		function setSendReportToGroups($sendReportToGroups) { $this->sendReportToGroups = $sendReportToGroups; }
		function getSendReportToGroups() { return $this->sendReportToGroups; }
		function setSendReportOnErrorOnly($sendReportOnErrorOnly) { $this->sendReportOnErrorOnly = $sendReportOnErrorOnly; }
		function getSendReportOnErrorOnly() { return $this->sendReportOnErrorOnly; }
		function setRecycleBinExpiration($recycleBinExpiration) { $this->recycleBinExpiration = $recycleBinExpiration; }
		function getRecycleBinExpiration() { return $this->recycleBinExpiration; }
		function setRootFolderId($rootFolderId) { $this->rootFolderId = $rootFolderId; }
		function getRootFolderId() { return $this->rootFolderId; }
		function setRootAssetFactoryContainerId($rootAssetFactoryContainerId) { $this->rootAssetFactoryContainerId = $rootAssetFactoryContainerId; }
		function getRootAssetFactoryContainerId() { return $this->rootAssetFactoryContainerId; }
		function setRootPageConfigurationSetContainerId($rootPageConfigurationSetContainerId) { $this->rootPageConfigurationSetContainerId = $rootPageConfigurationSetContainerId; }
		function getRootPageConfigurationSetContainerId() { return $this->rootPageConfigurationSetContainerId; }
		function setRootContentTypeContainerId($rootContentTypeContainerId) { $this->rootContentTypeContainerId = $rootContentTypeContainerId; }
		function getRootContentTypeContainerId() { return $this->rootContentTypeContainerId; }
		function setRootConnectorContainerId($rootConnectorContainerId) { $this->rootConnectorContainerId = $rootConnectorContainerId; }
		function getRootConnectorContainerId() { return $this->rootConnectorContainerId; }
		function setRootDataDefinitionContainerId($rootDataDefinitionContainerId) { $this->rootDataDefinitionContainerId = $rootDataDefinitionContainerId; }
		function getRootDataDefinitionContainerId() { return $this->rootDataDefinitionContainerId; }
		function setRootMetadataSetContainerId($rootMetadataSetContainerId) { $this->rootMetadataSetContainerId = $rootMetadataSetContainerId; }
		function getRootMetadataSetContainerId() { return $this->rootMetadataSetContainerId; }
		function setRootPublishSetContainerId($rootPublishSetContainerId) { $this->rootPublishSetContainerId = $rootPublishSetContainerId; }
		function getRootPublishSetContainerId() { return $this->rootPublishSetContainerId; }
		function setRootSiteDestinationContainerId($rootSiteDestinationContainerId) { $this->rootSiteDestinationContainerId = $rootSiteDestinationContainerId; }
		function getRootSiteDestinationContainerId() { return $this->rootSiteDestinationContainerId; }
		function setRootTransportContainerId($rootTransportContainerId) { $this->rootTransportContainerId = $rootTransportContainerId; }
		function getRootTransportContainerId() { return $this->rootTransportContainerId; }
		function setRootWorkflowDefinitionContainerId($rootWorkflowDefinitionContainerId) { $this->rootWorkflowDefinitionContainerId = $rootWorkflowDefinitionContainerId; }
		function getRootWorkflowDefinitionContainerId() { return $this->rootWorkflowDefinitionContainerId; }
	}
?>

