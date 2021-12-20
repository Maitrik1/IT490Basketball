<?php
include (  "account.php"     ) ;
$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno())
{ echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
mysqli_select_db( $db, $project );
$fname = $lname = $title = $post_id = $message = '';
$errors = array('fname' => '', 'lname' => '', 'title' => '', 'post_id' => '', 'message' => '');

if(isset($_POST['submit'])){

    // check first name
    if(empty($_POST['fname'])){
        echo 'First name required <br />';
    } else{
        echo htmlspecialchars($_POST['fname']) . '<br />';
    }

    // check last name
    if(empty($_POST['lname'])){
        echo 'Last name required <br />';
    } else{
        echo htmlspecialchars($_POST['lname']) . '<br />';
    }

    // check title
    if(empty($_POST['title'])){
        echo 'Title required <br />';
    } else{
        echo htmlspecialchars($_POST['title']) . '<br />';
    }

    // check post id
    if(empty($_POST['post_id'])){
        echo 'Post ID required<br />';
    } else{
        echo htmlspecialchars($_POST['post_id']) . '<br />';
    }

    // check message
    if(empty($_POST['message'])){
        echo 'Message required <br />';
    } else{
        echo htmlspecialchars($_POST['message']) . '<br />';
    }

    if(array_filter($errors)){
        //echo 'errors in form';
    } else {
        // escape sql chars
        $fname = mysqli_real_escape_string($db, $_POST['fname']);
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $post_id = mysqli_real_escape_string($db, $_POST['post_id']);
        $message = mysqli_real_escape_string($db, $_POST['message']);

        // create sql
        $sql = "INSERT INTO forum(fname,lname,post_id,title,message) VALUES('$fname','$lname','$post_id','$title','$message')";

        // save to db and check
        if(mysqli_query($db, $sql)){
            // success
            header('Location: forum.php');
        } else {
            echo 'query error: '. mysqli_error($db);
        }


    }
}
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
    <br>
    <br>
    <a href="forum.php" class="button"><--- Back to Forums</a>
    <div class="col-sm-12  text-center">
        <hgroup>
            <h1>Create A New Post</h1>
            <form action="new_post.php" method="POST">
                <label>First Name:</label><br>
                <input type="text" name="fname"><br><br>
                <label>Last Name:</label><br>
                <input type="text" name="lname"><br><br>
                <label>Title:</label><br>
                <input type="text" name="title"><br><br>
                <label>Create a Post ID:</label><br>
                <input type="text" name="post_id"><br><br>
                <label>Message:</label><br><br>
                <textarea name="message" rows="4" cols="50"></textarea><br><br><br>
                <input type="submit" name="submit" value="Submit Post"><br><br>

            </form>
        </hgroup>
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

