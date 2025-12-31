<?php
require "../db.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || empty($data['name'])) {
    echo json_encode(["error" => "Project name required"]);
    exit;
}

$name = trim($data['name']);

$stmt = $conn->prepare("INSERT INTO projects (name) VALUES (?)");
$stmt->bind_param("s", $name);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => "Insert failed"]);
}
