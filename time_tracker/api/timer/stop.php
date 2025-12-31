<?php
require "../db.php";

$q = $conn->query("SELECT * FROM time_entries WHERE end_time IS NULL LIMIT 1");

if ($q->num_rows == 0) {
  echo json_encode(["error" => "No active timer"]);
  exit;
}

$row = $q->fetch_assoc();
$end = date("Y-m-d H:i:s");

$duration = strtotime($end) - strtotime($row['start_time']);

$stmt = $conn->prepare("
UPDATE time_entries
SET end_time=?, duration_seconds=?
WHERE id=?
");

$stmt->bind_param("sii", $end, $duration, $row['id']);
$stmt->execute();

echo json_encode(["success" => true]);
