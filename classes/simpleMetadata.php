<?php
/*
 *Simple Page Metadata Class 
 *by Brendon Irwin
 */
 
	class SimpleMetadata{
		private $author;
		private $displayName;
		private $endDate;
		private $keywords;
		private $metaDescription;
		private $reviewDate;
		private $startDate;
		private $summary;
		private $teaser;
		private $title;
		private $dynamicFields; //array?
		//public $baseObject;
		
		function __construct( $metadata ){
			//$this->setBaseObject($metadata);	
			$this->setAuthor( $metadata->author );
			$this->setDisplayName( $metadata->displayName );
			$this->setEndDate( $metadata->endDate );
			$this->setKeywords( $metadata->keywords );
			$this->setMetaDescription( $metadata->metaDescription );
			$this->setReviewDate( $metadata->reviewDate );
			$this->setStartDate( $metadata->startDate );
			$this->setSummary( $metadata->summary );
			$this->setTeaser( $metadata->teaser );
			$this->setTitle( $metadata->title );
			$this->setDynamicFields( $metadata->dynamicFields );
		}
		/*
		public function  setBaseObject( $metadata ){
			$this->baseObject = $metadata;
		}
		
		public function getBaseObject(){
			return $this->baseObject;
		}
		*/
		
		function setAuthor($author) { $this->author = $author; }
		function getAuthor() { return $this->author; }
		function setDisplayName($displayName) { $this->displayName = $displayName; }
		function getDisplayName() { return $this->displayName; }
		function setEndDate($endDate) { $this->endDate = $endDate; }
		function getEndDate() { return $this->endDate; }
		function setKeywords($keywords) { $this->keywords = $keywords; }
		function getKeywords() { return $this->keywords; }
		function setMetaDescription($metaDescription) { $this->metaDescription = $metaDescription; }
		function getMetaDescription() { return $this->metaDescription; }
		function setReviewDate($reviewDate) { $this->reviewDate = $reviewDate; }
		function getReviewDate() { return $this->reviewDate; }
		function setStartDate($startDate) { $this->startDate = $startDate; }
		function getStartDate() { return $this->startDate; }
		function setSummary($summary) { $this->summary = $summary; }
		function getSummary() { return $this->summary; }
		function setTeaser($teaser) { $this->teaser = $teaser; }
		function getTeaser() { return $this->teaser; }
		function setTitle($title) { $this->title = $title; }
		function getTitle() { return $this->title; }
		function setDynamicFields($dynamicFields) { $this->dynamicFields = $dynamicFields; }
		function getDynamicFields() { return $this->dynamicFields; }
	

	}
?>