<?php
// login.php

session_start(); // Start the session for user authentication

// Include database configuration
require_once 'db_config.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Prepare a select statement
    $sql = "SELECT id, username, password FROM users WHERE username = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("s", $param_username);
        $param_username = $username;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Store result
            $stmt->store_result();

            // Check if username exists, if yes then verify password
            if ($stmt->num_rows == 1) {
                // Bind result variables
                $stmt->bind_result($id, $username, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {
                        // Password is correct, start a new session
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;

                        // Redirect user to dashboard page
                        header("location: dashboard.php");
                    } else {
                        // Password is not valid
                        header("location: index.html?error=" . urlencode("Invalid username or password."));
                    }
                }
            } else {
                // Username doesn't exist
                header("location: index.html?error=" . urlencode("Invalid username or password."));
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$mysqli->close();
?>