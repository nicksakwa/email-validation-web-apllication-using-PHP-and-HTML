<?php
// db_config.php

define('DB_SERVER', 'localhost'); // Your database server (usually 'localhost')
define('DB_USERNAME', 'root');   // Your database username
define('DB_PASSWORD', '');       // Your database password (leave empty if no password)
define('DB_NAME', 'email_validator_db'); // The database name we created

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>