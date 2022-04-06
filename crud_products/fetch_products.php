<?php

require_once '../database/config.php';

$output = array('data' => array());

$sql = "SELECT * FROM products WHERE is_deleted = '0' ORDER BY id DESC";

$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

    $action_buttons = '
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_product_modal" onclick="editProduct(' . $row['id'] . ')">
      <i class="fa-solid fa-pen-to-square"></i>
    </button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#remove_product_modal" onclick="removeProduct(' . $row['id'] . ')">
      <i class="fa-solid fa-trash-can"></i>
    </button>
    ';

    $output['data'][] = array(
        $x++,
        $row['product_name'],
        $row['product_category'],
        $row['brand'],
        $row['supplier'],
        $row['price'],
        $action_buttons,
    );

    // $x++;
}

// Close database connection
$connection->close();

echo json_encode($output);
