<?php

require_once '../database/config.php';

$output = array('data' => array());

$sql = "SELECT * FROM products WHERE quantity < warning_quantity AND is_deleted = '0' ORDER BY id DESC";

$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

    // Show red badge to indicate critical stock
    if ($row['quantity'] < $row['warning_quantity']) {
        $row_quantity = '<span class="badge bg-danger">' . $row['quantity'] . '</span>';
        $row_warning_quantity = '<span class="badge bg-warning text-dark">' . $row['warning_quantity'] . '</span>';
    } else {
        $row_quantity = $row['quantity'];
        $row_quantity = $row['warning_quantity'];
    }

    $action_buttons = '
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_stock_modal" onclick="editCriticalStock(' . $row['id'] . ')">
      <i class="fa-solid fa-pen-to-square"></i>
    </button>
    ';

    $output['data'][] = array(
        $x++,
        $row['product_name'],
        $row['product_category'],
        // $row['quantity'],
        $row_quantity,
        // $row['warning_quantity'],
        $row_warning_quantity,
        $action_buttons,
    );

    // $x++;
}

// Close database connection
$connection->close();

echo json_encode($output);
