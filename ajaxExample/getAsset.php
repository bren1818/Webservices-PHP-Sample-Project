<?php
	include "../db.php";
	include "../classes/baseAsset.php";

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if( isset( $_POST['type'] ) && isset( $_POST['id'] )  ){
				$type = $_POST['type'];
				$id = $_POST['id'];
			
				$asset = new BaseAsset($client, $auth);
				$item = (array)$asset->getById( $type, $id );
				
				echo json_encode( $item );
			
			
			}
		}
?>