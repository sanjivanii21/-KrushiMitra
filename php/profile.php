 <?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.html");
    exit();
}

$conn = new mysqli("localhost","root","","krushimitra_new");

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE user_id='$user_id'"
);

$user = mysqli_fetch_assoc($result);

if(!$user){
    die("User not found");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>My Profile - KrushiMitra</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4fff4;
}

.container{
    width:90%;
    max-width:900px;
    margin:40px auto;
}

.profile-card{
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.15);
}

.profile-header{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:white;
    text-align:center;
    padding:40px 20px;
}

.profile-img{
    width:140px;
    height:140px;
    border-radius:50%;
    border:5px solid white;
    object-fit:cover;
    box-shadow:0 4px 15px rgba(0,0,0,.2);
}

.profile-header h2{
    margin-top:15px;
    font-size:30px;
}

.profile-header p{
    margin-top:8px;
    font-size:18px;
}

.welcome-box{
    background:#dcfce7;
    padding:18px;
    text-align:center;
    color:#166534;
    font-size:20px;
    font-weight:bold;
}

.profile-details{
    padding:30px;
}

.detail{
    background:#f0fdf4;
    border-left:5px solid #16a34a;
    padding:18px;
    border-radius:12px;
    margin-bottom:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.label{
    font-weight:bold;
    color:#166534;
    font-size:17px;
}

.value{
    color:#111;
    font-size:17px;
}

.stats{
    display:flex;
    justify-content:space-around;
    gap:15px;
    padding:20px 30px;
}

.stat-box{
    flex:1;
    background:#f0fdf4;
    text-align:center;
    padding:20px;
    border-radius:15px;
}

.stat-box h3{
    color:#16a34a;
    font-size:28px;
}

.stat-box p{
    color:#555;
}

.btn-group{
    display:flex;
    justify-content:center;
    gap:15px;
    margin:25px;
    flex-wrap:wrap;
}

.btn{
    text-decoration:none;
    padding:14px 25px;
    border-radius:12px;
    color:white;
    font-weight:bold;
    transition:.3s;
}

.dashboard-btn{
    background:#16a34a;
}

.dashboard-btn:hover{
    background:#15803d;
}

.logout-btn{
    background:#dc2626;
}

.logout-btn:hover{
    background:#b91c1c;
}

</style>

</head>

<body>

<div class="container">

<div class="profile-card">

<div class="profile-header">

<img src="../images/farmer.jpeg" class="profile-img">

<h2><?php echo $user['full_name']; ?></h2>

<p>🌾 Proud Farmer of KrushiMitra</p>

</div>

<div class="welcome-box">
👋 Welcome Back, <?php echo $user['full_name']; ?>
</div>

<div class="stats">

<div class="stat-box">
<h3>🌱</h3>
<p>Farmer</p>
</div>

<div class="stat-box">
<h3>📈</h3>
<p>Active User</p>
</div>

<div class="stat-box">
<h3>🚜</h3>
<p>KrushiMitra</p>
</div>

</div>

<div class="profile-details">

<div class="detail">
<span class="label">🆔 Farmer ID</span>
<span class="value"><?php echo $user['user_id']; ?></span>
</div>

<div class="detail">
<span class="label">👤 Full Name</span>
<span class="value"><?php echo $user['full_name']; ?></span>
</div>

<div class="detail">
<span class="label">📧 Email Address</span>
<span class="value"><?php echo $user['email']; ?></span>
</div>

<div class="detail">
<span class="label">🌿 Role</span>
<span class="value"><?php echo ucfirst($user['role']); ?></span>
</div>

</div>

<div class="btn-group">

<a href="../dashboard.php" class="btn dashboard-btn">
🏠 Back to Dashboard
</a>

<a href="../logout.php" class="btn logout-btn">
🚪 Logout
</a>

</div>

</div>

</div>

</body>
</html>