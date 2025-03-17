<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {  // Password hash use karo for security
            $_SESSION['username'] = $username;

            // ✅ Redirect to Stock Management Page
            header("Location: stock_management.php");
            exit();
        } else {
            echo "<script>alert('❌ Incorrect Password!'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('❌ User Not Found!'); window.location.href='login.html';</script>";
    }
}
?>
