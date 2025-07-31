<?php
include 'connect2.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM donors WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['donor'] = $user['name'];
            header("Location: dash.php");
        } else {
            echo "<script>alert('Invalid Password'); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('Email not registered'); window.location.href='index.html';</script>";
    }
}
?>
