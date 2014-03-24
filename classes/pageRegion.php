<?php
/*
 *Simple Page Region Class 
 *by Brendon Irwin
 */
 
	class PageRegion{
		public $id;
		public $name;
		public $blockId;
		public $blockPath;
		public $blockRecycled;
		public $noBlock;
		public $formatId;
		public $formatPath;
		public $formatRecycled;
		public $noFormat;
	
		function __construct( $pageRegion ){	
			
			if( is_object( $pageRegion) ){
				$this->setId( $pageRegion->id );
				$this->setName( $pageRegion->name );
				$this->setBlockId( $pageRegion->blockId );
				$this->setBlockPath( $pageRegion->blockPath );
				$this->setBlockRecycled( $pageRegion->blockRecycled );
				$this->setNoBlock( $pageRegion->noBlock );
				$this->setFormatId( $pageRegion->formatId );
				$this->setFormatPath( $pageRegion->formatPath );
				$this->setFormatRecycled( $pageRegion->formatRecycled );
				$this->setNoFormat( $pageRegion->noFormat );
			}else{
				//echo gettype ( $pageRegion );
			}
		}
	
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setBlockId($blockId) { $this->blockId = $blockId; }
		function getBlockId() { return $this->blockId; }
		function setBlockPath($blockPath) { $this->blockPath = $blockPath; }
		function getBlockPath() { return $this->blockPath; }
		function setBlockRecycled($blockRecycled) { $this->blockRecycled = $blockRecycled; }
		function getBlockRecycled() { return $this->blockRecycled; }
		function setNoBlock($noBlock) { $this->noBlock = $noBlock; }
		function getNoBlock() { return $this->noBlock; }
		function setFormatId($formatId) { $this->formatId = $formatId; }
		function getFormatId() { return $this->formatId; }
		function setFormatPath($formatPath) { $this->formatPath = $formatPath; }
		function getFormatPath() { return $this->formatPath; }
		function setFormatRecycled($formatRecycled) { $this->formatRecycled = $formatRecycled; }
		function getFormatRecycled() { return $this->formatRecycled; }
		function setNoFormat($NoFormat) { $this->noFormat = $NoFormat; }
		function getNoFormat() { return $this->noFormat; }
		

	
	}
?>