<?php
session_start();
if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!== true){
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Dashboard- Email Validator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            margin: 50px auto;
        }
        h2 {
            color: #333;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        .form-group input[type="submit"]:hover {
            background-color: #218838;
        }
        .validation-result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 4px;
            font-weight: bold;
        }
        .valid {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .invalid {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2> Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
        <p>This is your dashboard. You can validate email addresses here.</p>
        <h3> Email Validation</h3>
        <form action="validate_email.php" method="post">
            <div class="form-group">
                <label for="email">Enter Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Validate email">
            </div>
        </form>

        <?php
        if(isset($_GET['result'])){
            $result=$_GET['result'];
            $email=isset($_GET['email']) ? htmlspecialchars($_GET['email']): '';
            if($result==='valid'){
                echo '<p class="validate-result valid">' . $email . 'is a VALID email address.</p>';
            }elseif ($result === 'valid'){
                echo '<p class="validation-result invalid">' .$email . 'is not a VALID email address.</p>';
            }
        }
        ?>
        <p><a href="logout.php" class="logout-btn">Logout</a></p>
    </div>
</body>
</html>
