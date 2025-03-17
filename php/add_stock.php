<?php
include 'db_connect.php';

$material_type = $_POST['material_type'];
$cost_per_gram = $_POST['cost_per_gram'];
$quantity_in_stock = $_POST['quantity_in_stock'];

$sql = "INSERT INTO stock (material_type, cost_per_gram, quantity_in_stock) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdi", $material_type, $cost_per_gram, $quantity_in_stock);

if ($stmt->execute()) {
    echo "Stock added successfully";
} else {
    echo "Error adding stock: " . $conn->error;
}
?>
