<?php

    if (isset($_POST['register'])) {                                        //statement checks if 'register' button is clicked
    
    require 'db-connection.php';                                            //copies code from db-connection file to this file

    /*gets user input and assigns to these variables.
    mysqli_real_escape_string() protects from sql injection*/
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

    //conditional statements checking user input
    if(empty($firstname) || empty($lastname)) {
        header("Location: ../index.php?error=emptyfields&mail=".$email."&firstname=".$firstname."&lastname=".$lastname);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z ]*$/", $firstname) || !preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        header("Location: ../index.php?error=invalid&firstname=".$firstname."&lastname=".$lastname);
        exit();
    }
    else {
        //get all data from the email column in the database table
        $sql = "SELECT user_email FROM end_users WHERE user_email=?";
        $stmt = mysqli_stmt_init($conn);

        //output an error if SQL command can't be executed
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);             //returns number of rows where e-mail appears
            if ($resultCheck > 0) {                                 //if num of rows exceeds 0,email already exists    
                header("Location: ../index.php?error=mailtaken");   //outputs an error and exits
                exit();
            }
            else {
                //connect to database
                $sql = "INSERT INTO end_users (user_email, user_firstname, user_lastname, user_password) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);         //password is encrypted before it is saved on the database

                    mysqli_stmt_bind_param($stmt, "ssss", $email, $firstname, $lastname, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    echo "Successfully registered";
                    header("Location: ../index.php?register=success");          //takes user back to home page if registered successfull.
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);                                                   //closes prepared statement
    mysqli_close($conn);                                                        //closes database connection
}
else {
    header("Location: ../index.php");                                           //takes user to home page if register button is not clicked
    exit();
}