<?php
    // Check if the form is submitted
    if(isset($_POST['login'])) {
        // Get the input values
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Connect to the database
        $con = mysqli_connect("localhost","root","","user_table");

        // Construct the SQL query to check if the entered username and password match with the data stored in the database
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);

        // Check if there is a row with the entered username and password
        if(mysqli_num_rows($result) > 0) {
            header('Location: main.html');
            exit();
        } else {
            $message = 'Invalid Username or Password.';
        }
    }
?>

<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <img src="flappy.jpg" width="100%" height="100%">
    <form method="post" action="">
        <h2>Login to Play Flappy Bird</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit" name="login" value="Login">Login</button>

        <?php if(isset($message)) { ?>
            <p class="error-message"><?php echo $message; ?></p>
        <?php } ?>
    </form>
</body>
</html>
