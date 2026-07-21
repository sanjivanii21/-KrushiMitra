<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.html");
    exit();
}

$disease = "";
$solution = "";
$imageName = "";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['detect'])){

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        $imageName = time()."_".$_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/".$imageName
        );
    }

    $crop = $_POST['crop'];
    $symptom = $_POST['symptom'];

     if($crop=="Rice" && $symptom=="Brown Spots"){
    $disease = "Brown Spot Disease";
    $solution = "Apply fungicides and use healthy seeds.";
}
elseif($crop=="Rice" && $symptom=="Yellow Leaves"){
    $disease = "Bacterial Leaf Blight";
    $solution = "Use copper-based sprays and avoid excess nitrogen.";
}
elseif($crop=="Rice" && $symptom=="Dry Leaves"){
    $disease = "Blast Disease";
    $solution = "Apply Tricyclazole fungicide.";
}

elseif($crop=="Cotton" && $symptom=="Leaf Curl"){
    $disease = "Cotton Leaf Curl Virus";
    $solution = "Control whiteflies and remove infected plants.";
}
elseif($crop=="Cotton" && $symptom=="Black Spots"){
    $disease = "Alternaria Leaf Spot";
    $solution = "Spray Mancozeb fungicide.";
}

elseif($crop=="Wheat" && $symptom=="Rust Spots"){
    $disease = "Wheat Rust";
    $solution = "Apply recommended fungicide.";
}
elseif($crop=="Wheat" && $symptom=="White Powder"){
    $disease = "Powdery Mildew";
    $solution = "Spray sulfur-based fungicides.";
}

elseif($crop=="Soybean" && $symptom=="Yellow Leaves"){
    $disease = "Soybean Mosaic Virus";
    $solution = "Use resistant varieties and control aphids.";
}
elseif($crop=="Soybean" && $symptom=="Brown Patches"){
    $disease = "Frogeye Leaf Spot";
    $solution = "Use fungicides and crop rotation.";
}

elseif($crop=="Maize" && $symptom=="Yellow Leaves"){
    $disease = "Nitrogen Deficiency";
    $solution = "Apply nitrogen-rich fertilizer.";
}
elseif($crop=="Maize" && $symptom=="Brown Spots"){
    $disease = "Northern Corn Leaf Blight";
    $solution = "Use resistant varieties and fungicides.";
}

elseif($crop=="Tomato" && $symptom=="Yellow Leaves"){
    $disease = "Early Blight";
    $solution = "Apply fungicide and remove infected leaves.";
}
elseif($crop=="Tomato" && $symptom=="Leaf Curl"){
    $disease = "Tomato Leaf Curl Virus";
    $solution = "Control whiteflies and remove infected plants.";
}

elseif($crop=="Potato" && $symptom=="Black Spots"){
    $disease = "Late Blight";
    $solution = "Apply copper-based fungicides.";
}
elseif($crop=="Potato" && $symptom=="Yellow Leaves"){
    $disease = "Potato Virus Y";
    $solution = "Use certified disease-free seeds.";
}
elseif($crop=="Sugarcane" && $symptom=="Yellow Leaves"){
    $disease = "Yellow Leaf Disease";
    $solution = "Use disease-free planting material and control aphids.";
}
elseif($crop=="Sugarcane" && $symptom=="Red Spots"){
    $disease = "Red Rot Disease";
    $solution = "Remove infected plants and use resistant varieties.";
}
elseif($crop=="Sugarcane" && $symptom=="Dry Leaves"){
    $disease = "Wilt Disease";
    $solution = "Improve drainage and use healthy seed cane.";
}
elseif($crop=="Sugarcane" && $symptom=="Brown Spots"){
    $disease = "Eye Spot Disease";
    $solution = "Apply recommended fungicides and maintain field hygiene.";
}
else{
    $disease = "Disease Not Identified";
    $solution = "⚠️ The selected crop and symptom combination is not available in our database. Please consult an agricultural expert or try another symptom.";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Disease Detection - KrushiMitra</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f7fa;
}

.container{
    width:90%;
    max-width:750px;
    margin:30px auto;
}

.back-btn{
    display:inline-block;
    background:#16a34a;
    color:white;
    text-decoration:none;
    padding:10px 20px;
    border-radius:10px;
    margin-bottom:15px;
    font-weight:bold;
}

.back-btn:hover{
    background:#15803d;
}

.card{
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.page-title{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:white;
    text-align:center;
    padding:20px;
    border-radius:15px;
    margin-bottom:20px;
}

.welcome{
    background:#dcfce7;
    padding:12px;
    border-radius:10px;
    color:#166534;
    font-weight:bold;
    margin-bottom:20px;
}

.icon{
    text-align:center;
    font-size:60px;
    margin-bottom:10px;
}

.form-group{
    margin-bottom:20px;
}

label{
    display:block;
    font-weight:bold;
    margin-bottom:8px;
}

input[type=file],
select{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
}

button{
    width:100%;
    background:#16a34a;
    color:white;
    border:none;
    padding:14px;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#15803d;
}

.result{
    margin-top:25px;
    background:#f0fdf4;
    padding:20px;
    border-left:6px solid #16a34a;
    border-radius:10px;
}

.result h3{
    margin-bottom:10px;
}

.disease{
    color:#dc2626;
    font-size:22px;
    font-weight:bold;
}

.solution{
    color:#166534;
    font-size:16px;
}

img{
    border-radius:15px;
    margin-top:10px;
    box-shadow:0 4px 10px rgba(0,0,0,.2);
}

</style>
</head>

<body>

<div class="container">

<a href="../dashboard.php" class="back-btn">
⬅ Back to Dashboard
</a>

<div class="card">

<div class="page-title">
    <h1>🌾 Disease Detection</h1>
    <p>Identify crop diseases and get solutions</p>
</div>

<div class="welcome">
👋 Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>
</div>

<div class="icon">🦠</div>

<form method="POST" enctype="multipart/form-data">

<div class="form-group">
<label>📷 Upload Leaf Image</label>
<input type="file" name="image" accept="image/*" required>
</div>

<div class="form-group">
<label>🌾 Select Crop</label>

 <select name="crop" required>
    <option value="">-- Select Crop --</option>
    <option value="Rice">Rice</option>
    <option value="Wheat">Wheat</option>
    <option value="Cotton">Cotton</option>
    <option value="Soybean">Soybean</option>
    <option value="Maize">Maize</option>
    <option value="Sugarcane">Sugarcane</option>
    <option value="Tomato">Tomato</option>
    <option value="Potato">Potato</option>
</select>
</div>

<div class="form-group">
<label>🍂 Select Symptom</label>

<select name="symptom" required>
<option value="">-- Select Symptom --</option>
<option value="Brown Spots">Brown Spots</option>
<option value="Yellow Leaves">Yellow Leaves</option>
<option value="Leaf Curl">Leaf Curl</option>
<option value="Rust Spots">Rust Spots</option>
<option value="Dry Leaves">Dry Leaves</option>
<option value="Black Spots">Black Spots</option>
<option value="White Powder">White Powder</option>
<option value="Brown Patches">Brown Patches</option>
<option value="Red Spots">Red Spots</option>
<option value="Yellow Leaves">Yellow Leaves</option>
<option value="Dry Leaves">Dry Leaves</option>

</select>
</div>

<button type="submit" name="detect">
🔍 Detect Disease
</button>

</form>

<?php if($disease!=""){ ?>

<div class="result">

<?php if($imageName!=""){ ?>
<center>
<h3>📷 Uploaded Leaf Image</h3>
<img src="../uploads/<?php echo $imageName; ?>" width="250">
</center>
<?php } ?>

<h3>🦠 Detected Disease</h3>

<p class="disease">
<?php echo $disease; ?>
</p>

<br>

<h3>💊 Recommended Solution</h3>

<p class="solution">
<?php echo $solution; ?>
</p>

</div>
<?php if($disease=="Disease Not Identified"){ ?>
<div style="background:#fef3c7;padding:15px;border-radius:10px;color:#92400e;">
    <?php echo $solution; ?>
</div>
<?php } ?>
<?php } ?>

</div>

</div>

</body>
</html>