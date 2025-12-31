<?php
require "../db.php";

$result = $conn->query("
SELECT p.name, t.start_time, t.end_time, t.duration_seconds
FROM time_entries t
JOIN projects p ON p.id = t.project_id
ORDER BY t.id DESC
");

$data = [];
while ($r = $result->fetch_assoc()) {
  $data[] = $r;
}

echo json_encode($data);
