<?php
// Step 1: Password protection
$valid_username = "Sainath";
$valid_password = "Sainath2005"; // Change this

if (!isset($_SERVER['PHP_AUTH_USER']) || 
    $_SERVER['PHP_AUTH_USER'] !== $valid_username || 
    $_SERVER['PHP_AUTH_PW'] !== $valid_password) {
    
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo '🚫 Unauthorized Access';
    exit;
}

// Step 2: Your existing code starts here
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood-donationlist";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch donors
$sql = "SELECT * FROM donor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registered Donors</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff3f3;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #c2185b;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #f8bbd0;
    }

    tr:nth-child(even) {
      background-color: #fdeef4;
    }

    a.back {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      background-color: #c2185b;
      color: white;
      padding: 8px 16px;
      border-radius: 4px;
    }
  </style>
</head>
<body>

<h2>🩸 List of Registered Donors</h2>

<?php
if ($result->num_rows > 0) {
  echo "<table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Blood Group</th>
            <th>Contact</th>
            <th>City</th>
          </tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["age"]."</td>
            <td>".$row["blood_group"]."</td>
            <td>".$row["contact"]."</td>
            <td>".$row["city"]."</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "<p>No donors found.</p>";
}

$conn->close();
?>

<div style="text-align: center;">
  <a class="back" href="index.html">⬅ Back to Home</a>
</div>

</body>
</html>
