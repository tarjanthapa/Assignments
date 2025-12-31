const form = document.getElementById("loginForm");
const usernameInput = document.getElementById("username");
const errorMsg = document.getElementById("errorMsg");

form.addEventListener("submit", function(e) {
  e.preventDefault();
  const username = usernameInput.value.trim();

  if (!username) {
    errorMsg.textContent = "Name is required";
    return;
  }
  if (username.length < 3) {
    errorMsg.textContent = "Name must be at least 3 characters";
    return;
  }

  localStorage.setItem("username", username);
  window.location.href = "dashboard.html";
});
