<?php
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $age = $_POST["age"];
    $birthday = $_POST["birthday"];
    $school = $_POST["school"];
    $address = $_POST["address"];
    $about = $_POST["about"];

    // Prepare SQL statement
    $sql = "INSERT INTO CommuniKitUsers (name, age, birthday, school, address, about_message) VALUES ('$name', $age, '$birthday', '$school', '$address', '$about')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        // Redirect back to profile.html after successful form submission
        header("Location: profile.html");
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
$conn->close();
?>
