<?php
if (!isset($_GET['id'])) {
    header('refresh:2;url= players.php');
    exit('No Team id redirecting to home page');
}
$id = $_GET['id'];

print '
    <script type="text/javascript">
         var id;        
         id = "' . $id . '"
         console.log(id);
    </script>';

echo ("<script>  var url = 'https://www.balldontlie.io/api/v1/stats?player_ids[]='+id+'';</script>");


if (isset($_GET['page'])) {
    $page_num = $_GET['page'];
    print '
    <script type="text/javascript">
         var pg;        
         pg = "' . $page_num . '"
         console.log(pg);
    </script>';

    echo ("<script>  var url = 'https://www.balldontlie.io/api/v1/stats?player_ids[]='+id+'&page='+pg+'';</script>");
} else {

    echo ("<script>  var url = 'https://www.balldontlie.io/api/v1/stats?player_ids[]='+id+'';</script>");
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

    <title>Players Stats</title>
</head>

<body>
    <div class="container">
        <h1>Players Stats</h1>

        <table class="table table-striped">

            <thead>
                <tr>

                    <th>sn</th>
                    <th>Name</th>
                    <th>Season</th>
                    <th>Date</th>
                    <th>Position</th>
                    <th>Time</th>
                    <th>REB</th>
                    <th>AST</th>
                    <th>PTS</th>
                    <th>Team</th>
                </tr>
            <tbody></tbody>
            </thead>
        </table>
        <div class="d-flex justify-content-center">

            <nav aria-label="Page navigation example">
                <ul class="pagination">




                </ul>
            </nav>
        </div>


        <!-- Optional JavaScript -->

        <div id="result"></div>

        <script type="text/javascript">

            $.ajax({
                url: url,
                cache: false,
                success: function(data) {
                    var table = $("tbody");
                    var page = $(".pagination");
                    var page_c = 0;
                    count = 0;
                    i = 0;
                    for (i; i < data.data.length; i++) {
                        const d = new Date(data.data[i].game.date);
                        // console.log(data.data.length)
                        table.append("<tr> <td>" + ++count + "</td>   <td>" +
                            data.data[i].player.first_name + ' ' + data.data[i].player.last_name + "</td><td>" +
                            data.data[i].game.season + "</td>   <td>" +
                            d.toDateString() + "</td>   <td>" +

                            data.data[i].player.position + "</td><td>" +
                            data.data[i].min + "</td><td>" +
                            data.data[i].reb + "</td>   <td>" +
                            data.data[i].ast + "</td><td>" +
                            data.data[i].pts + "</td>   <td>" +

                            data.data[i].team.full_name + "</td>   </tr>")

                    }
                    // console.log('current page' + data.meta.current_page)
                    if (data.meta.current_page != 1) {
                        x = parseInt(data.meta.current_page, 10) - 1;
                        page.append('<li class="page-item pre"><a class="page-link"  href="player_stats.php?id=' + id + '&page=' + x + '">Previous</a></li>');
                    }
                    if (data.meta.current_page != data.meta.total_pages) {
                        x = parseInt(data.meta.current_page, 10) + 1;
                        page.append('<li class="page-item"><a class="page-link"  href="player_stats.php?id=' + id + '&page=' + x + '">Next</a></li>');
                    }
                }



            });

            //-->
        </script>


    </div>
</body>

</html>