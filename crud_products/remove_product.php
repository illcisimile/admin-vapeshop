<?php

require_once '../database/config.php';

$id = $_POST['product_id'];

$sql = "UPDATE products SET is_deleted = '1' WHERE id = $id";

$query = $connection->query($sql);

if ($query) {
    $response = array('success' => true, 'message' => 'Product removed.');
} else {
    $response = array('success' => false, 'message' => 'Error while removing product.');
}

// Close database connection
$connection->close();

echo json_encode($response);
