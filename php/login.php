 <?php
 error_reporting(0);
ini_set('display_errors', 0);
session_start();

$conn = new mysqli("localhost","root","","krushimitra_new");

$email = $_POST['email'];
$password = $_POST['password'];
echo "Email: " . $email . "<br>";
echo "Password: " . $password . "<br>";
$sql = "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['name'] = $user['full_name'];
    $_SESSION['role'] = $user['role'];

    if($user['role'] == 'admin'){

        header("Location: ../admin/admin_dashboard.php");
        exit();

    }else{

        header("Location: ../dashboard.php");
        exit();

    }

}else{

    echo "Invalid Email or Password";

}
?>