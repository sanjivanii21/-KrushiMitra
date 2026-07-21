<?php

$conn = new mysqli("localhost","root","","krushimitra_new");

$name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users
(full_name,email,password,role)
VALUES
(
'$name',
'$email',
'$password',
'farmer'
)";

if(mysqli_query($conn,$sql))
{
    header("Location: ../login.html");
}
else
{
    echo "Registration Failed";
}

?>