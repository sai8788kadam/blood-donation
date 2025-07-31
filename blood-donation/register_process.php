<?php
include 'connect2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST["username"];
$email = $_POST["email"];      // ✅ ध्यान से देखो: यह email से लिया गया हो
$password = $_POST["password"];


    $sql = "INSERT INTO donors (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql)) {
        echo "<script>alert('Registration Successful'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Email already exists'); window.location.href='index.html';</script>";
    }
}
?>
