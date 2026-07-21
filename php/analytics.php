<?php

$conn = new mysqli("localhost","root","","krushimitra_new");

/* Total Farmers */
$totalFarmers = mysqli_fetch_row(
mysqli_query(
$conn,
"SELECT COUNT(*) FROM users WHERE role='farmer'"
))[0];

/* Total Recommendations */
$totalRecommendations = mysqli_fetch_row(
mysqli_query(
$conn,
"SELECT COUNT(*) FROM crop_recommendations"
))[0];

/* Market Price Records */
$totalMarkets = mysqli_fetch_row(
mysqli_query(
$conn,
"SELECT COUNT(*) FROM market_prices"
))[0];

?>

<!DOCTYPE html>
<html>
<head>

<title>Analytics</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

body{
    background:#f4f7fa;
    font-family:Arial;
}

.container{
    width:90%;
    margin:auto;
    margin-top:30px;
}

.card{
    background:white;
    padding:20px;
    margin-bottom:20px;
    border-radius:15px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
}

</style>

</head>

<body>

<div class="container">

<h2>📊 Analytics Dashboard</h2>

<div class="card">
<canvas id="analyticsChart"></canvas>
</div>

</div>

<script>

new Chart(
document.getElementById("analyticsChart"),
{
type:"bar",

data:{

labels:[
"Farmers",
"Recommendations",
"Market Records"
],

datasets:[{

label:"System Statistics",

data:[
<?php echo $totalFarmers; ?>,
<?php echo $totalRecommendations; ?>,
<?php echo $totalMarkets; ?>
]

}]
}

});

</script>

</body>
</html>