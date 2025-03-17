<?php
include 'db_connect.php';

$stock_id = $_POST['stock_id'];

$sql = "DELETE FROM stock WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $stock_id);

if ($stmt->execute()) {
    echo "Stock removed successfully";
} else {
    echo "Error removing stock: " . $conn->error;
}
?>
