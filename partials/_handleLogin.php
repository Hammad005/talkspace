<?php
            include '_dbconnection.php';
            $showError = false;
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $username = $_POST['username'];
                $password = $_POST['password'];
                //Check the account is exist or not
                $exist="SELECT * FROM `users` WHERE `username` = '$username'";
                $result = mysqli_query($conn, $exist);
                $num = mysqli_num_rows($result);
                if($num == 1){
                    $row = mysqli_fetch_assoc($result);
                    if(PASSWORD_VERIFY($password, $row['password'])){
                        session_name('TalkSpace_user_session');
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $username;
                        header("Location:/TalkSpace/index.php");
                        exit();
                    }
                    else{
                        header("Location:/TalkSpace/index.php?loginError=". $showError = true);
                    }
                }
            }
            ?>