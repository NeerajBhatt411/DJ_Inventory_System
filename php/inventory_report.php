<?php
include 'db_connect.php';

$sql = "SELECT material_type, SUM(quantity_in_stock) AS total_stock, SUM(quantity_sold) AS total_sold FROM stock GROUP BY material_type";
$result = $conn->query($sql);

$reportData = [];

while ($row = $result->fetch_assoc()) {
    $reportData[] = $row;
}

echo json_encode($reportData);
?>
