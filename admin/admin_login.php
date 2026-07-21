<?php
session_start();

$conn = new mysqli("localhost","root","","krushimitra_new");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'
        AND role='admin'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['name'] = $row['full_name'];
    $_SESSION['role'] = $row['role'];

    echo "Login Success<br>";
    echo "<a href='admin_dashboard.php'>Go To Dashboard</a>";

} else {

    echo "Invalid Admin Login";

}
?>