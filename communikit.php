<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "communikit";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Sample query to test the connection
$sql = "SELECT * FROM voicelines";
$result = $conn->query($sql);

$voicelines = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $voicelines[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $voicelines]);
} else {
    echo json_encode(["status" => "success", "data" => []]);
}

// Close the connection
$conn->close();
?>
