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
        <?php
        if(isset($_GET['catid'])){
            $id = $_GET['catid'];
        }
            $sql="SELECT * FROM `categories` WHERE `category_id` = '$id'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $cat_topic = $row['category_name'];
                $cat_desc = $row['category_description'];
            }
        ?>
        <div class="container d-flex justify-content-center my-5 mb-0">
            <img src="asset/logo/logo.png" alt="" height="50px">
            <h5 class="category_heading"><b>Threadslist!</b></h5>
        </div>
        <div class="container ">
            <?php
            $showAlert=false;
            $catname = $_GET['catname'];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $thread_username = $_SESSION['username'];

                $thread_topic = $_POST['thread_topic'];
                //Replace < to &lt; for error handling in database
                $thread_topic = str_replace("<","&lt;",$thread_topic);
                //Replace > to &gt; for error handling in database
                $thread_topic = str_replace(">","&gt;",$thread_topic);
                //Replace ' to &apos; for error handling in database
                $thread_topic = str_replace("'","&apos;",$thread_topic);
                

                $thread_question = $_POST['thread_question'];
                //Replace < to &lt; for error handling in database
                $thread_question = str_replace("<","&lt;",$thread_question);
                //Replace > to &gt; for error handling in database
                $thread_question = str_replace(">","&gt;",$thread_question);
                //Replace ' to &apos; for error handling in database
                $thread_question = str_replace("'","&apos;",$thread_question);
                
                
                $sql="INSERT INTO `threads` (`thread_cat`, `thread_username`, `thread_topic`, `thread_question`, `thread_time`) 
                VALUES ('$catname', '$thread_username', '$thread_topic', '$thread_question', current_timestamp());";
                $result = mysqli_query($conn, $sql);
                $showAlert=true;
                if($showAlert){
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <b>Submitted! </b> Your question has been submitted successfully. Please wait for the community to respond.
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
            <div class="jumbotron mt-4 p-5   rounded">
                <h1><?php echo $cat_topic; ?></h1>
                <p><?php echo $cat_desc; ?></p>

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
            <h1 class="mt-5">Ask a question:</h1>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                        <div class="form-group mt-2">
                            <label class="form-label"><b>Topic:</b></label>
                            <input type="text" class="form-control" id="topic" name="thread_topic"
                                aria-describedby="emailHelp" placeholder="Enter question topic" Required>
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label"><b>Question:</b></label>
                            <textarea class="form-control" placeholder="Enter question" id="exampleFormControlTextarea1"
                                name="thread_question" rows="8" Required></textarea>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <img src="asset/img/threadlist-bg.jpg" alt="Image"class="img-fluid ">
                </div>
            </div>
        </div>
            ';
        }
        else{
            echo '
            <div class="ask_question container">
            <h1 class="mt-5">Ask a question:</h1>
            <hr>
            <div class="media-body my-5">
                <h6>You must login first to ask a question.</h6>
            </div>
            </div>
            ';
        }
        ?>
        <div class="questions container">
            <h1 class="mt-3">Browse Questions:</h1>
            <hr>
            <?php
            if(isset($_GET['catname'])){
                $catname = $_GET['catname'];
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 3;
                $offset = ($page - 1) * $limit;
                $sql = "SELECT * FROM `threads` WHERE `thread_cat` = '$catname' ORDER BY `thread_id` DESC LIMIT $offset, $limit";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['thread_id'];
                    $username = $row['thread_username'];
                    $topic = $row['thread_topic'];
                    $question = $row['thread_question'];
                    echo'
                    <div class="media py-3">
                        <div class="media-body mb-2">
                            <i class="fa-regular fa-circle-user" style=" font-size: 20px; "></i>
                            <strong>'.$username.'</strong>
                            <h6><b>Topic: </b>'.$topic.'</h6>
                            <p><b>Question: </b>'.$question.'</p>
                                <div class="view_btn">
                                <a href="thread.php?thread_id='.$id.'">
                                <small>
                                <i class="fa-regular fa-eye" style=" font-size: 12px; "></i>
                                View
                                </small>
                                </a>
                                </div>
                        </div>
                    </div>
                    ';
                }
                }
                    else{
                        echo '
                        <div class="media-body my-5">
                        <h6>No one asks questions in the '. $cat_topic .' thread.</h6>
                        </div>
                        ';
                    }
            }
            if($num > 0){
                $id = $_GET['catid'];
                $catname = $_GET['catname'];
                
                // Pagination Logic
                $sql = "SELECT * FROM `threads` WHERE `thread_cat` = '$catname'";
                $result = mysqli_query($conn, $sql);
                $total = mysqli_num_rows($result);
                $pages = ceil($total / $limit);

                if ($pages > 1) {
                    echo '<nav aria-label="Page navigation example">
                            <ul class="pagination">';
                    if ($page > 1) {
                        echo '<li class="page-item"><a class="page-link" href="threadlist.php?catid=' . $id . '&catname=' . $catname . '&page=' . ($page - 1) . '">Previous</a></li>';
                    }

                    for ($i = 1; $i <= $pages; $i++) {
                        $active = $i == $page ? 'active' : '';
                        echo '
                        <li class="page-item ' . $active . '">
                            <a class="page-link" href="threadlist.php?catid=' . $id . '&catname=' . $catname . '&page=' . $i . '">' . $i . '</a>
                        </li>';
                    }

                    if ($page < $pages) {
                        echo '<li class="page-item"><a class="page-link" href="threadlist.php?catid=' . $id . '&catname=' . $catname . '&page=' . ($page + 1) . '">Next</a></li>';
                    }

                    echo '  </ul>
                        </nav>';
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>