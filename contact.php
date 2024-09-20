<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="asset/logo/favicon.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>TalkSpace</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnection.php'; ?>
    <section id="contact">
        <div class="container d-flex justify-content-center my-5 mb-0">
            <img src="asset/logo/logo.png" alt="" height="50px">
            <h5 class="category_heading"><b>Contact!</b></h5>
        </div>
        <div class="container" id="contact" data-aos="fade-up">
            <a href="https://maps.app.goo.gl/FAgUYuDpuJiwmyTCA">
                <img src="asset/img/map.jpg" alt="map" width="100%" height="300px">
            </a>
            <h2 style="color: #015079;" class="mt-3"><b>Contact:</b></h2>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];

                $message = $_POST['message'];
                //Replace < to &lt; for error handling in database
                $message = str_replace("<","&lt;",$message);
                //Replace > to &gt; for error handling in database
                $message = str_replace(">","&gt;",$message);
                
                //Send Message to Database
                $send = "INSERT INTO `contact` (`username`, `email`, `subject`, `message`, `message_time`) 
                        VALUES ('$username', '$email', '$subject', '$message', current_timestamp())";
                $send_query = mysqli_query($conn, $send);
                if ($send_query){
                    echo '
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <b>Send! </b> Your message has been sent.
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                    </div>
                    ';
                }
                else{
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <b>Error! </b> Something wrong please try again later.
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                    </div>
                    ';
                }
            }
            ?>
            <hr>
            <div class="row ">
                <div class="col-lg-4">
                    <div class="info">

                        <div class="address mt-lg-2">
                            <i class="fa fa-location"></i>
                            <h4>Location:</h4>
                            <p><a href="https://maps.app.goo.gl/FAgUYuDpuJiwmyTCA">
                                    TalkSpace, Clifton, Karachi City, Sindh
                                    Pakistan
                                </a></p>
                        </div>

                        <div class="email mt-lg-2">
                            <i class="fa fa-envelope"></i>
                            <h4>Email:</h4>
                            <p><a href="mailto:TalkSpace@gmail.com">
                                    TalkSpace@gmail.com
                                </a></p>
                        </div>

                        <div class="facebook mt-lg-2">
                            <i class="fa-brands fa-facebook-f"></i>
                            <h4>Facebook:</h4>
                            <p><a href="https://facebook.com/">
                                    TalkSpace
                                </a></p>
                        </div>

                        <div class="phone mt-lg-2">
                            <i class="fa fa-phone"></i>
                            <h4>Call:</h4>
                            <p><a href="tel:+923389554885">
                                    +92 3389 55488 5
                                </a></p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-3 mt-lg-0">
                    <form role="form" class="php-email-form" id="message" method="POST" action="contact.php #contact">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="username" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder=" Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="text-center mt-3 mb-3"><button id="submit" class="btn btn-outline-success">Send
                                Message</button></div>

                    </form>

                </div>

            </div>

        </div>
    </section>
    <?php include 'partials/_footer.php'; ?>
    <div id="preloader">
        <img src="asset/logo/logo.png" class="preloader-logo" alt="" height="50px">
        <div class="spinner"></div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/script.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>