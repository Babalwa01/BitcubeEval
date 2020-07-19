<?php
    if(isset($_COOKIE['e-mail']) and isset($_COOKIE['password-text'])) {
        $email = $_COOKIE['e-mail'];
        $pass = $_COOKIE['password-text'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=0"/>
    <link rel="icon" href="images/Bitcube_logo.png" type="image">
    <link rel="stylesheet" href="css/styling.css">
    <title>Bitcube | Login</title>
</head>
<body>
<main class="content">
        <form class="form-class" action="includes/login.php" method="POST">
            <h2>Please login:</h2>

            <?php
                //full server URL declaration
                $myUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                //conditional statements checking if there are any strings
                if(strpos($myUrl, "error=wrongpassword") == true) {
                    echo "<p class='error-message'>Wrong password. Please try again</p>";
                }
                elseif(strpos($myUrl, "error=nouser") == true){
                    echo "<p>This user does not exist. Please sign up below.</p>";
                }
            ?>

            <!-- Input text fields -->
            <input id="e-mail" class="form-control" type="email" name="useremail" placeholder="email address" autofocus/>
                <section class="invalid">
                    Invalid email address.
                </section>    
            <input id="password-text" 
                class="form-control" 
                type="password"
                name="userpwd" 
                placeholder="password"/>
            <br><br>
            <section class="remember-text" style = "margin-left: -8rem;">
                <input type="checkbox" name="remember">  
                <label for="remember">Remember me</label>
            </section>
            <br>
            <input id="submit-button" type="submit" name="login" value="Login"> 
            <a style="color: blue; margin-left: 1rem;" href="index.php">Sign up</a>
        </form>   
    </main>
</body>
</html>