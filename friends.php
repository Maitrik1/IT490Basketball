<?php
// copy dependencies from login.php 

require_once('backend/rabbit/path.inc');
require_once('backend/rabbit/get_host_info.inc');
require_once('backend/rabbit/rabbitMQLib.inc');
//send error with rabbit
function send_error($error)
{

    $client = new rabbitMQClient("errorReporting.ini", "errorReporting");
    $request = array();
    $request['type'] = "Error";
    $request['page'] = "friends";
    $request['message'] = $error;
    $response = $client->publish($request);
    exit("sent error");
}

// getting frind list from rabitmq backend
try {
    $client = new rabbitMQClient("testRabbitMQ.ini", "frontbackcomms");
    $request = array();
    $request['type'] = "show_friends";
    $request['session_id'] = $_COOKIE['id'];
    $response = $client->send_request($request);
    // print_r($response);
} catch (Exception $e) {
    //echo the error out to stdout
    echo $e->getMessage();
    //send the error
    send_error(strval($e->getMessage()));
    exit("send error\n");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>My Friends!</title>
</head>

<body>
    <div class="container">
        <h1>My Friends !</h1>
        <div class="row">

            <form class="form-inline">

                <a class="btn btn-secondary m-5" href="addFriends.php">Add New Friends</a>
            </form>


        </div>
        <table class="table table-striped">

            <thead>
                <tr>

                    <th>sn</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                </tr>
            <tbody>
                <?php $i = 0;
                foreach ($response["friends"] as $r) { ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $r['fname'] ?></td>
                        <td><?php echo $r['lname'] ?></td>

                        <td><?php echo $r['email'] ?></td>



                    </tr>
                <?php } ?>
            </tbody>
            </thead>
        </table>


    </div>
</body>

</html>