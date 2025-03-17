<?php
include 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    echo "Database password: " . $user['password'] . "<br>";
    echo "Entered password: " . $password . "<br>";

    // ⚠️ Debugging - Check actual password
    if ($password === $user['password']) {
        echo "Login successful!";
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}
?>
