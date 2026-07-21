 <?php

$conn = new mysqli("localhost","root","","krushimitra_new");

$result = mysqli_query(
$conn,
"SELECT * FROM market_prices"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Market Prices - KrushiMitra</title>

<style>

body{
    font-family:'Segoe UI',sans-serif;
    background:#f4fff4;
    margin:0;
}

.header{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:white;
    text-align:center;
    padding:25px;
}

.container{
    width:90%;
    max-width:1000px;
    margin:30px auto;
}

.back-btn{
    display:inline-block;
    background:#16a34a;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:10px;
    margin-bottom:20px;
    font-weight:bold;
}

.back-btn:hover{
    background:#15803d;
}

.card{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#16a34a;
    color:white;
    padding:15px;
}

td{
    padding:15px;
    text-align:center;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f0fdf4;
}

.price{
    color:#16a34a;
    font-weight:bold;
    font-size:18px;
}

</style>
</head>

<body>

<div class="header">
    <h1>💰 Market Prices</h1>
    <p>Latest Crop Market Rates</p>
</div>

<div class="container">

<a href="../dashboard.php" class="back-btn">
⬅ Back to Dashboard
</a>

<div class="card">

<table>

<tr>
    <th>🌾 Crop Name</th>
    <th>💰 Price Per Quintal</th>
    <th>📅 Updated On</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
    <td><?php echo $row['crop_name']; ?></td>

    <td class="price">
        ₹ <?php echo $row['price']; ?>
    </td>

    <td>
        <?php echo $row['updated_at']; ?>
    </td>
</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>