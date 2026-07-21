document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");
  const errorEl = document.getElementById("error");

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const user = document.getElementById("username").value;
    const pass = document.getElementById("password").value;

    if (user === "farmer" && pass === "1234") {
      sessionStorage.setItem("cropUser", user);
      window.location.href = "dashboard.html";
    } else {
      errorEl.textContent = "Invalid login. Try farmer / 1234";
    }
  });
});
