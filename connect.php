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