<?php
	class ChildFolder{
		private $id;
		private $path;
		private $siteId;
		private $type;
		private $recycled;
	
		function __construct( $child ){
			if( is_object ( $child ) ){
				$this->setId( $child->id );
				$this->setPath( $child->path->path );
				$this->setSiteId($child->path->siteId);
				$this->setType( $child->type);
				$this->setRecycled( $child->recycled);
			
			}else{
				//This is  not an object and wont work	
			}
		}
	
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setPath($path) { $this->path = $path; }
		function getPath() { return $this->path; }
		function setSiteId($siteId) { $this->siteId = $siteId; }
		function getSiteId() { return $this->siteId; }
		function setType($type) { $this->type = $type; }
		function getType() { return $this->type; }
		function setRecycled($recycled) { $this->recycled = ( $recycled == 1 ) ? true : false;  }
		function getRecycled() { return $this->recycled; }
	}

	class Folder{
		private $id;
		private $name;
		private $parentFolderId;
		private $parentFolderPath;
		private $path;
		private $lastModifiedDate;
		private $lastModifiedBy;
		private $createdDate;
		private $createdBy;
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
		public $metadata; //simpleMetadata Object
		private $children; //array
		private $numChildren;
		
		function __construct( $client, $readParams ){
			$folder = $client->read($readParams);
			
			if( isset($folder->readReturn->success) && $folder->readReturn->success == true ){
				$folder = $folder->readReturn->asset->folder;
				$this->setId( $folder->id );
				$this->setName( $folder->name);
				$this->setParentFolderId( $folder->parentFolderId);
				$this->setParentFolderPath( $folder->parentFolderPath);
				$this->setPath( $folder->path );
				$this->setLastModifiedDate( $folder->lastModifiedDate);
				$this->setLastModifiedBy( $folder->lastPublishedBy);
				$this->setCreatedBy( $folder->createdBy);
				$this->setCreatedDate( $folder->createdDate);
				$this->setSiteId( $folder->siteId);
				$this->setSiteName( $folder->siteName);
				$this->setMetadata( $folder->metadata);
				$this->setMetadataSetId( $folder->metadataSetId);
				$this->setMetadataSetPath( $folder->metadataSetPath);
				$this->setExpirationFolderId( $folder->expirationFolderId);
				$this->setExpirationFolderPath( $folder->expirationFolderPath);
				$this->setExpirationFolderRecycled( $folder->expirationFolderRecycled);
				$this->setShouldBePublished( $folder->shouldBePublished);
				$this->setShouldBeIndexed( $folder->shouldBeIndexed);
				$this->setLastPublishedDate( $folder->lastPublishedDate);
				$this->setLastPublishedBy( $folder->lastModifiedBy);
				
				if( isset( $folder->children->child ) ){
					$this->setChildren( $folder->children->child );
				}else{
					$this->children = array();
					$this->numChildren = 0;
				}
			}
		}
		
		public function getChildren(){
			return $this->children;
		}
		
		public function hasChildren(){
			if( $this->numChildren > 0 ){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	
		private function setChildren($children){
			$ChildrenArray = array();
			foreach($children as $child ){
				
				if( is_object( $child ) && isset( $child->type )  ){
					$ChildrenArray[] = new ChildFolder($child);
				}else{
					//may not be valid
				}
			}
			$this->numChildren = sizeof( $ChildrenArray );
			$this->children = $ChildrenArray;
		}
		
		private function getNumChildren(){
			return $this->numChildren;
		}
		
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
		function setShouldBePublished($shouldBePublished) { $this->shouldBePublished = ( $shouldBePublished == 1 ) ? true : false;  }
		function getShouldBePublished() { return $this->shouldBePublished; }
		function setShouldBeIndexed($shouldBeIndexed) { $this->shouldBeIndexed = ( $shouldBeIndexed == 1 ) ? true : false;  }
		function getShouldBeIndexed() { return $this->shouldBeIndexed; }
		function setLastPublishedDate($lastPublishedDate) { $this->lastPublishedDate = $lastPublishedDate; }
		function getLastPublishedDate() { return $this->lastPublishedDate; }
		function setLastPublishedBy($lastPublishedBy) { $this->lastPublishedBy = $lastPublishedBy; }
		function getLastPublishedBy() { return $this->lastPublishedBy; }
}
?>