<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session to get username
session_start();
$email = $_SESSION['email'];

// Retrieve form data
$fullName = $_POST['fname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Update user data in the database
$sql = "UPDATE tbl_user SET fname='$fullName', email='$email', password='$password' WHERE email='$email'";
if ($conn->query($sql) === TRUE) {
    echo '<script>';
    echo 'alert("User data updated successfully.");';
    echo 'window.location.href = "edit-info.php";'; // Redirect back to login page
    echo '</script>';
} else {
    echo "Error updating user data: " . $conn->error;
}

// Close connection
$conn->close();
?>
