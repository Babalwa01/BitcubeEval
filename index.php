<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=0"/>
    <link rel="icon" href="images/Bitcube_logo.png" type="image">
    <link rel="stylesheet" href="css/styling.css">
    <title>Bitcube | Registration Form</title>
</head>
<body>
    <main class="content">
        <form class="form-class" action="includes/register.php" method="POST">
            <h2>Please register below to use the website:</h2>

            <?php

                //full server URL declaration
                $myUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                //conditional statements checking if there are any strings
                if(strpos($myUrl, "error=invalid") == true) {
                    echo "<p class='error-message'>Invalid first name or last name! <br> Must contain uppercase and lowercase alphabets.</p>";
                }
                elseif(strpos($myUrl, "error=mailtaken") == true){
                    echo "<p>User with this e-mail address already exists!</p>";
                }
                elseif(strpos($myUrl, "register=success") == true){
                    echo "<p>Successfully registered!</p>";
                }    
            ?>
            <!-- Input text fields -->
            <input id="email-text" class="form-control" type="email" name="email" placeholder="email address" autofocus/>
                <section class="invalid">
                    Invalid email address.
                </section>    
            <input id="first-name-text" class="form-control" type="text" name="firstname" placeholder="first name" required />
            <br>
            <input id="last-name-text" class="form-control" type="text" name="lastname" placeholder="last name" required />
            <br>
            <input id="password-text" 
                class="form-control" 
                type="password"
                name="pwd" 
                placeholder="password"  
                pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%&])(?=.*\d).{6,}"
                title="Password must have atleast 1 uppercase, 1 lowercase and 1 special character, 
                1 number and must be atleast 6 characters long." />
                <section class="invalid">
                    Password must have atleast 1 uppercase, 1 lowercase and 1 special character, 
                    1 number and must be atleast 6 characters long.
                </section>
            <input id="submit-button" type="submit" name="register" value="Register">
        </form>
    </main>
</body>
</html>
