<?php

require_once '../database/config.php';

$id = $_POST['product_id'];

$sql = "SELECT * FROM products WHERE id = $id";

$query = $connection->query($sql);

$result = $query->fetch_assoc();

$connection->close();

echo json_encode($result);
