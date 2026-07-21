<?php

$conn = new mysqli("localhost","root","","krushimitra_new");

$result = mysqli_query(
$conn,
"SELECT * FROM users WHERE role='farmer'"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Registered Farmers</title>

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

 .delete-btn{
    background:#dc2626;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
}

.delete-btn:hover{
    background:#b91c1c;
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

    <h2>👨‍🌾 Registered Farmers</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($result)){ ?>

        <tr>

            <td><?php echo $row['user_id']; ?></td>

            <td><?php echo $row['full_name']; ?></td>

            <td><?php echo $row['email']; ?></td>

            <td>
                <a class="delete-btn"
                    href="delete_farmer.php?id=<?php echo $row['user_id']; ?>"
   class="delete-btn"
   onclick="return confirm('Are you sure you want to delete this farmer?');">
   Delete
</a>
                </a>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>