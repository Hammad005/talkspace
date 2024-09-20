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
    <section id="about">
        <div class="container d-flex justify-content-center my-5 mb-0">
            <img src="asset/logo/logo.png" alt="" height="50px">
            <h5 class="category_heading"><b> About!</b></h5>
        </div>
        <br>
        <div class="container">
            <h4><b>
                    Welcome to TalkSpace
                </b>
            </h4>
            <hr>
            <p>
                Welcome to TalkSpace, your premier destination for everything related to programming languages! Our
                forum is dedicated to bringing together a diverse community of developers, programmers, and tech
                enthusiasts who share a passion for coding. At TalkSpace, we dive deep into the intricacies of various
                programming languages, from the fundamentals to the latest advancements and trends. Whether you're a
                novice eager to learn the basics of Python, a JavaScript guru, or someone exploring the capabilities of
                cutting-edge languages like Go or Kotlin, you’ll find valuable insights and engaging discussions here.
            </p>

            <br>
            <h4><b>
                    Our Core Principles:
                </b>
            </h4>
            <hr>
            <p>
                To ensure that TalkSpace remains a constructive and enjoyable place for all participants, we adhere to a
                set of core principles:
                <br>
                <li><b>Respect Privacy: </b> Never post personal information about other forum members. Our goal is to
                    create a
                    space where everyone feels safe and valued.</li>
                <br>
                <li><b>Protect Reputation: </b> Avoid any content that could threaten or damage the reputation of
                    individuals or
                    organizations.</li>
                <br>
                <li><b>Foster Inclusivity: </b> We have a strict policy against intolerance in any form. Discriminatory
                    remarks
                    based on race, culture, appearance, gender, sexual preference, religion, or age are not tolerated.
                    We
                    are committed to fostering an environment where all voices are heard and respected.</li>
            </p>

            <br>
            <h4><b>
                    Focused Discussions on Programming Languages:
                </b>
            </h4>
            <hr>
            <p>
                At TalkSpace, our focus is solely on programming languages. This dedicated focus allows us to delve
                deeply into discussions ranging from:
                <br>
                <li><b>Language-Specific Features: </b> Explore the unique aspects and capabilities of different
                    programming languages.</li>
                <br>
                <li><b>Best Practices: </b>Share and learn about the most effective coding practices and techniques.</li>
                <br>
                <li><b>Performance Comparisons: </b>Compare the performance and applicability of various languages in
                    different contexts.</li>
                <br>
                <li><b>Frameworks and Libraries: </b>Discuss experiences and best practices with different frameworks
                    and libraries.</li>
            </p>

            <br>
            <h4><b>
                    Engage and Contribute:
                </b>
            </h4>
            <hr>
            <p>
                We encourage you to engage actively and respectfully. By contributing to TalkSpace, you help build a
                repository of knowledge that benefits everyone in our community. Let’s work together to uphold the
                standards of respect and professionalism that make TalkSpace a valuable resource for all programming
                enthusiasts. Thank you for being a part of our journey, and happy coding!
            </p>
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