<?php

session_start();
if(
   !isset($_SESSION['role']) ||
   $_SESSION['role'] != 'farmer'
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

if(!isset($_SESSION['user_id'])){
    die("Session user_id not found");
}

$farmer_id = $_SESSION['user_id'];



$result = mysqli_query(
$conn,
"SELECT * FROM farmer_schedule
WHERE farmer_id='$farmer_id'
ORDER BY schedule_date"
);

 
?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>कृषिMitra 🌾 Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@700&family=Pacifico&display=swap" rel="stylesheet">
<style>
body { margin:0; font-family: Arial, sans-serif; background:#f4fff4; }
 

nav{
    background:linear-gradient(135deg,#0f766e,#16a34a);
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:10px 25px;
    box-shadow:0 4px 15px rgba(0,0,0,.2);
    position:sticky;
    top:0;
    z-index:1000;
}

.logo-circle{
    width:65px;
    height:65px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid white;
}

nav ul{
    display:flex;
    align-items:center;
    gap:12px;
    list-style:none;
    margin:0;
    padding:0;
}

nav ul li{
    color:white;
    font-size:17px;
    font-weight:600;
    cursor:pointer;
    padding:10px 15px;
    border-radius:10px;
    transition:.3s;
}

nav ul li:hover{
    background:rgba(255,255,255,.2);
    transform:translateY(-2px);
}

nav ul li a{
    color:white;
    text-decoration:none;
    display:block;
}

nav ul li:last-child{
    background:#dc2626;
}

nav ul li:last-child:hover{
    background:#b91c1c;
}

.lang-select select{
    padding:10px 15px;
    border:none;
    border-radius:10px;
    font-size:14px;
    font-weight:600;
    outline:none;
    cursor:pointer;
    background:white;
    color:#166534;
}

@media(max-width:1200px){
    nav{
        flex-direction:column;
        gap:15px;
    }

    nav ul{
        flex-wrap:wrap;
        justify-content:center;
    }
}
/* Circular Logo */
.logo-circle {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #16a34a;
  display: block;
  margin: 0 auto 20px;
}
   .crop{
    width:100%;
    background:#f8fffa;
    border:1px solid #d1fae5;
    border-radius:15px;
    padding:15px;
    margin-bottom:15px;
}

.crop:hover{
    transform:translateY(-5px);
}

.crop img{
    width:180px;
    height:180px;
    object-fit:cover;
    border-radius:15px;
    border:4px solid #16a34a;
}

.crop-info{
    flex:1;
}

.crop-info h3{
    font-size:30px;
    color:#166534;
    margin-bottom:10px;
}

.crop-info p{
    font-size:18px;
    margin:8px 0;
}

.score-bar{
    width:100%;
    height:15px;
    background:#ddd;
    border-radius:10px;
    overflow:hidden;
    margin:10px 0;
}

.score-fill{
    height:100%;
    background:linear-gradient(90deg,#16a34a,#22c55e);
}
  .weather-container{
    max-width:900px;
    margin:30px auto;
}

.weather-title{
    text-align:center;
    color:#166534;
    font-size:32px;
    margin-bottom:25px;
}

.weather-card{
    background:linear-gradient(135deg,#16a34a,#0f766e);
    color:white;
    border-radius:25px;
    padding:30px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.weather-item{
    display:flex;
    align-items:center;
    gap:20px;
    margin-bottom:25px;
    background:rgba(255,255,255,0.15);
    padding:20px;
    border-radius:15px;
}

.weather-item:last-child{
    margin-bottom:0;
}

.weather-icon{
    font-size:40px;
    width:70px;
    height:70px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:white;
    color:#16a34a;
    border-radius:50%;
}

.weather-item h3{
    margin:0;
    font-size:22px;
}

.weather-item p{
    margin-top:5px;
    font-size:28px;
    font-weight:bold;
}
.section{
    display:none;
    padding:20px;
}

.section.active{
    display:block;
}
.schedule-card{
    background:white;
    padding:20px;
    border-radius:15px;
    margin-top:20px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.schedule-card table{
    width:100%;
    border-collapse:collapse;
}

.schedule-card th,
.schedule-card td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

.schedule-card th{
    background:#16a34a;
    color:white;
}
  
 
.main-box{
    width:95%;
    max-width:1400px;
    background:#00796B;
    padding:25px;
    border-radius:20px;
    margin:auto;
    display:flex;
    gap:25px;
    align-items:stretch;
}

.form-col,
.results-col{
    flex:1;
    display:flex;
}
 
 

.card{
    width:100%;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.1);
}

.card input,
.card select{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
    margin-top:5px;
}

.card button{
    width:100%;
    margin-top:20px;
    background:#16a34a;
    color:white;
    border:none;
    padding:14px;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
}

.card button:hover{
    background:#15803d;
}
 
 

.results-col .card{
    width:95%;
    height:95%;
    min-height:850px;
}
 

.crop{
    display:flex;
    gap:20px;
    background:#f8fffa;
    border:1px solid #d1fae5;
    border-radius:15px;
    padding:20px;
    margin-bottom:15px;
}

.crop img{
    width:150px;
    height:150px;
    object-fit:cover;
    border-radius:15px;
    border:3px solid #16a34a;
}

.crop-info{
    flex:1;
}

.crop-info h3{
    color:#166534;
    font-size:23px;
    margin-bottom:10px;
}

.crop-info p{
    font-size:15px;
    margin:6px 0;
}

.score-bar{
    width:100%;
    height:12px;
    background:#ddd;
    border-radius:10px;
    overflow:hidden;
    margin:10px 0;
}

.score-fill{
    height:100%;
    background:#16a34a;
}
.logo-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.site-name{
    color:white;
    font-size:28px;
    font-weight:bold;
}
nav h1{ font-family:'Pacifico',cursive;margin:0; }
nav ul{ list-style:none; display:flex; gap:20px; margin:0; padding:0; }
nav ul li{ cursor:pointer; }
nav .lang-select{ margin-left:20px; }
.section{ display:none; padding:20px; }
.active{ display:block; }
  
input,select,button{ width:100%; margin:6px 0; padding:8px; border-radius:6px; border:1px solid #ccc; }
button{ background:#16a34a; color:white; font-weight:bold; border:none; cursor:pointer; }
 
 
.tip{ font-size:0.75rem; color:#4b5563; margin-top:6px; }
label span{ font-weight:bold; display:block; margin-bottom:2px; }
</style>
</head>
<body>

<nav>
   <div class="logo-box">
    <img src="images/logo.jpg" alt="KrushiMitra Logo" class="logo-circle">
    <span class="site-name">🌾 KrushiMitra</span>
</div>
  <ul>
     <ul>

    <li onclick="showSection('cropSection')">
        Crop Recommendations
    </li>

    <li onclick="showSection('weatherSection')">
        Weather
    </li>

    <li>
        <a href="php/fertilizer.php">Fertilizer</a>
    </li>

    <li onclick="showSection('scheduleSection')">
        Schedule
    </li>
    <li>
<a href="php/disease_detection.php">
 Disease Detection
</a>
</li>
<li>
<a href="php/market_prices.php">
 Market Prices
</a>
</li>
    <li>
        <a href="php/profile.php">Profile</a>
    </li>

    <li>
        <a href="php/notifications.php">Notifications</a>
    </li>

    <li onclick="logout()">
        Logout
    </li>

</ul>
  <div class="lang-select">
    <select id="langSelect" onchange="setLang(this.value)">
      <option value="en">English</option>
      <option value="hi">हिंदी</option>
      <option value="mr">मराठी</option>
    </select>
  </div>
</nav>

<!-- Crop Recommendations Section -->
  <div id="cropSection" class="section active">

<div style="
background:#dcfce7;
padding:15px;
border-radius:15px;
margin-bottom:20px;
text-align:center;
font-size:20px;
font-weight:bold;
color:#166534;
">
👋 Welcome, <?php echo $_SESSION['name']; ?>
</div>

<div class="main-box">

<div class="form-col">

<div class="card">

<h2>🌱 Enter Field Details</h2>

<form id="cropForm">

<!-- all your form fields -->
<form id="cropForm" action="php/save_crop.php" method="POST"> 
    <label>🌍 Soil Type</label> <select name="soilType"> 
        <option>loamy</option> <option>sandy</option>
         <option>clay</option> <option>silty</option>
          <option>peaty</option>
         </select> 
         <label>🧪 Soil pH</label>
          <input type="number" step="0.1" name="ph" value="6.5"> 
          <label>🌧 Rainfall (mm)</label>
           <input type="number" name="rainfall" value="800"> 
           <label>🌡 Temperature (°C)</label>
            <input type="number" name="temperature" value="25"> 
            <label>📅 Season</label> <select name="season">
                 <option>kharif</option> <option>rabi</option>
                  <option>summer</option> <option>winter</option> 
                </select>
                 <label>🚜 Area (hectares)</label>
                  <input type="number" name="area" value="1"> 
                  <label>🌾 Previous Crop</label>
                   <input type="text" name="previousCrop"> 
                  <label> 
                    <input type="checkbox" name="organic"> 
                    🌿 Prefer Organic Farming
                 </label>
                 <button type="submit"> 🔍 Get Recommendations </button>
                  
</form>

</div>
</div>

<div class="results-col">

<div class="card">

<h2 style="color:#166534;">
🌾 Recommended Crops
</h2>

<div id="output">
<p>No recommendations yet.</p>

<img src="images/b4.jpg"
width="200"
style="margin-top:10px;">
</div>

</div>
</div>

</div>

</div> <!-- cropSection ends here -->
<!-- Weather Section -->
    <div id="weatherSection" class="section">

    <div class="weather-container">

        <h2 class="weather-title">
            🌦 Live Weather Information
        </h2>

        <div class="weather-card">

            <div class="weather-item">
                <div class="weather-icon">📍</div>
                <div>
                    <h3>Location</h3>
                    <p id="location">Loading...</p>
                </div>
            </div>

            <div class="weather-item">
                <div class="weather-icon">🌡</div>
                <div>
                    <h3>Temperature</h3>
                    <p><span id="temp">--</span> °C</p>
                </div>
            </div>

            <div class="weather-item">
                <div class="weather-icon">💨</div>
                <div>
                    <h3>Wind Speed</h3>
                    <p><span id="wind">--</span> km/h</p>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Schedule Section -->
  <div id="scheduleSection" class="section">

<h3>📅 My Schedule</h3>

<table border="1" width="100%">

<tr>
<th>Activity</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['activity']; ?></td>
<td><?php echo $row['schedule_date']; ?></td>
<td><?php echo $row['status']; ?></td>
</tr>

<?php } ?>

</table>

</div>

<!-- Profile Section -->
<div id="profileSection" class="section">
  <div class="main-box">
    <h2>👤 Farmer Profile</h2>
    <p><b>Name:</b> <span id="farmerName">Farmer</span></p>
    <p><b>Farm Size:</b> 5 acres</p>
    <p><b>Main Crop:</b> Wheat</p>
  </div>
</div>

<script>
    async function getWeatherByLocation() {

    navigator.geolocation.getCurrentPosition(

        async function(position) {

            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            console.log("Latitude:", lat);
            console.log("Longitude:", lon);

            try {

                const weatherResponse = await fetch(
                    `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true`
                );

                const weatherData = await weatherResponse.json();

                console.log("Weather Data:", weatherData);

                document.getElementById("temp").innerText =
                    weatherData.current_weather.temperature;

                document.getElementById("wind").innerText =
                    weatherData.current_weather.windspeed;

                document.getElementById("location").innerText =
                    "Amravati";
                    // Weather Emoji
let weatherEmoji = "☀️";

if(weatherData.current_weather.temperature < 20){
    weatherEmoji = "🌥️";
}
else if(weatherData.current_weather.temperature > 35){
    weatherEmoji = "🔥";
}

document.querySelector(".weather-title").innerHTML =
weatherEmoji + " Live Weather Information";

            } catch(error) {

                console.error("Weather Error:", error);

            }

        },

        function(error) {

            console.error("Location Error:", error);

        }

    );

}
// Show sections 
  function showSection(id){

    document.querySelectorAll(".section").forEach(section=>{
        section.classList.remove("active");
    });

    document.getElementById(id).classList.add("active");

    if(id==="weatherSection"){
        getWeatherByLocation();
    }
}

// Logout
function logout(){ sessionStorage.removeItem("cropUser"); window.location.href="index.html"; }

// Language JSON
const translations = {
  en:{formTitle:"🌱 Enter Field Details",labelSoil:"Soil Type:",labelPh:"Soil pH:",labelRainfall:"Rainfall (mm):",
  labelTemp:"Temperature (°C):",labelSeason:"Season:",labelArea:"Area (hectares):",labelPrev:"Previous Crop (optional):",
  labelOrganic:"Prefer organic crops",btnSubmit:"Get Recommendations 🌱",recTitle:"Recommended Crops",noRec:"No recommendations yet.",
  tip:"Tip: Rotate crops and follow local agronomy guidelines."},
  hi:{formTitle:"🌱 खेत विवरण दर्ज करें",labelSoil:"मिट्टी का प्रकार:",labelPh:"मिट्टी का pH:",labelRainfall:"वर्षा (मिमी):",
  labelTemp:"तापमान (°C):",labelSeason:"मौसम:",labelArea:"क्षेत्र (हेक्टेयर):",labelPrev:"पिछली फसल (वैकल्पिक):",
  labelOrganic:"जैविक फसल पसंद करें",btnSubmit:"सिफारिशें प्राप्त करें 🌱",recTitle:"अनुशंसित फसलें",noRec:"कोई सिफारिश अभी तक नहीं।",
  tip:"सुझाव: फसलें घुमाएँ और स्थानीय कृषि मार्गदर्शन का पालन करें।"},
  mr:{formTitle:"🌱 शेत माहिती भरा",labelSoil:"मातीचा प्रकार:",labelPh:"मातीचा pH:",labelRainfall:"पर्जन्य (मिमी):",
  labelTemp:"तापमान (°C):",labelSeason:"हंगाम:",labelArea:"क्षेत्र (हेक्टेअर):",labelPrev:"मागील पिक (ऐच्छिक):",
  labelOrganic:"सेंद्रिय पिक प्राधान्य द्या",btnSubmit:"शिफारसी मिळवा 🌱",recTitle:"शिफारस केलेली पिके",noRec:"अद्याप कोणतीही शिफारस नाही.",
  tip:"सल्ला: पिकांची फेरबदल करा आणि स्थानिक कृषी मार्गदर्शन पाळा."}
};

let currentLang='en';
function setLang(lang){
  currentLang=lang;
  const t=translations[lang];
  document.getElementById("formTitle").innerText=t.formTitle;
  document.getElementById("labelSoilText").innerText=t.labelSoil;
  document.getElementById("labelPhText").innerText=t.labelPh;
  document.getElementById("labelRainfallText").innerText=t.labelRainfall;
  document.getElementById("labelTempText").innerText=t.labelTemp;
  document.getElementById("labelSeasonText").innerText=t.labelSeason;
  document.getElementById("labelAreaText").innerText=t.labelArea;
  document.getElementById("labelPrevText").innerText=t.labelPrev;
  document.getElementById("labelOrganicText").innerText=t.labelOrganic;
  document.getElementById("btnSubmit").innerText=t.btnSubmit;
  document.getElementById("recTitle").innerText=t.recTitle;
  document.getElementById("noRec").innerText=t.noRec;
}

// Crop data
 const crops=[
{name:"Rice",tags:["paddy","water-intensive"],image:"images/rice.jpeg",planting:"June",harvest:"Oct",water:"High"},
{name:"Wheat",tags:["grain","cool-season"],image:"images/wheat.jpeg",planting:"Nov",harvest:"Apr",water:"Medium"},
{name:"Maize",tags:["grain","versatile"],image:"images/maize.jpeg",planting:"June",harvest:"Oct",water:"Medium"},
{name:"Millets",tags:["drought-tolerant"],image:"images/millets.jpeg",planting:"June",harvest:"Sep",water:"Low"},
{name:"Soybean",tags:["pulse","legume"],image:"images/soyabean.jpeg",planting:"June",harvest:"Sep",water:"Medium"},
{name:"Cotton",tags:["fiber","warm-season"],image:"images/cotton.jpeg",planting:"June",harvest:"Nov",water:"High"},
{name:"Peanut",tags:["oilseed","sandy-friendly"],image:"images/peanut.jpeg",planting:"June",harvest:"Oct",water:"Low"},
{name:"Sugarcane",tags:["cash","water-intensive"],image:"images/sugarcane.jpeg",planting:"Mar",harvest:"Dec",water:"High"}
];
// Recommendation function
function recommend(inputs){
  return crops.map(c=>{
    let score=50;
    if(c.tags.includes("water-intensive") && inputs.rainfall>1000) score+=20;
    if(c.tags.includes("drought-tolerant") && inputs.rainfall<600) score+=20;
    if(inputs.rainfall>=600 && inputs.rainfall<=1000) score+=10;
    if(c.name==="Wheat" && inputs.temperature<22) score+=15;
    if(c.name==="Rice" && inputs.temperature>=20 && inputs.temperature<=32) score+=15;
    if(c.name==="Cotton" && inputs.temperature>=25) score+=10;
    if(inputs.ph>=6 && inputs.ph<=7.5) score+=10;
    if((c.name==="Peanut"||c.name==="Millets") && inputs.ph>=5.5 && inputs.ph<=7) score+=8;
    if(inputs.soilType==="sandy" && c.tags.includes("sandy-friendly")) score+=15;
    if(inputs.soilType==="loamy") score+=10;
    if(inputs.season==="kharif" && ["Rice","Maize","Cotton","Soybean"].includes(c.name)) score+=10;
    if(inputs.season==="rabi" && ["Wheat","Millets"].includes(c.name)) score+=10;
    if(inputs.organic && ["Millets","Cotton"].includes(c.name)) score+=8;
     return {
    ...c,
    score,
    estimatedYield: Math.max(
        1,
        Math.round(score / 100 * inputs.area * 3)
    )
};
  }).sort((a,b)=>b.score-a.score).slice(0,5);
}

// Handle form submit
 document.getElementById("cropForm").addEventListener("submit", e => {
   alert("Form Submitted!");
    e.preventDefault();
      
    const formData = new FormData(e.target);

     fetch("http://localhost/farm/php/save_crop.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({
            soilType: formData.get("soilType"),
            ph: formData.get("ph"),
            rainfall: formData.get("rainfall"),
            temperature: formData.get("temperature"),
            season: formData.get("season"),
            area: formData.get("area"),
            previousCrop: formData.get("previousCrop"),
            organic: formData.get("organic") ? 1 : 0
        })
    })
    .then(res => res.text())
     .then(data => {
    alert(data);
    console.log(data);
})
    .catch(err => console.error(err));

    const inputs = Object.fromEntries(formData.entries());

    inputs.ph = parseFloat(inputs.ph);
    inputs.rainfall = parseInt(inputs.rainfall);
    inputs.temperature = parseInt(inputs.temperature);
    inputs.area = parseFloat(inputs.area);
    inputs.organic = formData.get("organic") === "on";

    const recs = recommend(inputs);

    const output = document.getElementById("output");
    const t = translations[currentLang];

    output.innerHTML =
        `<h2 id="recTitle">${t.recTitle}</h2>` +
        recs.map(r => `
        <div class="crop">
            <img src="${r.image}" alt="${r.name}">
            <div class="crop-info">
                <b>${r.name}</b> 🌱<br>
                Suitability: ${r.score}%<br>
                <div class="score-bar">
                    <div class="score-fill" style="width:${r.score}%"></div>
                </div>
                Estimated Yield: ${r.estimatedYield} t/ha<br>
                Planting: ${r.planting}, Harvest: ${r.harvest}<br>
                Water Req: ${r.water}, Organic: ${inputs.organic ? "Yes" : "No"}<br>
                Tags: ${r.tags.join(", ")}
            </div>
        </div>
    `).join('');
});
 window.onload = function() {
    getWeatherByLocation();
};
</script>

</body>
</html>

