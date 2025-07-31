<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campregister";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get POST values
$organizer = $_POST['organizer_name'];
$camp = $_POST['camp_name'];
$location = $_POST['location'];
$date = $_POST['camp_date'];
$contact = $_POST['contact'];

// Prepare and insert into database
$sql = "INSERT INTO camps (organizer_name, camp_name, location, camp_date, contact)
        VALUES ('$organizer', '$camp', '$location', '$date', '$contact')";

if ($conn->query($sql) === TRUE) {
  echo "<h2>Camp Registered Successfully!</h2>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>