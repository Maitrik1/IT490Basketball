<?php
include (  "account.php"     ) ;
$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno())
{ echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
mysqli_select_db( $db, $project );

//write query for all posts
$sql = 'SELECT title, fname, lname, post_id, message FROM forum';

//make the query and get posts
$result = mysqli_query($db, $sql);

//fetch the rows as an array
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free results from memory
mysqli_free_result($result);

//close connection
mysqli_close($db);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hoop Squad</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="main.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-md
                    justify-content-start
                    bg-dark navbar-dark
                    col-12">

            <!-- Brand -->
            <a class="navbar-brand" href="index.html">Hoop Squad</a>
            <!-- Responsive Button for the smaller menu -->
            <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <!-- Links -->
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop"
                           data-toggle="dropdown">Games</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Games</a>
                            <a class="dropdown-item" href="#">Achievements</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="players.php">Stats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="forum.php">Forums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="col-sm-12  text-center">
        <section>
            <h1><b>Forums</b></h1>
        </section>
    </div>

    <div class="col-sm-6" id="section-1">
       <h2><a href="new_post.php" class="button">Create New Post</a><h2><br><br><br>
    </div>

    <div class="col-sm-6" id="section-1">

        <br><br><br>
    </div>

    <div class="col-sm-12">
        <div class="row">
        <?php foreach ($posts as $post){ ?>
            <div class="col s6 md12">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h3><b><?php echo htmlspecialchars($post["title"]);?></b></h3>
                        <h5>Post created by: <?php echo htmlspecialchars($post["fname"]) . " " . htmlspecialchars($post["lname"]);?></h5>
                        <h6>Post ID: <?php echo htmlspecialchars($post["post_id"]);?></h6>
                        <h6><?php echo htmlspecialchars($post["message"]);?></h6><br><br>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <footer class="footer page-footer font-small ">
        <div class="container">
            <div class="row">
                <span class="text-muted">&copy; Hoop Squad, 2021 |  Terms Of Use  |  Privacy Statement</span>
            </div>
        </div>
    </footer>

</div>
</body>
</html>

