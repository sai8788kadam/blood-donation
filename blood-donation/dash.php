<?php
session_start();
if (!isset($_SESSION['donor'])) {
    header("Location: loginpage.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['donor']; ?>!</h2>
    <p>You are successfully logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
