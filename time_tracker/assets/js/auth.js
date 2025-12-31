function login() {
  const name = document.getElementById("username").value.trim();
  const error = document.getElementById("error");

  if (name.length < 3) {
    error.textContent = "Name must be at least 3 characters";
    return;
  }

  localStorage.setItem("username", name);

  // redirect
  window.location.href = "dashboard.html";
}
