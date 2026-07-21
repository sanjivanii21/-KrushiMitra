 <?php
session_start();

if(
    !isset($_SESSION['role']) ||
    $_SESSION['role'] != 'admin'
){
    header("Location: login.html");
    exit();
}

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "krushimitra_new"
);

$totalFarmers = mysqli_fetch_row(
    mysqli_query($conn,"SELECT COUNT(*) FROM users WHERE role='farmer'")
)[0];

$totalAdmins = mysqli_fetch_row(
    mysqli_query($conn,"SELECT COUNT(*) FROM users WHERE role='admin'")
)[0];

$totalRecommendations = mysqli_fetch_row(
    mysqli_query($conn,"SELECT COUNT(*) FROM crop_recommendations")
)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - KrushiMitra</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f4f7fa;
}
.logo-circle {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #16a34a;
  display: block;
  margin: 0 auto 20px;
}

.sidebar{
    width:250px;
    height:100vh;
    background:#2563eb;
    position:fixed;
    left:0;
    top:0;
    color:white;
}

.sidebar h2{
    text-align:center;
    padding:20px;
    border-bottom:1px solid rgba(255,255,255,0.3);
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    padding:18px 25px;
}

.sidebar ul li a{
    color:white;
    text-decoration:none;
    display:block;
}

.sidebar ul li:hover{
    background:#1d4ed8;
}

.main{
    margin-left:250px;
    padding:30px;
}

.header{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-top:25px;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.card h1{
    color:#2563eb;
    margin-bottom:10px;
}

.quick-links{
    margin-top:30px;
}

.link-box{
    background:white;
    padding:20px;
    margin-top:15px;
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.link-box a{
    text-decoration:none;
    color:#2563eb;
    font-weight:bold;
}

</style>
</head>

<body>

<div class="sidebar">
   <img src="../images/logo.jpg" alt="कृषिMitra Logo" class="logo-circle">

    <h2>🌾 KrushiMitra</h2>

    <ul>
        <li><a href="admin_dashboard.php">🏠 Dashboard</a></li>
        <li><a href="farmers.php">👨‍🌾 Farmers</a></li>
        <li><a href="crop_records.php">🌱 Crop Records</a></li>
        <li><a href="reports.php">📊 Reports</a></li>
        <li>
<a href="manage_prices.php">
💰 Market Prices
</a>
</li><li>
<a href="analytics.php">
📊 Analytics
</a>
</li>
        <li><a href="../php/logout.php">🚪 Logout</a></li>
    </ul>

</div>

<div class="main">

    <div class="header">
        <h1>🛠️ Admin Dashboard</h1>
        <p>Welcome Administrator</p>
    </div>

    <div class="cards">

        <div class="card">
            <h1><?php echo $totalFarmers; ?></h1>
            <p>Total Farmers</p>
        </div>

        <div class="card">
            <h1><?php echo $totalAdmins; ?></h1>
            <p>Total Admins</p>
        </div>

        <div class="card">
            <h1><?php echo $totalRecommendations; ?></h1>
            <p>Crop Recommendations</p>
        </div>

    </div>

    <div class="quick-links">

        <div class="link-box">
            <h3>👨‍🌾 Farmer Management</h3>
            <p>View and manage registered farmers.</p>
            <a href="farmers.php">Open</a>
        </div>

        <div class="link-box">
            <h3>🌱 Crop Recommendation Records</h3>
            <p>View all crop recommendations generated.</p>
            <a href="crop_records.php">Open</a>
        </div>

        <div class="link-box">
            <h3>📊 Reports & Analytics</h3>
            <p>View charts and statistics.</p>
            <a href="reports.php">Open</a>
        </div>

    </div>

</div>

</body>
</html>