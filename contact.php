<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">PARUL UNIVERSITY</div>
                    <div class="text-two">Post Limda, Waghodia, Gujarat</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+0098 9893 5647</div>
                    <div class="text-two">+0096 3434 5678</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">Jishnubijukumar2003@gmail.com</div>
                    <div class="text-two">info.Jishnubijukumar2003@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="input-box">
                        <input type="text" name="uname" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box message-box">
                        <textarea name="message" placeholder="Enter your message" required></textarea>
                    </div>
                    <div class="button">
                        <input type="submit" name="send" value="Send Now">
                    </div>
                </form>
                <?php
                    if(isset($_POST['send'])) {
                        $uname = $_POST['uname'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];
                        $con = mysqli_connect("localhost", "root", "", "project");
                        $datetime = date("Y-m-d H:i:s");
                        $sql = "insert into contact(name, email,  message, dt) VALUES ('$uname', '$email', '$message', '$datetime')";
                        $ex = $con->query($sql);
                        if($ex) {
                            echo "<p class='success'>Message sent successfully!</p>";
                        } else {
                            echo "<p class='error'>There was an error sending your message. Please try again later.</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
