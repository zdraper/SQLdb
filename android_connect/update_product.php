<?php

/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_GET['pid'], $_GET['name'], $_GET['price'], $_GET['description'])) {
    
    $pid = trim($_GET['pid']);
    $name = trim($_GET['name']);
    $price = trim($_GET['price']);
    $description = trim($_GET['description']);

    // include db connect class
	require 'connect.php';
	
	if($update = $db->query("UPDATE products SET name = '$name', price = '$price', description = '$description' WHERE pid = $pid")){
		
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully updated.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}

?>
