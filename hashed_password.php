<?php
// generate_hash.php
$plain_password = 'password123';
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

echo "Plain Password: " . $plain_password . "<br>";
echo "Hashed Password: " . $hashed_password . "<br>";
echo "Copy the Hashed Password above and update your database 'password' field.";
?>