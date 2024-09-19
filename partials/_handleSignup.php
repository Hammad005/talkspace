<?php
            include '_dbconnection.php';
            $showUsernameAlert = false;
            $showPasswordAlert = false;
            $showAlert = false;
            $showError = false;
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                //Check the username is already exist
                $exist="SELECT * FROM `users` WHERE `username` = '$username'";
                $result = mysqli_query($conn, $exist);
                $num = mysqli_num_rows($result);
                if($num > 0){
                    header("Location:/TalkSpace/index.php?usernameAlert=". $showUsernameAlert = true);
                }
                else{
                    if($password == $cpassword){
                        //Insert the data into the database
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `users` (`username`, `email`, `password`, `joindate`)
                                VALUES 
                                ('$username', '$email', '$hash', current_timestamp())";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            header("Location:/TalkSpace/index.php?alert=". $showAlert = true);
                        }
                        else{
                            header("Location:/TalkSpace/index.php?error=". $showError = true);
                        }
                    }
                    else{
                        header("Location:/TalkSpace/index.php?passwordAlert=". $showPasswordAlert = true);
                    }
                }
            }
            ?>