<?php
require_once('backend/rabbit/path.inc');
require_once('backend/rabbit/get_host_info.inc');
require_once('backend/rabbit/rabbitMQLib.inc');
//send error with rabbit
function send_error($error){
    $client = new rabbitMQClient("errorReporting.ini","errorReporting");
    $request = array();
    $request['type'] = "Error";
    $request['page'] = "login";
    $request['message'] = $error;
    $response = $client->publish($request);
    exit("sent error");
}
try
{
    if(isset($_POST['email'])
        && isset($_POST['pword'])
    )
    {
        $email = $_POST["email"];
        $passwd = $_POST["pword"];
        //send the frontend shit over to the backend
        $client = new rabbitMQClient("testRabbitMQ.ini","frontbackcomms");
        $request = array();
        $request['type'] = "login";
        $request['email'] = $email;
        $request['password'] = $passwd;
        $response = $client->send_request($request);
        echo var_dump($response["success"]);
        if($response["success"])
        {
            $js_cookie = "id=" . $response["cookie"];
            ?>
            <script type="text/JavaScript">
                //set cookie
                //generate date 1 hour in the future
                var date = new Date();
                date.setTime(date.getTime() + (1*60*60*1000));
                //set cookie with path to root
                document.cookie = "<?php echo $js_cookie; ?>; expires=" + date.toGMTString() + "; path=/";
                window.location.replace("/account.php");
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
                alert("Failed to login");
                window.location.href = "login.php";
            </script>
            <?php
        }
    }
}
catch(Exception $e){
    //echo the error out to stdout
    echo $e->getMessage();
    //send the error
    send_error(strval($e->getMessage()));
    exit("send error\n");
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
                        <a class="nav-link" href="#">Work Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Me</a>
                    </li>
                    <li class="nav-item">
                        <label>
                            <input type="text" placeholder="Search..">
                        </label>
                        <button type="submit">Search</button>
                    </li>

                </ul>
            </div>
        </nav>

    </div>

    <hgroup>
        <h1>Login</h1>
        <form name="regform" id="myForm" method="POST">
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br><br>
            <label for="pword">Password:</label><br>
            <input type="password" id="pword" name="pword"><br><br>
            <a href="register.php">Don't have an account? Create an account here</a><br><br>
            <input type="submit" value="Login"><br>
        </form>
    </hgroup>

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