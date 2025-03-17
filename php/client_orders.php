<?php
include 'db_connect.php';

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

$orderData = [];

while ($row = $result->fetch_assoc()) {
    $orderData[] = $row;
}

echo json_encode($orderData);
?>
