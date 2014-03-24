<?php
/*
 *Simple Page Class 
 *by Brendon Irwin
 */
 
 require_once("pageConfiguration.php");
 require_once("simpleMetadata.php");
 
 
class Page{
	private $id;
	private $name;
	private $parentFolderId;
	private $parentFolderPath;
	private $path;
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
	private $maintainAbsoluteLinks;
	public $metadata; //simpleMetadata Object
	
	//Custom to Page
	private $contentTypeId;
	private $contentTypePath;
	private $structuredData;
	private $configurationSetId;
	private $configurationSetPath;
	private $xhtml;
	public $pageConfigurations; //Array of Page Configurations
	public $pageConfigurationCount;
	
	
	
	

	function __construct( $client, $readParams ){
		$page = $client->read($readParams);
		if( isset($page->readReturn->success) && $page->readReturn->success == true ){
			//Was a proper 
			$page = $page->readReturn->asset->page;
			
			$this->setMetadata( $page->metadata ); //Metadata
			$this->setPageConfigurations( $page->pageConfigurations ); //array
			
			$this->setId( $page->id);
			$this->setName( $page->name);
			$this->setParentFolderId( $page->parentFolderId);
			$this->setParentFolderPath( $page->parentFolderPath);
			$this->setPath( $page->path);
			$this->setLastModifiedDate( $page->lastModifiedDate);
			$this->setLastModifiedBy( $page->lastModifiedBy);
			$this->setCreatedBy( $page->createdBy);
			$this->setSiteID( $page->siteId);
			$this->setSiteName( $page->siteName);
			$this->setMetadataSetId( $page->metadataSetId);
			$this->setMetadataSetPath( $page->metadataSetPath);
			$this->setShouldBePublished( $page->shouldBePublished);
			$this->setShouldBeIndexed( $page->shouldBePublished);
			$this->setConfigurationSetId( $page->configurationSetId);
			$this->setConfigurationSetPath( $page->configurationSetPath);
			$this->setContentTypeId( $page->contentTypeId);
			$this->setContentTypePath( $page->contentTypePath);
			$this->setStructuredData( $page->structuredData);
			$this->setXhtml( $page->xhtml);
			$this->setMaintainAbsoluteLinks( $page->maintainAbsoluteLinks);
			$this->setExpirationFolderId( $page->expirationFolderId);
			$this->setExpirationFolderPath( $page->expirationFolderPath);
			$this->setExpirationFolderRecycled( $page->expirationFolderRecycled );
			
			
		}else{
			//error
		}
	
	}
	
	public function setMetadata( $metaObj ){
		$this->metadata = new simpleMetadata( $metaObj );
	}
	
	public function getMetadata(){
		return $this->metadata;
	}
	
	public function setPageConfigurations( $pageConfigurations ){
		$pageConfigurationSet = array();
		foreach( $pageConfigurations as $pageConfiguration ){
			$pageConfigurationSet[] = new PageConfiguration( $pageConfiguration );
		}
		$this->pageConfigurations = $pageConfigurationSet;  // Array of Page Configurations
		$this->pageConfigurationCount = sizeof( $pageConfigurationSet );
	}
	
	public function getPageConfigurations(){
		return $this->pageConfigurations; //Treat as array?
	}
	
	public function getPageConfigurationCount(){
		return $this->pageConfigurationCount;
	}

	public function getPageConfiguration( $index = 0 ){
		//check index
		if( isset($index) && $index >= 0 && $index < $this->getPageConfigurationCount() ){
			return $this->pageConfigurations[ $index ];
		}else{
			return $this->pageConfigurations[0]; //first Item
		}
	}
	
	public function getActiveConfigurationID(){
		if( $this->getPageConfigurationCount() == 1 ){
			return $this->getPageConfiguration()->getId();
		}else{
			foreach( $this->getPageConfigurations() as $configuration ){
				if( $configuration->isDefaultConfiguration() ){
					return $configuration->getId();
					break;
				}
			}
		}
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
	function setSiteID($siteID) { $this->siteID = $siteID; }
	function getSiteID() { return $this->siteID; }
	function setSiteName($siteName) { $this->siteName = $siteName; }
	function getSiteName() { return $this->siteName; }
	function setMetadataSetId($metadataSetId) { $this->metadataSetId = $metadataSetId; }
	function getMetadataSetId() { return $this->metadataSetId; }
	function setMetadataSetPath($metadataSetPath) { $this->metadataSetPath = $metadataSetPath; }
	function getMetadataSetPath() { return $this->metadataSetPath; }
	function setShouldBePublished($shouldBePublished) { 
		$this->shouldBePublished = ( $shouldBePublished == 1 ) ? true : false; 
	}
	function isPublished(){
		return $this->getShouldBePublished();
	}
	function getShouldBePublished() { return $this->shouldBePublished; }
	function setShouldBeIndexed($shouldBeIndexed) { $this->shouldBeIndexed = $shouldBeIndexed; }
	function getShouldBeIndexed() { return $this->shouldBeIndexed; }
	function setLastPublishedDate($lastPublishedDate) { $this->lastPublishedDate = $lastPublishedDate; }
	function getLastPublishedDate() { return $this->lastPublishedDate; }
	function setLastPublishedBy($lastPublishedBy) { $this->lastPublishedBy = $lastPublishedBy; }
	function getLastPublishedBy() { return $this->lastPublishedBy; }
	function setConfigurationSetId($configurationSetId) { $this->configurationSetId = $configurationSetId; }
	function getConfigurationSetId() { return $this->configurationSetId; }
	function setConfigurationSetPath($configurationSetPath) { $this->configurationSetPath = $configurationSetPath; }
	function getConfigurationSetPath() { return $this->configurationSetPath; }
	function setContentTypeId($contentTypeId) { $this->contentTypeId = $contentTypeId; }
	function getContentTypeId() { return $this->contentTypeId; }
	function setContentTypePath($contentTypePath) { $this->contentTypePath = $contentTypePath; }
	function getContentTypePath() { return $this->contentTypePath; }
	function setStructuredData($structuredData) { $this->structuredData = $structuredData; }
	function getStructuredData() { return $this->structuredData; }
	function setXhtml($xhtml) { $this->xhtml = $xhtml; }
	function getXhtml() { return $this->xhtml; }
	function setMaintainAbsoluteLinks($maintainAbsoluteLinks) { $this->maintainAbsoluteLinks = $maintainAbsoluteLinks; }
	function getMaintainAbsoluteLinks() { return $this->maintainAbsoluteLinks; }
	function setExpirationFolderId($expirationFolderId) { $this->expirationFolderId = $expirationFolderId; }
	function getExpirationFolderId() { return $this->expirationFolderId; }
	function setExpirationFolderPath($expirationFolderPath) { $this->expirationFolderPath = $expirationFolderPath; }
	function getExpirationFolderPath() { return $this->expirationFolderPath; }
	function setExpirationFolderRecycled($expirationFolderRecycled) { $this->expirationFolderRecycled = $expirationFolderRecycled; }
	function getExpirationFolderRecycled() { return $this->expirationFolderRecycled; }
	
}
?>
