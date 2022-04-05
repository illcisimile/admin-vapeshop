<?php

require_once '../database/config.php';

if ($_POST) {

    $id = $_POST['product_id'];
    $product_name = $_POST['edit_product_name'];
    $product_category = $_POST['edit_product_category'];
    $brand = $_POST['edit_brand'];
    $supplier = $_POST['edit_supplier'];
    $price = $_POST['edit_price'];

    $sql = "UPDATE products SET product_name = '$product_name', product_category = '$product_category', brand = '$brand', supplier = '$supplier', price = '$price' WHERE id = '$id'";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Product updated.');
    } else {
        $response = array('success' => false, 'message' => 'Error while updating product.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
