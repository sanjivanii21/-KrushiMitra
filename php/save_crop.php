 <?php
session_start();
include 'db_connect.php';

$farmer_name = $_SESSION['name'];

$soil_type = $_POST['soilType'] ?? '';
$ph = $_POST['ph'] ?? 0;
$rainfall = $_POST['rainfall'] ?? 0;
$temperature = $_POST['temperature'] ?? 0;
$season = $_POST['season'] ?? '';
$area = $_POST['area'] ?? 0;
$previous_crop = $_POST['previousCrop'] ?? '';
$organic = isset($_POST['organic']) ? 1 : 0;

/* Crop Recommendation Logic */
if($season == "kharif"){
    $recommendedCrop = "Rice";
}
elseif($season == "rabi"){
    $recommendedCrop = "Wheat";
}
elseif($season == "summer"){
    $recommendedCrop = "Maize";
}
else{
    $recommendedCrop = "Cotton";
}

$sql = "INSERT INTO crop_recommendations
(
soil_type,
ph,
rainfall,
temperature,
season,
area,
previous_crop,
organic,
farmer_name,
recommended_crop
)
VALUES
(
'$soil_type',
'$ph',
'$rainfall',
'$temperature',
'$season',
'$area',
'$previous_crop',
'$organic',
'$farmer_name',
'$recommendedCrop'
)";

if($conn->query($sql)){
    echo "Crop data saved successfully!";
}
else{
    echo "Error: ".$conn->error;
}

$conn->close();
?>