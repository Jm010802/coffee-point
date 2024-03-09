<?php
// database connection code
if(isset($_POST['fname']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','db_register');

// get the post records

$txtFname = $_POST['fname'];
$txtEmail = $_POST['email'];
$txtPassword = $_POST['password'];

// Check if email already exists in the database
$sql_check_email = "SELECT * FROM `tbl_user` WHERE email='$txtEmail'";
$result_check_email = $con->query($sql_check_email);

if ($result_check_email->num_rows > 0) {
    // Email already exists, redirect back to registration page with error message
    echo '<script>';
    echo 'alert("Email is already used.");';
    echo 'window.location.href = "registration.html";'; // Redirect back to login page
    echo '</script>';
    exit(); // Terminate script execution after redirection
}

// database insert SQL code
$sql = "INSERT INTO `tbl_user` (`id`, `fname`, `email`, `password`) VALUES ('0', '$txtFname', '$txtEmail', '$txtPassword')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Registration successful!";
    // Redirecting to login form
    header("Location: loading.html");
    exit();
}
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>