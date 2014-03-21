<?php
	//standard auth 
	$_USERNAME 	= "admin";
	$_PASSWORD 	= "admin";
	$_HOST 		= "http://localhost";
	$_PORT		= "8080";
	
	$soapURL = $_HOST.":".$_PORT."/ws/services/AssetOperationService?wsdl";
	$client = new SoapClient 
	( 
		$soapURL, 
		array ('trace' => 1, 'location' => str_replace('?wsdl', '', $soapURL)) 
	);	
	$auth = array ('username' => $_USERNAME, 'password' => $_PASSWORD );
?>