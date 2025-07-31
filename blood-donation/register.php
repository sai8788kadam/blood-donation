<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood-donationlist";

// Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Getting Data
$name = $_POST['name'];
$age = $_POST['age'];
$blood_group = $_POST['blood_group'];
$contact = $_POST['contact'];
$city = $_POST['city'];

$sql = "INSERT INTO donor (name, age, blood_group, contact, city) VALUES ('$name', '$age', '$blood_group', '$contact', '$city')";

if ($conn->query($sql) === TRUE) {
    // Redirect with success message
    header("Location: index.html?status=success");
} else {
    // Redirect with error message
    header("Location: index.html?status=error");
}

$conn->close();
?>
