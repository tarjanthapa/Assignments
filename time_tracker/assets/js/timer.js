let interval = null;

function startTimer(projectId) {
  fetch("api/timer/start.php", {
    method: "POST",
    headers: {"Content-Type": "application/json"},
    body: JSON.stringify({ project_id: projectId })
  })
  .then(res => res.json())
  .then(data => {
    if (data.error) alert(data.error);
  });
}

function stopTimer() {
  fetch("api/timer/stop.php", { method: "POST" })
    .then(res => res.json())
    .then(() => {
      loadProjects();
      loadEntries();
    });
}
