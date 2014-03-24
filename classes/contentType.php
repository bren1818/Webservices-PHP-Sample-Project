<?php
/*
 *Simple ContentType Class 
 *by Brendon Irwin
 */
	class ContentType{
		private $id;
		private $name;
		private $parentContainerId;
		private $parentContainerPath;
		private $path;
		private $siteId;
		private $siteName;
		private $pageConfigurationSetId;
		private $pageConfigurationSetPath;
		private $metadataSetId;
		private $metadataSetPath;
		private $dataDefinitionId;
		private $dataDefinitionPath;
		
		private $contentTypePageConfigurations; //array of configurations
				//pageConfigurationId, pageConfigurationName, publishMode, destinations
		private $inlineEditableFields; //array of fields
		
		
		function __construct( $contentType ){
			$this->setId( $contentType->id);
			$this->setName( $contentType->name);
			$this->setParentContainerId( $contentType->parentContainerId);
			$this->setParentContainerPath( $contentType->parentContainerPath);
			$this->setPath( $contentType->path);
			$this->setSiteId( $contentType->siteId);
			$this->setSiteName( $contentType->siteName);
			$this->setPageConfigurationSetId( $contentType->pageConfigurationSetId);
			$this->setPageConfigurationSetPath( $contentType->pageConfigurationSetPath);
			$this->setMetadataSetId( $contentType->metadataSetId);
			$this->setMetadataSetPath( $contentType->metadataSetPath);
			$this->setDataDefinitionId( $contentType->dataDefinitionId);
			$this->setDataDefinitionPath( $contentType->dataDefinitionPath);
			
			
			//$this->setContentTypePageConfigurations(); to do
			//$this->setInlineEditableFields(); to do
		}
	
	
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setParentContainerId($parentContainerId) { $this->parentContainerId = $parentContainerId; }
		function getParentContainerId() { return $this->parentContainerId; }
		function setParentContainerPath($parentContainerPath) { $this->parentContainerPath = $parentContainerPath; }
		function getParentContainerPath() { return $this->parentContainerPath; }
		function setPath($path) { $this->path = $path; }
		function getPath() { return $this->path; }
		function setSiteId($siteId) { $this->siteId = $siteId; }
		function getSiteId() { return $this->siteId; }
		function setSiteName($siteName) { $this->siteName = $siteName; }
		function getSiteName() { return $this->siteName; }
		function setPageConfigurationSetId($pageConfigurationSetId) { $this->pageConfigurationSetId = $pageConfigurationSetId; }
		function getPageConfigurationSetId() { return $this->pageConfigurationSetId; }
		function setPageConfigurationSetPath($pageConfigurationSetPath) { $this->pageConfigurationSetPath = $pageConfigurationSetPath; }
		function getPageConfigurationSetPath() { return $this->pageConfigurationSetPath; }
		function setMetadataSetId($metadataSetId) { $this->metadataSetId = $metadataSetId; }
		function getMetadataSetId() { return $this->metadataSetId; }
		function setMetadataSetPath($metadataSetPath) { $this->metadataSetPath = $metadataSetPath; }
		function getMetadataSetPath() { return $this->metadataSetPath; }
		function setDataDefinitionId($dataDefinitionId) { $this->dataDefinitionId = $dataDefinitionId; }
		function getDataDefinitionId() { return $this->dataDefinitionId; }
		function setDataDefinitionPath($dataDefinitionPath) { $this->dataDefinitionPath = $dataDefinitionPath; }
		function getDataDefinitionPath() { return $this->dataDefinitionPath; }
	
	}



?>