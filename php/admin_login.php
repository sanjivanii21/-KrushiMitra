<?php
session_start();

$conn = new mysqli("localhost","root","","krushimitra_new");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'
        AND role='admin'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    $_SESSION['admin'] = $email;
    header("Location: ../admin/admin_dashboard.php");
} else {
    echo "Invalid Admin Login";
}
?>