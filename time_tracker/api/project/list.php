<?php
require "../db.php";

$result = $conn->query("
  SELECT p.id, p.name,
  COALESCE(SUM(t.duration_seconds),0) AS total_seconds
  FROM projects p
  LEFT JOIN time_entries t ON p.id = t.project_id
  GROUP BY p.id
");

$projects = [];

while ($row = $result->fetch_assoc()) {
  $projects[] = $row;
}

header('Content-Type: application/json');
echo json_encode($projects);
