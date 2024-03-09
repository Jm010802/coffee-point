<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to login page
    header("Location: login.html");
    exit();
}

// Database connection (same as in login.php)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_register";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data based on the username stored in session
$email = $_SESSION['email'];

$sql = "SELECT * FROM tbl_user WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, display user information
    $row = $result->fetch_assoc();
} else {
    // User not found, redirect back to login page
    header("Location: login.html");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Information</title>
<link rel="stylesheet" href="edit-info.css">
</head>
<body>

<div class="container">
  <div class="edit-info-container">
    <h2>Edit Information</h2>
    <form action="update-info.php" method="post" class="form">
      <label class="txtFname" for="fname">Full Name:</label><br>
      <input class="fname" type="fname" id="fname" name="fname" value="<?php echo $row['fname']; ?>" required><br>
      <label class="txtEmail" for="email">Email:</label><br>
      <input class="email" type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>
      <label class="txtPassword" for="password">Password:</label><br>
      <input class="password" type="password" id="password" name="password" value="<?php echo $row['password']; ?>" required><br>
      <input type="submit" value="Edit" class="update-btn">
    </form>
    <a href="home-user.html"><input type="submit" value="Go Back" class="back-btn"></a>
  </div>
</div>

</body>
</html>
