<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "user_management_db"; // changed db name
 
// Connect to MySQL
$conn = mysqli_connect($host, $user, $password);
 
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if ($conn->query($sql) !== TRUE) {
    die("Error creating database: " . $conn->error);
}
 
// Select the database
mysqli_select_db($conn, $dbName);
 
 
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
)";
 
if ($conn->query($userTable) !== TRUE) {
    die("Error creating user table: " . $conn->error);
}
 
echo "Database, tables, created successfully!";
?>