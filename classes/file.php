<?php
/*
 *Simple AssetFile Class 
 *by Brendon Irwin
 */
	require_once("fileSystemAsset.php");
 
	class AssetFile extends FileSystemAsset{
	
		private $maintainAbsoluteLinks;
		private $createdDate;
		private $rewriteLinks;
		private $createdBy;
		private $text;
		private $data;
		
		function __construct( $file ){
			$this->setId( $file->id);
			$this->setName( $file->name);
			$this->setParentFolderId( $file->parentFolderId);
			$this->setParentFolderPath( $file->parentFolderPath);
			$this->setPath( $file->path);
			$this->setLastModifiedDate( $file->lastModifiedDate);
			$this->setLastModifiedBy( $file->lastModifiedBy);
			$this->setCreatedDate( $file->createdDate);
			$this->setSiteId( $file->siteId);
			$this->setSiteName( $file->siteName);
			$this->setMetadataSetId( $file->metadataSetId);
			$this->setMetadataSetPath( $file->metadataSetPath);
			$this->setExpirationFolderId( $file->expirationFolderId);
			$this->setExpirationFolderPath( $file->expirationFolderPath);
			$this->setExpirationFolderRecycled( $file->expirationFolderRecycled);
			$this->setShouldBePublished( $file->shouldBePublished);
			$this->setShouldBeIndexed( $file->shouldBeIndexed);
			$this->setLastPublishedDate( $file->lastPublishedDate);
			$this->setLastPublishedBy( $file->lastPublishedBy);
			$this->setMaintainAbsoluteLinks( $file->maintainAbsoluteLinks);
			$this->setMetadata( $file->metadata);
			$this->setRewriteLinks( $file->rewriteLinks);
			$this->setCreatedBy( $file->createdBy);
			$this->setText( $file->text);
			$this->setData( $file->data );
		}

		function setCreatedDate($createdDate) { $this->createdDate = $createdDate; }
		function getCreatedDate() { return $this->createdDate; }
		function setRewriteLinks($rewriteLinks) { $this->rewriteLinks = $rewriteLinks; }
		function getRewriteLinks() { return $this->rewriteLinks; }
		function setMaintainAbsoluteLinks($maintainAbsoluteLinks) { $this->maintainAbsoluteLinks = $maintainAbsoluteLinks; }
		function getMaintainAbsoluteLinks() { return $this->maintainAbsoluteLinks; }
		function setText($text) { $this->text = $text; }
		function getText() { return $this->text; }
		function setData($data) { $this->data = $data; }
		function getData() { return $this->data; }
	}
?>