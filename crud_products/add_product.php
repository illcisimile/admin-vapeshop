<?php

require_once '../database/config.php';

if ($_POST) {

    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $brand = $_POST['brand'];
    $supplier = $_POST['supplier'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (product_name, product_category, brand, supplier, price) VALUES ('$product_name', '$product_category', '$brand', '$supplier', '$price')";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Product added.');
    } else {
        $response = array('success' => false, 'message' => 'Error while adding product.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
