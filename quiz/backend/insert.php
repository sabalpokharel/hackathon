<?php 
	$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "quiz_oops");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$question = "";

$question = $_POST['question'];

$sql = "INSERT INTO `askedquestion`(`id`, `title`, `answer`) VALUES (null,'$question','')";
mysqli_query($conn, $sql);


header('Location: ../home.php');
 ?>	