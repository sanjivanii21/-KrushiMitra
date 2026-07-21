 <!DOCTYPE html>
<html>
<head>
<title>Settings - KrushiMitra</title>

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

/* Main Content */
.main{
    margin-left:250px;
    padding:30px;
}

.settings-box{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
    max-width:600px;
}

label{
    display:block;
    margin-top:15px;
    font-weight:bold;
}

input{
    width:100%;
    padding:10px;
    margin-top:8px;
    border:1px solid #ccc;
    border-radius:8px;
}

button{
    margin-top:20px;
    padding:12px 25px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#1d4ed8;
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

    <h1>⚙️ System Settings</h1>

    <div class="settings-box">

        <form>

            <label>Website Name</label>

            <input
                type="text"
                value="KrushiMitra">

            <label>Support Email</label>

            <input
                type="email"
                value="support@krushimitra.com">

            <label>Contact Number</label>

            <input
                type="text"
                value="+91 8010792721">

            <button type="submit">
                Save Settings
            </button>

        </form>

    </div>

</div>

</body>
</html>