<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

// include db connect class
require 'connect.php';

if($result = $db->query("SELECT *FROM products")){
	if($count = $result->num_rows){
		$response["products"] = array();
		
		while($row = $result->fetch_object()){
			$product = array();
			$product["pid"] = $row->pid;
			$product["name"] = $row->name;
			$product["price"] = $row->price;
			$product["description"] = $row->description;
			$product["created_at"] = $row->created_at;
			$product["updated_at"] = $row->updated_at;
			
			
			array_push($response["products"], $product);
		}
		
		$response["success"] = 1;
		
		// echoing JSON response
		echo json_encode($response);
		// echo $response["products"];
	}
		
		$result->free();
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
?>

