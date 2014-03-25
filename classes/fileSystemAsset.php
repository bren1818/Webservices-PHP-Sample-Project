<?php
/*
 *Simple File System Asset Class 
 *by Brendon Irwin
 */
	class FileSystemAsset{  /*Extend this Class - File, Folder, Page */
		private $id;
		private $name;
		private $path;
		private $parentFolderId;
		private $parentFolderPath;
		private $lastModifiedDate;
		private $lastModifiedBy;
		private $createdBy;
		private $siteID;
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
		public $metadata;
		
		public function setMetadata( $metaObj ){
			$this->metadata = new simpleMetadata( $metaObj );
		}
		
		public function getMetadata(){
			return $this->metadata;
		}
	
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
		function setShouldBePublished($shouldBePublished) { $this->shouldBePublished = ( $shouldBePublished == 1 ) ? true : false;  }
		function getShouldBePublished() { return $this->shouldBePublished; }
		function setShouldBeIndexed($shouldBeIndexed) { $this->shouldBeIndexed = ( $shouldBeIndexed == 1 ) ? true : false;  }
		function getShouldBeIndexed() { return $this->shouldBeIndexed; }
		function setLastPublishedDate($lastPublishedDate) { $this->lastPublishedDate = $lastPublishedDate; }
		function getLastPublishedDate() { return $this->lastPublishedDate; }
		function setLastPublishedBy($lastPublishedBy) { $this->lastPublishedBy = $lastPublishedBy; }
		function getLastPublishedBy() { return $this->lastPublishedBy; }
		function isPublished(){
			return $this->getShouldBePublished();
		}
	}
?>