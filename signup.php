<?php
    $message = '';
    if(isset($_POST['signup'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $email = htmlspecialchars($_POST['email']);
        
        $con = mysqli_connect("localhost", "root", "", "user_table");
        
        // Use prepared statements to avoid SQL injection
        $check_username = $con->prepare("SELECT * FROM user WHERE username=?");
        $check_username->bind_param("s", $username);
        $check_username->execute();
        $check_result = $check_username->get_result();
        
        if($check_result->num_rows > 0) {
            $message = '<span style="color:red;">Username already exists. Please choose a different username.</span>';
        } else {
            $check_email = $con->prepare("SELECT * FROM user WHERE email=?");
            $check_email->bind_param("s", $email);
            $check_email->execute();
            $check_result = $check_email->get_result();
            
            if($check_result->num_rows > 0) {
                $message = '<span style="color:red;">Email already exists. Please use a different email.</span>';
            } elseif ($password !== $cpassword) {
                $message = '<span style="color:red;">Password and confirmed password do not match.</span>';
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $datetime = date("Y-m-d H:i:s");
                $sql = "INSERT INTO user(username, password, email, datetime) VALUES (?, ?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssss", $username, $hashed_password, $email, $datetime);
                $stmt->execute();
                $message = '<span style="color:green;">Signup Successful.</span>';
            }
        }
    }
?>


<html>
<head>
    <title>Signup Form</title>
    <link rel="stylesheet" type="text/css" href="signup1.css">
</head>
<body>
    <img src="flappy.jpg"  width="100%" height="100%">
    <h2>Signup Form</h2>
    <form method="post" action="">
        <h2>Sign Up to Play Flappy Bird</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="Email">Email:</label>
        <input type="text" id="Email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="cpassword" required><br>

        <button type="submit" name="signup">Sign Up</button><br>
        <button type="button" onclick="location.href='login.php'">Log In</button><br>
        <a href="login.php">Already have an account</a>

        <?php if ($message !== '') { ?>
            <p><?php echo $message; ?></p>
        <?php } ?>
    </form>
</body>
</html>
