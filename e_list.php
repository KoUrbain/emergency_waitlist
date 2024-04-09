<?php
// Database connection parameters
$host = "localhost";
$port = "5432"; // Default PostgreSQL port
$dbname = "queue";
$user = "urbain";
$password = "4116";

// Create connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// SQL query to create a table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    description TEXT,
    password VARCHAR(3) NOT NULL,
    wait_time INT,
    number_areas INT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Retrieve form data
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$description = $_POST['description'];
$password = $_POST['password'];
//$wait_time = $_POST['wait_time'];
//$number_areas = $_POST['number_areas'];

$sql = "INSERT INTO users (firstname, lastname, description, password, wait_time, number_areas) 
        VALUES ('$firstname', '$lastname', '$description', '$password', '$wait_time', '$number_areas')";


// Execute SQL query
if (pg_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . pg_last_error($conn);
}

// Close connection
pg_close($conn);
?>
