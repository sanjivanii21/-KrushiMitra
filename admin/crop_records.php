<?php

$conn = new mysqli("localhost","root","","krushimitra_new");

$result = mysqli_query(
$conn,
"SELECT * FROM crop_recommendations
ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Crop Recommendation Records</title>

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f4f7fa;
}

/* Sidebar */
.sidebar{
    width:250px;
    height:100vh;
    background:#2563eb;
    position:fixed;
    left:0;
    top:0;
}

.sidebar h2{
    color:white;
    text-align:center;
    padding:20px;
    border-bottom:1px solid rgba(255,255,255,0.3);
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 20px;
}

.sidebar a:hover{
    background:#1d4ed8;
}

/* Main Content */
.main{
    margin-left:250px;
    padding:30px;
}

h2{
    color:#2563eb;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

th{
    background:#2563eb;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f1f5f9;
}

</style>

</head>
<body>

<!-- Sidebar -->
<div class="sidebar">

    <h2>🌾 KrushiMitra</h2>

    <a href="admin_dashboard.php">🏠 Dashboard</a>
    <a href="farmers.php">👨‍🌾 Farmers</a>
    <a href="crop_records.php">🌱 Crop Records</a>
    <a href="reports.php">📊 Reports</a>
    <a href="settings.php">⚙️ Settings</a>
    <a href="../php/logout.php">🚪 Logout</a>

</div>

<!-- Main Content -->
<div class="main">

    <h2>🌱 Crop Recommendation Records</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Farmer</th>
            <th>Recommended Crop</th>
            <th>Season</th>
            <th>Date</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($result)){ ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['farmer_name']; ?></td>

            <td><?php echo $row['recommended_crop']; ?></td>

            <td><?php echo $row['season']; ?></td>

            <td><?php echo $row['created_at']; ?></td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>