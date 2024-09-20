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
    <?php include 'partials/_dbconnection.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <section id="hero">
        <div class="container d-flex justify-content-center my-5 mb-0">
            <img src="asset/logo/logo.png" alt="" height="50px">
            <h5 class="category_heading"><b>Threads!</b></h5>
        </div>
        <?php
        if(isset($_GET['thread_id'])){
            $id = $_GET['thread_id'];
        }
            $sql="SELECT * FROM `threads` WHERE `thread_id` = '$id'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $username = $row['thread_username'];
                $topic = $row['thread_topic'];
                $question = $row['thread_question'];
                $time = $row['thread_time'];
            }
        ?>
        <div class="container ">
        <?php
            $showAlert=false;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $comment_username = $_SESSION['username'];

                $comment_content = $_POST['comment_content'];
                //Replace < to &lt; for error handling in database
                $comment_content = str_replace("<","&lt;",$comment_content);
                //Replace > to &gt; for error handling in database
                $comment_content = str_replace(">","&gt;",$comment_content);
                //Replace ' to &apos; for error handling in database
                $comment_content = str_replace("'","&apos;",$comment_content);
                

                $sql="INSERT INTO `comments` (`comment_username`, `thread_id`, `comment_content`, `comment_time`) 
                VALUES ('$comment_username', '$id', '$comment_content', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                $showAlert=true;
                if($showAlert){
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <b>Submitted! </b> Your comment has been submitted successfully.
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                    </div>
                    ';
                }
                else{
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <b>Error! </b> Something wrong please try again later.
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                    </div>
                    ';
                }
            }
            ?>
            <div class="jumbotron mt-4 p-5 rounded">
                <i class="fa-regular fa-circle-user" style=" font-size: 20px; "></i>
                <strong><?php echo $username; ?></strong>
                <h3 class="mb-3"><b>Topic: </b><?php echo $topic; ?></h3>
                <p><b>Question: </b><?php echo $question; ?></p>
                <small style="margin-top: -10px; float: right;">
                    <i class="fa-solid fa-calendar-days" style=" font-size: 12px; "></i>
                    <?php echo $time; ?>
                </small>
                <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo'
            <!-- Button to Trigger Toast -->
                <div class="rule_button">
                    <hr>
                    <button type="button" class="btn btn-outline-success" id="showToastButton">
                        Rules
                        <i class="fa-solid fa-ban" style="font-size: 15px;"></i>
                    </button>
                </div>

                <!-- Toast Container -->
                <div class="toast-head">
                    <div class="toast d-none" id="myToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                        <div class="toast-header">
                            <img src="asset/logo/favicon.png" class="rounded me-2" alt="..." height="20px">
                            <strong class="toast-heading me-auto">TalkSpace Rules</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Never post personal information about another forum participant.
                            Don’t post anything that threatens or harms the reputation of any person or organization.
                            Don’t post anything that could be considered intolerant of a person’s race, culture, appearance, gender, sexual preference, religion, or age.
                        </div>
                    </div>
                </div>    
            ';
        }
                ?>

            </div>
        </div>
        

        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo'
            <div class="ask_question container">
            <h1 class="mt-5">Write a comment:</h1>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <form action="'. $_SERVER['REQUEST_URI']. '" method="post">
                        <div class="form-group mt-2">
                            <label class="form-label"><b>Comment:</b></label>
                            <textarea class="form-control" placeholder="Write your Comment" id="exampleFormControlTextarea1"
                                name="comment_content" rows="11" Required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <img src="asset/img/thread-bg.jpg" alt="Image" class="img-fluid ">
                </div>
            </div>
        </div>
            ';
        }
        else{
            echo '
            <div class="ask_question container">
            <h1 class="mt-5">Write a comment:</h1>
            <hr>
            <div class="media-body my-5">
                <h6>You must login first to write a comment.</h6>
            </div>
            </div>
            ';
        }
        ?>
        <div class="questions container">
            <h1 class="mt-5">General Discussions:</h1>
            <hr>
            <?php
             if(isset($_GET['thread_id'])){
                $id = $_GET['thread_id'];
                $sql="SELECT * FROM `comments` WHERE `thread_id` = '$id' ORDER BY `comment_id` DESC";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $username = $row['comment_username'];
                    $comment_time = $row['comment_time'];
                    $comment = $row['comment_content'];
                    echo'
                    <div class="media py-3">
                        <div class="media-body mb-2">
                            <i class="fa-regular fa-circle-user" style=" font-size: 20px; "></i>
                            <strong>Reply by: '.$username.'</strong>
                            <div class="comment_time" style="margin-top: 10px; float: right;">
                                <i class="fa-solid fa-calendar-days" style=" font-size: 12px; "></i> '
                                .$comment_time .
                            '</div>
                            <p>'.$comment.'</p>
                        </div>
                    </div>
                    ';
                }
                }
                    else{
                        echo '
                        <div class="media-body my-5">
                        <h6>No one responded to this thread question.</h6>
                        </div>
                        ';
                    }
            }
                ?>

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