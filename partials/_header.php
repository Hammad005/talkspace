<?php
session_name('TalkSpace_user_session');
session_start();
include '_dbconnection.php';
?>
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="/TalkSpace"><img src="asset/logo/logo.png" alt="" height="40px"></a>
        <button class="navbar-toggler navbar-light " type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mx-lg-4 mb-0">
                <li class="nav-item mx-lg-3">
                    <a class="nav-link " aria-current="page" href="/TalkSpace">Home</a>
                </li>
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item mx-lg-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        $sql="SELECT * FROM `categories` ORDER BY `category_id` DESC LIMIT 4";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $id = $row['category_id'];
                        $cat_name = $row['category_name'];
                    echo'
                        <li><a class="dropdown-item" href="threadlist.php?catid='. $id .'&catname='. $cat_name .'">'.$cat_name.'</a></li>
                    ';
                    }
                        ?>
                    </ul>
                </li>
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="contact.php" tabindex="-1">Contact</a>
                </li>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                echo'
                <li class="nav-item mx-lg-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Hi,'.$_SESSION['username'].' 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="partials/_logout.php">
                        Logout
                        <i class="fa fa-sign-out" style=" font-size: 10px; "></i>
                        </a></li>
                    </ul>
                </li>
                </ul>
            <div class="col mx-lg-5 me-lg-4">
              <div class="search">
                <form class="d-flex" method= "GET" action="search.php">
                    <input class="form-control mx-lg-2" name="search" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-success mx-lg-0 mx-2" type="submit">Search</button>
                </form>
                </div>
            </div>
            
                ';
            }
            else{
                echo '
                </ul>
                <div class="col mx-lg-5 me-lg-4">
                <div class="search">
                    <form class="d-flex" method= "GET" action="search.php">
                        <input class="form-control mx-lg-2" name="search" type="search" placeholder="Search" aria-label="Search" required>
                        <button class="btn btn-success mx-lg-0 mx-2" type="submit">Search</button>
                    </form>
                    </div>
                </div>
                <button class="btn btn-outline-success px-3 mx-lg-0 me-lg-2 mt-lg-0  mt-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="fa fa-sign-in" style=" font-size: 15px; "></i>
                Login
                </button>
                ';
            }
            ?> 
        </div>
    </div>
</nav>
<?php
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
?>