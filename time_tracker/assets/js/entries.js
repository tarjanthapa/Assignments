function loadEntries() {
  fetch("api/timer/entries.php")
    .then(res => res.json())
    .then(data => {
      let html = "";
      data.forEach(e => {
        html += `
          <div>
            <b>${e.name}</b><br>
            ${e.start_time} → ${e.end_time}<br>
            Duration: ${formatTime(e.duration_seconds)}
          </div><hr>
        `;
      });
      document.getElementById("entries").innerHTML = html;
    });
}

loadEntries();
