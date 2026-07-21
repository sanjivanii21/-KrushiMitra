document.addEventListener("DOMContentLoaded", () => {
  const user = sessionStorage.getItem("cropUser");
  if (!user) {
    window.location.href = "login.html";
    return;
  }

  document.getElementById("logoutBtn").addEventListener("click", () => {
    sessionStorage.removeItem("cropUser");
    window.location.href = "login.html";
  });

  const form = document.getElementById("cropForm");
  const resultBox = document.getElementById("result");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const soil = document.getElementById("soil").value;
    const ph = parseFloat(document.getElementById("ph").value);
    const rain = parseFloat(document.getElementById("rain").value);
    const temp = parseFloat(document.getElementById("temp").value);

    let recommendation = "🌾 Default: Wheat";

    if (soil === "clay" && rain > 800 && ph >= 6 && ph <= 7.5) {
      recommendation = "🌾 Recommended Crop: Rice";
    } else if (soil === "loamy" && temp >= 20 && temp <= 30) {
      recommendation = "🌽 Recommended Crop: Maize";
    } else if (soil === "sandy" && rain < 500) {
      recommendation = "🥜 Recommended Crop: Groundnut";
    } else if (ph < 6) {
      recommendation = "🍅 Recommended Crop: Tomato";
    }

    resultBox.textContent = recommendation;
    resultBox.style.display = "block";
  });
});
