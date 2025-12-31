<?php
require "../db.php";

$data = json_decode(file_get_contents("php://input"), true);
$project_id = $data['project_id'];

// check running timer
$check = $conn->query("SELECT * FROM time_entries WHERE end_time IS NULL");
if ($check->num_rows > 0) {
  echo json_encode(["error" => "Timer already running"]);
  exit;
}

$stmt = $conn->prepare("
INSERT INTO time_entries(project_id, start_time)
VALUES (?, NOW())
");
$stmt->bind_param("i", $project_id);
$stmt->execute();

echo json_encode(["success" => true]);
