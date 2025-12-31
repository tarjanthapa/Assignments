const username = localStorage.getItem("username");
const welcomeMsg = document.getElementById("welcomeMsg");
const logoutBtn = document.getElementById("logoutBtn");

if (!username) window.location.href = "index.html";
else welcomeMsg.textContent = `Welcome, ${username}! Start tracking your time ⏱️`;

logoutBtn.addEventListener("click", function() {
  localStorage.removeItem("username");
  window.location.href = "index.html";
});
