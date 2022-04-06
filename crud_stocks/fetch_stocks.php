<?php

require_once '../database/config.php';

$output = array('data' => array());

$sql = "SELECT * FROM products WHERE is_deleted = '0' ORDER BY id DESC";

$query = $connection->query($sql);

$x = 1;

while ($row = $query->fetch_assoc()) {

    // Show red badge if quantity is less than warning quantity
    if ($row['quantity'] < $row['warning_quantity']) {
        // Red badge
        $row_quantity = '<span class="badge bg-danger">' . $row['quantity'] . '</span>';
        // Yellow badge
        $row_warning_quantity = '<span class="badge bg-warning text-dark">' . $row['warning_quantity'] . '</span>';
    }
    // Show cyan badge if quantity and warning quantity are yet to be set
    else if ($row['quantity'] == 0 && $row['warning_quantity'] == 0) {
        // Cyan badge
        $row_quantity = '<span class="badge bg-info text-dark">' . $row['quantity'] . '</span>';
        // Cyan badge
        $row_warning_quantity = '<span class="badge bg-info text-dark">' . $row['warning_quantity'] . '</span>';
    }
    // Show yellow badge if quantity is close to its warning quantity
    else if ($row['quantity'] - $row['warning_quantity'] <= 10) {
        // Yellow badge
        $row_quantity = '<span class="badge bg-warning text-dark">' . $row['quantity'] . '</span>';
        // Yellow badge
        $row_warning_quantity = '<span class="badge bg-warning text-dark">' . $row['warning_quantity'] . '</span>';
    }
    // Show green badge for safety stock
    else {
        // Green badge
        $row_quantity = '<span class="badge bg-success">' . $row['quantity'] . '</span>';
        // Yellow badge
        $row_warning_quantity = '<span class="badge bg-warning text-dark">' . $row['warning_quantity'] . '</span>';
    }

    $action_buttons = '
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_stock_modal" onclick="editStock(' . $row['id'] . ')">
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
