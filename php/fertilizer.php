 <?php

$result = "";
$tips = "";

if(isset($_POST['check'])){

    $crop = $_POST['crop'];
    $soil = $_POST['soil'];

    if($crop=="Rice" && $soil=="Loamy"){
        $result = "Urea + DAP";
        $tips = "Best for Rice cultivation in Loamy soil.";
    }
    elseif($crop=="Wheat" && $soil=="Clay"){
        $result = "NPK 20:20:0";
        $tips = "Improves Wheat growth and grain quality.";
    }
    elseif($crop=="Cotton" && $soil=="Black"){
        $result = "NPK 10:26:26";
        $tips = "Suitable for Cotton in Black soil.";
    }
    elseif($crop=="Soybean" && $soil=="Black"){
        $result = "Single Super Phosphate (SSP)";
        $tips = "Enhances root development and yield.";
    }
    elseif($crop=="Maize" && $soil=="Sandy"){
        $result = "Vermicompost + Urea";
        $tips = "Provides nutrients and improves soil quality.";
    }
    else{
        $result = "Organic Compost";
        $tips = "General recommendation for healthy crop growth.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Fertilizer Recommendation - KrushiMitra</title>

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
    text-align:center;
    padding:30px;
    border-radius:0 0 25px 25px;
}

.header h1{
    margin-bottom:10px;
}

.container{
    width:90%;
    max-width:700px;
    margin:30px auto;
}

.back-btn{
    display:inline-block;
    background:#16a34a;
    color:white;
    text-decoration:none;
    padding:10px 20px;
    border-radius:10px;
    margin-bottom:20px;
    font-weight:bold;
}

.back-btn:hover{
    background:#15803d;
}

.card{
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 8px 20px rgba(0,0,0,.1);
}

.icon{
    text-align:center;
    font-size:70px;
    margin-bottom:10px;
}

.card h2{
    text-align:center;
    color:#166534;
    margin-bottom:20px;
}

label{
    font-weight:bold;
    color:#166534;
}

select{
    width:100%;
    padding:12px;
    margin-top:10px;
    margin-bottom:20px;
    border:1px solid #ddd;
    border-radius:10px;
}

button{
    width:100%;
    background:#16a34a;
    color:white;
    padding:14px;
    border:none;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#15803d;
}

.result-card{
    margin-top:25px;
    background:#f0fdf4;
    padding:20px;
    border-radius:15px;
    border-left:6px solid #16a34a;
}

.result-card h2{
    color:#166534;
    margin-bottom:10px;
}

.result-card p{
    font-size:18px;
    color:#333;
    margin-bottom:10px;
}

.tips{
    background:white;
    padding:15px;
    border-radius:10px;
    margin-top:15px;
}

.tips h3{
    color:#166534;
    margin-bottom:10px;
}

ul{
    padding-left:20px;
}

li{
    margin-bottom:8px;
}

.footer{
    text-align:center;
    margin-top:20px;
    color:#666;
}

</style>

</head>
<body>

<div class="header">
    <h1>🌱 Fertilizer Recommendation System</h1>
    <p>Get the best fertilizer based on your soil type</p>
</div>

<div class="container">

<a href="../dashboard.php" class="back-btn">
⬅ Back to Dashboard
</a>

<div class="card">

<div class="icon">🚜</div>

<h2>Soil Analysis</h2>

<form method="POST">

 
<label>🌾 Select Crop</label>

<select name="crop" required>
    <option value="">-- Select Crop --</option>
    <option value="Rice">Rice</option>
    <option value="Wheat">Wheat</option>
    <option value="Cotton">Cotton</option>
    <option value="Soybean">Soybean</option>
    <option value="Maize">Maize</option>
</select>

<label>🌱 Select Soil Type</label>

<select name="soil" required>
    <option value="">-- Select Soil Type --</option>
    <option value="Black">Black Soil</option>
    <option value="Loamy">Loamy Soil</option>
    <option value="Clay">Clay Soil</option>
    <option value="Sandy">Sandy Soil</option>
</select>
<button type="submit" name="check">
🔍 Get Recommendation
</button>

</form>

<?php if($result!=""){ ?>

<div class="result-card">

<h2>🧪 Recommended Fertilizer</h2>

<p><strong><?php echo $result; ?></strong></p>

<p><?php echo $tips; ?></p>

<div class="tips">

<h3>💡 Farmer Tips</h3>

<ul>
    <li>Apply fertilizer during morning or evening hours.</li>
    <li>Water the field after fertilizer application.</li>
    <li>Avoid excessive fertilizer use.</li>
    <li>Use organic manure regularly for better soil health.</li>
</ul>

</div>

</div>

<?php } ?>

</div>

<div class="footer">
    🌾 KrushiMitra - Smart Farming Assistant
</div>

</div>

</body>
</html>