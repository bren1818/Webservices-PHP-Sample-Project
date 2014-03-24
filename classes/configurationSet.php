<?php
/*
 *Simple ConfigurationSet Class 
 *by Brendon Irwin
 */
	class ConfigurationSet{
		private $id;
		private $name;
		private $parentContainerId;
		private $parentContainerPath;
		private $path;
		private $siteId;
		private $siteName;
		private $pageConfigurations; //array of pageConfiguration
		private $pageConfigurationCount;
		private $defaultPageConfiguration = 0;
	
		function __construct( $configurationSet ){
			$this->setId( $configurationSet->id );
			$this->setName( $configurationSet->name);
			$this->setParentContainerId( $configurationSet->parentContainerId);
			$this->setParentContainerPath( $configurationSet->parentContainerPath);
			$this->setPath( $configurationSet->path);
			$this->setSiteId( $configurationSet->siteId);
			$this->setSiteName( $configurationSet->siteName);
			$this->setPageConfigurations( $configurationSet->pageConfigurations );
			$this->setDefaultPageConfiguration = 0;
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
		function setDefaultPageConfiguration( $default ){ $this->defaultPageConfiguration = $default; }
		function getDefaultPageConfiguration(){ return $this->defaultPageConfiguration; }
	
		function setPageConfigurations($pageConfigurations){
			$pageConfigurationsArray = array();
			foreach( $pageConfigurations as $k=>$pageConfiguration ){
				$pageConfigurationsArray[] = new PageConfiguration( $pageConfiguration );
			}
			
			$this->pageConfigurationCount = sizeof( $pageConfigurationsArray );
			$this->pageConfigurations = $pageConfigurationsArray;
		}
		
		function getPageConfigurationCount(){
			return $this->pageConfigurationCount;
		}
		
		
		function getActiveConfiguration(){
			foreach( $this->pageConfigurations as $pc ){
				if( $pc->isDefaultConfiguration() ){
					return $pc;
					break;
				}
			
			}
		}
		
		function getPageConfigurations(){
			return $this->pageConfigurations;
		}
		
		
	}
?>