<!DOCTYPE html>
<html>
<head>
<title>Reports & Analytics</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

/* Main */
.main{
    margin-left:250px;
    padding:30px;
}

.chart-container{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
    margin-bottom:30px;
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

    <h1>📊 Reports & Analytics</h1>

    <div class="chart-container">
        <h3>Most Recommended Crops</h3>
        <canvas id="cropChart"></canvas>
    </div>

    <div class="chart-container">
        <h3>Seasonal Crop Trends</h3>
        <canvas id="seasonChart"></canvas>
    </div>

</div>

<script>

/* Crop Recommendation Chart */

new Chart(
document.getElementById("cropChart"),
{
type:"bar",

data:{
labels:[
"Rice",
"Wheat",
"Cotton",
"Soybean",
"Maize"
],

datasets:[{
label:"Recommendations",

data:[
40,
30,
20,
10,
15
]
}]
}
});

/* Seasonal Trend Chart */

new Chart(
document.getElementById("seasonChart"),
{
type:"pie",

data:{
labels:[
"Kharif",
"Rabi",
"Zaid"
],

datasets:[{
data:[
45,
35,
20
]
}]
}
});

</script>

</body>
</html>