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
            <h5 class="category_heading"><b>Categories!</b></h5>
        </div>
        <div class="container ">
            <?php
            if(isset($_GET['usernameAlert']) > 0){
                echo'
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <b>Error! </b> Username is unavailable!
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                </div>
                ';
            }
            if(isset($_GET['alert']) > 0){
                echo'
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <b>Success! </b> Account has been created.
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                </div>
                ';
            }
            if(isset($_GET['error']) > 0){
                echo'
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <b>Error! </b> Something wrong please try again later.
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                </div>
                ';
            }
            if(isset($_GET['loginError']) > 0){
                echo'
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <b>Login Failed! </b> Something wrong please try again later.
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                </div>
                ';
            }
            if(isset($_GET['passwordAlert']) > 0){
                echo'
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <b>Error! </b> Password do not match!.
                        <div type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>
                </div>
                ';
            }
            ?>
            <div class="row d-flex justify-content-center text-center mb-3">
                <?php
          $sql="SELECT * FROM `categories` ORDER BY `category_id` DESC";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){
          $id = $row['category_id'];
          $cat_name = $row['category_name'];
          $cat_desc = $row['category_description'];

          echo'
          <div class="box d-flex justify-content-center my-4 col-lg-3 col-md-4 col-sm-6 col-12 ">
            <div class="card" style="width: 18rem;">
                <img src="asset/img/card-'. $id .'.jpg" class="card-img-top"  alt="...">
                  <div class="card-body">
                      <h5 class="card-title">' . $cat_name . '</h5>
                        <p class="card-text">' . substr($cat_desc, 0, 100) . '...</p>
                      <a href="threadlist.php?catid='. $id .'&catname='. $cat_name .'" class="btn btn-outline-success">View Threads</a>
                  </div>
            </div>
          </div>
          ';
          }
          ?>

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