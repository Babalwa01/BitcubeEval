<?php
    if (isset($_POST['login'])) {
        require 'db-connection.php';

        $mail = $_POST['useremail'];
        $password = $_POST['userpwd'];
        // $remembr = $_POST['remember'];

        if (empty($mail) || empty($password)) {
            header("Location: ../loginpage.php?error=emptyfileds");    //Generates an empty fields error and takes user back to login page if fields are not filled in
            exit();
        }
        else {
            $sql = "SELECT * FROM end_users WHERE user_email=?;";       //prepared
            $stmt = mysqli_stmt_init($conn);                            //statements      

            if(!mysqli_stmt_prepare($stmt, $sql)) {         
                header("Location: ../loginpage.php?error=sqlerror");  //Generates an SQL error and reloads login page if database connection was not successful
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $mail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($password, $row['user_password']);     /*returns a boolean results. password_verify() hashes the entered password and checks 
                                                                                        if it matches with the hashed password in the database and assigns the result to $pwdCheck.*/
                    if ($pwdCheck == false) {
                        header("Location: ../loginpage.php?error=wrongpassword");     //Generates a wrong password error takes user back to login page if hashed password does not match the on in the database
                        exit();
                    }
                    else if ($pwdCheck == true) {
                        session_start();

                        $remembr = $_POST['remember'];

                        if(isset($remembr)) {
                            setcookie('useremail', $mail);
                            setcookie('userpwd', password_hash($password, PASSWORD_DEFAULT));
                        }

                        $_SESSION['userId'] = $row['id'];
                        $_SESSION['userEmail'] = $row['user_email'];



                        header("Location: ../myprofile.php?login=success");     //takes user to the profile page if logged in successfully
                        exit();
                    }
                    else {
                        header("Location: ../loginpage.php?error=wrongpassword");    //Generates wrong password error and reloads login page if password entered does not match the on in the database
                        exit();
                    }
                }
                else {
                    header("Location: ../loginpage.php?error=nouser");       //reloads login page if user does not exist, with a message
                    exit();
                }
            }
        }
    }
    else {
        header("Location: ../loginpage.php");      //reloads login page if login button is not clicked
        exit();
    }
