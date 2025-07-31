<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emergencydata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$blood_group = $_POST['blood_group'];
$location = $_POST['location'];
$message = $_POST['message'];

$sql = "INSERT INTO emergency_requests (name, phone, blood_group, location, message)
        VALUES ('$name', '$phone', '$blood_group', '$location', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "<h2 style='text-align:center; color:green;'>✅ Emergency request submitted successfully!</h2>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
