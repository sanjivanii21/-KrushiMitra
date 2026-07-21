<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}

$conn = new mysqli("localhost","root","","krushimitra_new");
 
 
$farmer_id = $_SESSION['user_id'];
 $result = mysqli_query(
$conn,
"SELECT * FROM farmer_schedule
WHERE farmer_id='$farmer_id'
AND status='Pending'
ORDER BY schedule_date ASC"
);
?>

 <!DOCTYPE html>
<html>
<head>
<title>Farmer Notifications</title>

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

.header{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:white;
    padding:20px;
    text-align:center;
    box-shadow:0 3px 10px rgba(0,0,0,.2);
}

.container{
    width:90%;
    max-width:900px;
    margin:30px auto;
}

.notification{
    background:white;
    border-radius:15px;
    padding:20px;
    margin-bottom:20px;
    box-shadow:0 4px 12px rgba(0,0,0,.1);
    border-left:8px solid #16a34a;
    transition:.3s;
}

.notification:hover{
    transform:translateY(-5px);
}

.notification h3{
    color:#166534;
    margin-bottom:10px;
}

.notification p{
    color:#555;
    margin:5px 0;
}

.empty{
    background:white;
    padding:30px;
    text-align:center;
    border-radius:15px;
    box-shadow:0 4px 12px rgba(0,0,0,.1);
}

.empty img{
    width:120px;
    margin-bottom:15px;
}

.footer{
    text-align:center;
    padding:15px;
    color:#666;
}
.back-btn{
    display:inline-block;
    background:#16a34a;
    color:white;
    text-decoration:none;
    padding:10px 20px;
    border-radius:8px;
    margin:20px;
    font-weight:bold;
    transition:0.3s;
}

.back-btn:hover{
    background:#15803d;
}
</style>

</head>

<body>

<div class="header">
    <h1>🌾 Farmer Notifications</h1>
    <p>Stay updated with your farming activities</p>
</div>

<div class="container">

<?php if(mysqli_num_rows($result) > 0){ ?>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="notification">

<h3>🚜 <?php echo $row['activity']; ?></h3>

<p>📅 Date: <?php echo $row['schedule_date']; ?></p>

<p>🔔 Status: <?php echo $row['status']; ?></p>

</div>
<a href="../dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

<?php } ?>

<?php } else { ?>

<div class="empty">
    <h2>🌱 No Pending Notifications</h2>
    <p>Your farming schedule is up to date.</p>
</div>
 
<?php } ?>

</div>
 
<div class="footer">
    🌾 KrushiMitra Smart Farming Assistant
</div>

</body>
</html>