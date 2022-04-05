<?php

require_once '../database/config.php';

if ($_POST) {

    $id = $_POST['product_id'];
    $quantity = $_POST['edit_quantity'];
    $warning_quantity = $_POST['edit_warning_quantity'];

    $sql = "UPDATE products SET quantity = '$quantity', warning_quantity = '$warning_quantity' WHERE id = '$id'";

    $query = $connection->query($sql);

    if ($query) {
        $response = array('success' => true, 'message' => 'Stock updated.');
    } else {
        $response = array('success' => false, 'message' => 'Error while updating stock.');
    }

    // Close database connection
    $connection->close();

    echo json_encode($response);
}
