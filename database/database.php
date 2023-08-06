<?php
$severname ="localhost";
$username = "root";
$password = "";
$DBname = "sms";

// Create connection
$conn = new mysqli($servername, $username, $password, $DBname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>