<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sign-in and sign-up</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div id="container" class="container">
    <!-- FORM SECTION -->
    <div class="row">
<!-- SIGN UP -->
<div class="col align-items-center flex-col sign-up">
    <div class="form-wrapper align-items-center">
        <div class="form sign-up">
            <form action="process_form.php" method="post" id="signUpForm">
            <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="text" placeholder="Username" id="username" name="username">
            </div>
            <div class="input-group">
                <i class='bx bx-mail-send'></i>
                <input type="email" placeholder="Email" id="email" name="email">
            </div>
            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" placeholder="Password" id="password" name="password">
            </div>
            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" placeholder="Confirm password" id="cpassword" name="cpassword">
            </div>
            <button type="submit" name="sign_up" onclick="submitForm()">Sign up</button>
            <?php if ($message !== '') { ?>
                <p><?php echo $message; ?></p>
            <?php } ?>
</form>
            <p>
                <span>
                    Already have an account?
                </span>
                <b onclick="toggle()" class="pointer">
                    Sign in here
                </b>
            </p>
<div id="error-message" class="error-message"></div>

        </div>
    </div>
</div>
<!-- END SIGN UP -->

        <!-- SIGN IN -->
        <div class="col align-items-center flex-col sign-in">
            <div class="form-wrapper align-items-center">
                <div class="form sign-in">
                    <div class="input-group">
                        <i class='bx bxs-user'></i>
                        <input type="text" placeholder="Username">
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" placeholder="Password">
                    </div>
                    <button>
                        Sign in
                    </button>
                    <p>
                        <span>
                            Don't have an account?
                        </span>
                        <b onclick="toggle()" class="pointer">
                            Sign up here
                        </b>
                    </p>
                </div>
            </div>
            <div class="form-wrapper">

            </div>
        </div>
        <!-- END SIGN IN -->
    </div>
    <!-- END FORM SECTION -->
    <!-- CONTENT SECTION -->
    <div class="row content-row">
        <!-- SIGN IN CONTENT -->
        <div class="col align-items-center flex-col">
            <div class="text sign-in">
                <h2>
                    Welcome Back
                </h2>
            </div>
            <div class="img sign-in">

            </div>
        </div>
        <!-- END SIGN IN CONTENT -->
        <!-- SIGN UP CONTENT -->
        <div class="col align-items-center flex-col">
            <div class="img sign-up">

            </div>
            <div class="text sign-up">
                <h2>
                    Join with us
                </h2>
            </div>
        </div>
        <!-- END SIGN UP CONTENT -->
    </div>
    <!-- END CONTENT SECTION -->
</div>
<!-- partial -->
<script  src="./script.js"></script>
</body>
</html>
