<?php
/*
 *Simple AssetFile Class 
 *by Brendon Irwin
 */
 
	class AssetFile{
		private $id;
		private $name;
		private $parentFolderId;
		private $parentFolderPath;
		private $path;
		private $lastModifiedDate;
		private $lastModifiedBy;
		private $createdDate;
		private $siteId;
		private $siteName;
		private $metadataSetId;
		private $metadataSetPath;
		private $expirationFolderId;
		private $expirationFolderPath;
		private $expirationFolderRecycled;
		private $shouldBePublished;
		private $shouldBeIndexed;
		private $lastPublishedDate;
		private $lastPublishedBy;
		private $maintainAbsoluteLinks;
		private $metadata; //simpleMetadata Object
		
		
		//Custome to file
		private $rewriteLinks;
		private $createdBy;
		private $text;
		private $data;
		
		
		
		
		
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setParentFolderId($parentFolderId) { $this->parentFolderId = $parentFolderId; }
		function getParentFolderId() { return $this->parentFolderId; }
		function setParentFolderPath($parentFolderPath) { $this->parentFolderPath = $parentFolderPath; }
		function getParentFolderPath() { return $this->parentFolderPath; }
		function setPath($path) { $this->path = $path; }
		function getPath() { return $this->path; }
		function setLastModifiedDate($lastModifiedDate) { $this->lastModifiedDate = $lastModifiedDate; }
		function getLastModifiedDate() { return $this->lastModifiedDate; }
		function setLastModifiedBy($lastModifiedBy) { $this->lastModifiedBy = $lastModifiedBy; }
		function getLastModifiedBy() { return $this->lastModifiedBy; }
		function setCreatedDate($createdDate) { $this->createdDate = $createdDate; }
		function getCreatedDate() { return $this->createdDate; }
		function setCreatedBy($createdBy) { $this->createdBy = $createdBy; }
		function getCreatedBy() { return $this->createdBy; }
		function setSiteId($siteId) { $this->siteId = $siteId; }
		function getSiteId() { return $this->siteId; }
		function setSiteName($siteName) { $this->siteName = $siteName; }
		function getSiteName() { return $this->siteName; }
		function setMetadataSetId($metadataSetId) { $this->metadataSetId = $metadataSetId; }
		function getMetadataSetId() { return $this->metadataSetId; }
		function setMetadataSetPath($metadataSetPath) { $this->metadataSetPath = $metadataSetPath; }
		function getMetadataSetPath() { return $this->metadataSetPath; }
		function setExpirationFolderId($expirationFolderId) { $this->expirationFolderId = $expirationFolderId; }
		function getExpirationFolderId() { return $this->expirationFolderId; }
		function setExpirationFolderPath($expirationFolderPath) { $this->expirationFolderPath = $expirationFolderPath; }
		function getExpirationFolderPath() { return $this->expirationFolderPath; }
		function setExpirationFolderRecycled($expirationFolderRecycled) { $this->expirationFolderRecycled = $expirationFolderRecycled; }
		function getExpirationFolderRecycled() { return $this->expirationFolderRecycled; }
		function setShouldBePublished($shouldBePublished) { $this->shouldBePublished = $shouldBePublished; }
		function getShouldBePublished() { return $this->shouldBePublished; }
		function setShouldBeIndexed($shouldBeIndexed) { $this->shouldBeIndexed = $shouldBeIndexed; }
		function getShouldBeIndexed() { return $this->shouldBeIndexed; }
		function setLastPublishedDate($lastPublishedDate) { $this->lastPublishedDate = $lastPublishedDate; }
		function getLastPublishedDate() { return $this->lastPublishedDate; }
		function setLastPublishedBy($lastPublishedBy) { $this->lastPublishedBy = $lastPublishedBy; }
		function getLastPublishedBy() { return $this->lastPublishedBy; }
		function setRewriteLinks($rewriteLinks) { $this->rewriteLinks = $rewriteLinks; }
		function getRewriteLinks() { return $this->rewriteLinks; }
		function setMaintainAbsoluteLinks($maintainAbsoluteLinks) { $this->maintainAbsoluteLinks = $maintainAbsoluteLinks; }
		function getMaintainAbsoluteLinks() { return $this->maintainAbsoluteLinks; }
		function setMetadata($metadata) { $this->metadata = $metadata; }
		function getMetadata() { return $this->metadata; }
		function setText($text) { $this->text = $text; }
		function getText() { return $this->text; }
		function setData($data) { $this->data = $data; }
		function getData() { return $this->data; }
	
	
	
	}


?>