<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "ai_classroom_db");

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

$sql = [
    "students" => "SELECT COUNT(*) AS count FROM students",
    "teachers" => "SELECT COUNT(*) AS count FROM teachers",
    "courses" => "SELECT COUNT(*) AS count FROM courses",
    "ai_requests" => "SELECT COUNT(*) AS count FROM ai_requests"
];

$data = [];
foreach ($sql as $key => $query) {
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $data[$key] = $row["count"];
}

echo json_encode($data);
$conn->close();
?>
