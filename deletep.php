<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "passenger_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM payments WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: status.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
