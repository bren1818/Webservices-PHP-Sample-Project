<?php
/*
 *Simple PageConfiguration Class 
 *by Brendon Irwin
 */
	require_once("pageRegion.php"); 
 
	class PageConfiguration{
		private $id;
		private $name;
		private $defaultConfiguration;
		private $templateId;
		private $templatePath;
		private $formatId;
		private $formatPath;
		private $formatRecycled;
		private $outputExtension;
		private $serializationType;
		private $includeXMLDeclaration;
		private $publishable;
		
		private $pageRegions; //array
		private $pageRegionsCount;
		
		function __construct( $pageConfiguration ){
			if( is_object( $pageConfiguration ) ){
		
				$this->setId( $pageConfiguration->id );
				$this->setName( $pageConfiguration->name );
				$this->setDefaultConfiguration( $pageConfiguration->defaultConfiguration );
				$this->setTemplateId( $pageConfiguration->templateId );
				$this->setTemplatePath( $pageConfiguration->templatePath );
				$this->setFormatId( $pageConfiguration->formatId );
				$this->setFormatPath( $pageConfiguration->formatPath );
				$this->setFormatRecycled( $pageConfiguration->formatRecycled );
				$this->setOutputExtension( $pageConfiguration->outputExtension );
				$this->setSerializationType( $pageConfiguration->serializationType );
				$this->setIncludeXMLDeclaration( $pageConfiguration->includeXMLDeclaration );
				$this->setPublishable( $pageConfiguration->publishable );
				$this->setPageRegions( $pageConfiguration->pageRegions );
			}
		}
		
		public function setPageRegions( $pageRegions ){
			/* to do
			
			
			$pageRegionsArray = array();
			if( is_object( $pageRegions->pageRegion )  ){ //not array
				$pageRegionsArray[] = new PageRegion( $pageRegions->pageRegion );
			}else{
				foreach( $pageRegions->pageRegion as $pageRegion ){
					$pageRegionsArray[] = new PageRegion( $pageRegion );
				}
			}
			
			$this->pageRegions = $pageRegionsArray;
			$this->pageRegionsCount = sizeof( $pageRegionsArray );	
			}else{
			$this->pageRegions = array();
			$this->pageRegionsCount = 0;
			 */
		}
		
		public function getPageRegions(){ //Array
			return $this->pageRegions;
		}
		
		public function getPageRegion( $index ){
			if( isset($index) && $index >= 0 && $index < $this->getPageRegionCount() ){
				return $this->pageRegions[ $index ];
			}else{
				return $this->pageRegions[0]; //first Item
			}
		}
		
		function getPageRegionCount(){
			return $this->pageRegionsCount;
		}
	
		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }
		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }
		function setDefaultConfiguration($defaultConfiguration) { $this->defaultConfiguration = $defaultConfiguration; }
		function getDefaultConfiguration() { return $this->defaultConfiguration; }
		function isDefaultConfiguration(){
			if( $this->getDefaultConfiguration() == 1 ){
				return true;
			}
		}
		
		function setTemplateId($templateId) { $this->templateId = $templateId; }
		function getTemplateId() { return $this->templateId; }
		function setTemplatePath($templatePath) { $this->templatePath = $templatePath; }
		function getTemplatePath() { return $this->templatePath; }
		function setFormatId($formatId) { $this->formatId = $formatId; }
		function getFormatId() { return $this->formatId; }
		function setFormatPath($formatPath) { $this->formatPath = $formatPath; }
		function getFormatPath() { return $this->formatPath; }
		function setFormatRecycled($formatRecycled) { $this->formatRecycled = $formatRecycled; }
		function getFormatRecycled() { return $this->formatRecycled; }
		function setOutputExtension($outputExtension) { $this->outputExtension = $outputExtension; }
		function getOutputExtension() { return $this->outputExtension; }
		function setSerializationType($serializationType) { $this->serializationType = $serializationType; }
		function getSerializationType() { return $this->serializationType; }
		function setIncludeXMLDeclaration($includeXMLDeclaration) { $this->includeXMLDeclaration = $includeXMLDeclaration; }
		function getIncludeXMLDeclaration() { return $this->includeXMLDeclaration; }
		function setPublishable($publishable) { $this->publishable = $publishable; }
		function getPublishable() { return $this->publishable; }

	}
?>