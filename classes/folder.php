<?php
	require_once("fileSystemAsset.php");
	 
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

	class Folder extends FileSystemAsset{
	
		private $createdDate;
		private $children; //array
		private $numChildren;
		
		function __construct( $folder ){
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
			if( sizeof( $children ) == 1 ){
				$ChildrenArray[] = new ChildFolder($children);
				$this->children = $ChildrenArray;
				$this->numChildren = 1;
			}else{
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
		}
		
		private function getNumChildren(){
			return $this->numChildren;
		}
		
		function setCreatedDate($createdDate) { $this->createdDate = $createdDate; }
		function getCreatedDate() { return $this->createdDate; }
	}
?>