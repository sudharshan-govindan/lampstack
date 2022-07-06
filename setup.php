<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// Creating a connection
$conn = new mysqli(getenv('HOSTNAME'),getenv('ROOT_USERNAME'),getenv('ROOT_PASSWORD'));

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating a database named newDB
$db=getenv('DB_NAME');
$sql="CREATE DATABASE $db";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$link = mysqli_connect(getenv('HOSTNAME'),getenv('ROOT_USERNAME'),getenv('ROOT_PASSWORD'),getenv('DB_NAME'));
 
// Check connection
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$table="CREATE TABLE IF NOT EXISTS `records` (`id` MEDIUMINT NOT NULL AUTO_INCREMENT, `message` VARCHAR(255), PRIMARY KEY (`id`));";

$res=mysqli_query($link,$table);

echo '<script><h1 style="text-align:center">Created database and table into mysql server successfully</h1></script>';
