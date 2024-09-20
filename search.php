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
    <section id="search">
        <div class="container d-flex justify-content-center my-5 mb-0">
            <img src="asset/logo/logo.png" alt="" height="50px">
            <h5 class="category_heading"><b> Search Results!</b></h5>
        </div>
        <br>
        <div class="container">
        <?php 
        $noSearchFound = false;
        $search = $_GET['search']; 

        //Search Result From Categories
        $categories_sql="SELECT * FROM `categories` WHERE MATCH (`category_name`,`category_description`) AGAINST ('$search')";
        $categories_result = mysqli_query($conn, $categories_sql);
        $categories_num = mysqli_num_rows($categories_result);

        //Search Result From Thraeds
        $threads_sql="SELECT * FROM `threads` WHERE MATCH (`thread_cat`,`thread_username`,`thread_topic`,`thread_question`) AGAINST ('$search')";
        $threads_result = mysqli_query($conn, $threads_sql);
        $threads_num = mysqli_num_rows($threads_result);

        //Search Result From Thraeds Comments
        $comments_sql="SELECT * FROM `comments` WHERE MATCH (`comment_username`,`comment_content`) AGAINST ('$search')";
        $comments_result = mysqli_query($conn, $comments_sql);
        $comments_num = mysqli_num_rows($comments_result);

        //Check is thier any result found or not
        $num = $categories_num + $threads_num + $comments_num;
            if ($num == 0) {
                $noSearchFound = true;
            }

        if($noSearchFound){
            echo'
                     <h4><strong>
                             Your search "<em style="color:#3B9DF6;">' . $search . '</em>"did not match any documents.
                         </strong>
                     </h4>
                     <hr>
                     <div class="row">
                <div class="col-lg-8">
                <h5 style="color:#015079; font-weight: bold;" class="mb-3 mt-3">Suggestions:</h5>
                    <ul style="color: black;">
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</li>
                        <li>Check for typos or misspellings.</li>
                        <li>Ensure that you are using the correct search terms relevant to your topic.</li>
                        <li>Consider using synonyms or related terms.</li>
                        <li>Review the spelling and format of the search terms.</li>
                        <li>Expand your search by including more keywords or phrases.</li>
                        <li>Check if there are any filters or limitations that might be affecting your search results.</li>
                        <li>Refine your search by using specific phrases or quotes.</li>
                        <li>Use advanced search operators like AND, OR, and NOT to narrow down results.</li>
                        <li>Explore different search engines or databases for alternative results.</li>
                        <li>Try searching in a different language if applicable.</li>
                        <li>Limit your search to a specific date range or timeframe.</li>
                        <li>Search within a particular website or domain.</li>
                        <li>Use wildcard characters to account for variations in spelling.</li>
                        <li>Search for exact matches by enclosing your search terms in quotation marks.</li>
                        <li>Look for related topics or concepts that might lead to the desired information.</li>
                        <li>Consult online forums, communities, or discussion boards for expert advice.</li>
                    </ul>
                </div>

                <div class="col-lg-4 text-center">
                <img src="asset/img/search_img.png" alt="" height="500px"> 
                </div>
            </div>
                     ';
        }
        else{
            echo'
            <h4><strong>
                    Search Results of "<em style="color:#3B9DF6;">' . $search . '</em>"
                </strong>
            </h4>
            <hr>
            ';
        }
        ?>
            
            <p>
            <?php         
                   
                //Search Result From Categories
                $categories_sql="SELECT * FROM `categories` WHERE MATCH (`category_name`,`category_description`) AGAINST ('$search')";
                $categories_result = mysqli_query($conn, $categories_sql);
                $categories_num = mysqli_num_rows($categories_result);
                if($categories_num > 0){
                while($categories_row = mysqli_fetch_assoc($categories_result)){
                    $id = $categories_row['category_id'];
                    $cat_name = $categories_row['category_name'];
                    $cat_desc = $categories_row['category_description'];
                    echo'
                    <li><a href="threadlist.php?catid='. $id .'&catname='. $cat_name .'">
                    <b>Categories <small style="color:gray;"><i class="fa-solid fa-caret-right"></i></small> '
                     . $cat_name . ':</b><br> <p class="ps-4">' . $cat_desc . '</p></a></li>
                    <br>
                    ';
                }
            }

            //Search Result From Thraeds
            $threads_sql="SELECT * FROM `threads` WHERE MATCH (`thread_cat`,`thread_username`,`thread_topic`,`thread_question`) AGAINST ('$search')";
                $threads_result = mysqli_query($conn, $threads_sql);
                $threads_num = mysqli_num_rows($threads_result);
                if($threads_num > 0){
                while($threads_row = mysqli_fetch_assoc($threads_result)){
                    $id = $threads_row['thread_id'];
                    $cat = $threads_row['thread_cat'];
                    $username = $threads_row['thread_username'];
                    $topic = $threads_row['thread_topic'];
                    $question = $threads_row['thread_question'];
                    echo'
                    <li><a href="thread.php?thread_id='.$id.'"><b>Thread Question <small style="color:gray;"><i class="fa-solid fa-caret-right"></i></small> '
                     . $cat . ' <small style="color:gray;"><i class="fa-solid fa-caret-right"></i></small> ' . $username . ':</b> <br><strong><p class="ps-4">Topic: </strong>'
                     . $topic . '<br><strong>Question:</strong> ' . $question . '</p></a></li>
                    <br>
                    ';
                }
            }

            //Search Result From Thraeds Comments
            $comments_sql="SELECT * FROM `comments` WHERE MATCH (`comment_username`,`comment_content`) AGAINST ('$search')";
                $comments_result = mysqli_query($conn, $comments_sql);
                $comments_num = mysqli_num_rows($comments_result);
                if($comments_num > 0){
                while($comments_row = mysqli_fetch_assoc($comments_result)){
                    $id = $comments_row['thread_id'];
                    $username = $comments_row['comment_username'];
                    $comment = $comments_row['comment_content'];
                    echo'
                    <li><a href="thread.php?thread_id='.$id.'"><b>Thread Comment <small style="color:gray;"><i class="fa-solid fa-caret-right"></i></small> '
                     . $username . ':</b> <br><strong><p class="ps-4">Comment: </strong>'
                     . $comment . '</p></a></li>
                    <br>
                    ';
                }
            }

            $num = $categories_num + $threads_num + $comments_num;
            if ($num == 0) {
                $noSearchFound = true;
            }
            ?>
            </p>
            <br>
            
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