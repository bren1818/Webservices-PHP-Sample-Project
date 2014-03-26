<?php 
	class AssetIdentifier{
		private $id;
		private $path;
		private $siteId;
		private $type;
		private $recycled;
		private $siteName;
	
		function __construct($ai){
			$this->setId( $ai->id );
			$this->setPath( $ai->path->path );
			$this->setSiteId( $ai->path->siteId);
			$this->setType($ai->type );
			$this->setRecycled( $ai->recycled );
			$this->setSiteName( $ai->path->siteName );
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
		function isRecycled() { return $this->getRecycled(); }
		
		function setSiteName( $name ){ $this->siteName = $name; }
		function getSiteName(){ return $this->siteName; }
	
	}
?>