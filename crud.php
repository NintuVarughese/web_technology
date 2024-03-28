<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'php_db';
// Connect to MySQL
$connection = mysqli_connect($host, $username, $password);
// Check connection
if (!$connection) {
 die("Connection failed: " . mysqli_connect_error());
}
// Create the database if it does not exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($connection, $sql)) {
 echo "Database created successfully or already exists<br>";
} else {
 echo "Error creating database: " . mysqli_error($connection) . "<br>";
}
// Select the database
mysqli_select_db($connection, $database);
// Create the users table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(255) NOT NULL,
 email VARCHAR(255) NOT NULL
)";
if (mysqli_query($connection, $sql)) {
 echo "Table created successfully or already exists<br>";
} else {
 echo "Error creating table: " . mysqli_error($connection) . "<br>";
}
// CRUD Operations
// Create operation
function createUser($name, $email) {
 global $connection;
 $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
 return mysqli_query($connection, $query);
}
// Read operation
function getUsers() {
 global $connection;
WEB TECHNOLOGY
Department of Computer Science, Rajagiri College of Social Science 74
 $query = "SELECT * FROM users";
 $result = mysqli_query($connection, $query);
 $users = [];
 while ($row = mysqli_fetch_assoc($result)) {
 $users[] = $row;
 }
 return $users;
}
// Update operation
function updateUser($id, $name, $email) {
 global $connection;
 $query = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
 return mysqli_query($connection, $query);
}
// Delete operation
function deleteUser($id) {
 global $connection;
 $query = "DELETE FROM users WHERE id=$id";
 return mysqli_query($connection, $query);
}
// Usage example:
// Create a new user
createUser("John Doe", "john@example.com");
// Get all users
$users = getUsers();
foreach ($users as $user) {
 echo "ID: " . $user['id'] . ", Name: " . $user['name'] . ", Email: " . $user['email'] . "<br>";
}
// Update a user
$updateSuccess = updateUser(1, "Jane Doe", "jane@example.com");
if ($updateSuccess) {
 echo "User updated successfully!<br>";
} else {
 echo "Failed to update user.<br>";
}
// Delete a user
$deleteSuccess = deleteUser(2);
if ($deleteSuccess) {
 echo "User deleted successfully!<br>";
} else {
 echo "Failed to delete user.<br>";
}
// Close connection
mysqli_close($connection);?>