<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "krushimitra_new"
);

if(isset($_GET['id']))
{
    $id = intval($_GET['id']);

    mysqli_query(
        $conn,
        "DELETE FROM users WHERE user_id=$id"
    );
}

header("Location: farmers.php");
exit();

?>