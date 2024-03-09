<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_register";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching values from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Query to fetch user from database
$sql = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, set session and redirect to dashboard or another page
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;

    header("Location: home-user.html"); // Redirect to dashboard page
} else {
    echo '<script>';
    echo 'alert("Email or Password is wrong.");';
    echo 'window.location.href = "login.html";'; // Redirect back to login page
    echo '</script>';
}

$conn->close();
?>