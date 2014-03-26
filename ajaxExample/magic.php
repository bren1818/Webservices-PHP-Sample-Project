<?php
	include "../db.php";

	$searchInfo = array 
	(
		'assetName' => ' ', 				//[string] 
		'matchType' => 'match-all', 		//[match-all, match-any] *REQUIRED
		'searchBlocks' => false, 			//[boolean]
		'searchFiles' => false,				//[boolean]
		'searchFolders' => false,			//[boolean]
		'searchPages' => false,				//[boolean]
		'searchStylesheets' => false,		//[boolean]
		'searchSymlinks' => false,			//[boolean]
		'searchTemplates' => false			//[boolean]
	);
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if( isset( $_POST['search'] ) ){
			$searchString = $_POST['search']['search'];
			$searchType = $_POST['search']['searchType'];
			$searchWhat = $_POST['search']['searchWhat'];
			
			$searchInfo['assetName'] = $searchString;
			$searchInfo['matchType'] = ($searchType == "all" ? "match-all" : "match-any");
			switch( $searchWhat ){
				default:
				case "page":
					$searchInfo['searchPages'] = true;
				break;
				case "file":
					$searchInfo['searchFiles'] = true;
				break;
				case "folder":
					$searchInfo['searchFolders'] = true;
				break;
				case "template":
					$searchInfo['searchTemplates'] = true;
				break;
				case "block":
					$searchInfo['searchBlocks'] = true;
				break;
				case "symLink":
					$searchInfo['searchSymlinks'] = true;
				break;
				case "style":
					$searchInfo['searchStylesheets'] = true;
				break;
				case "all":
					$searchInfo['searchPages'] = true;
					$searchInfo['searchFiles'] = true;
					$searchInfo['searchFolders'] = true;
					$searchInfo['searchTemplates'] = true;
					$searchInfo['searchBlocks'] = true;
					$searchInfo['searchSymlinks'] = true;
					$searchInfo['searchStylesheets'] = true;
				break;
			}
			
			$searchParams = array ('authentication' => $auth, 'searchInformation' => $searchInfo);
			$reply = $client->search ($searchParams);
			if ($reply->searchReturn->success=='true'){
				if( isset( $reply->searchReturn->matches->match ) ){
					$resultCount = sizeof($reply->searchReturn->matches->match);
				}else{
					$resultCount = 0;
				}
				$items = array();
				if( $resultCount != 0 ){
					foreach( $reply->searchReturn->matches as $match ){
						$items[] = (array)$match; 
					}
				}
				$result = array("results" => sizeof($items), "items" => $items );
				
				echo json_encode( $result ); 

			}else{
				$result = json_encode( array("error"=>  $reply->searchReturn->message) );
				echo $result;
			}
		}else{
			$result = json_encode( array("error"=>"invalid - no search provides"));
			echo $result;
		}
	}
?>