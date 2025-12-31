<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "time_tracker");

if ($conn->connect_error) {
    die(json_encode(["error" => "DB connection failed"]));
}
?>
