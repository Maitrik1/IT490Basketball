<?php

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    print '
    <script type="text/javascript">
         var name;        
         name = "' . $name . '"
     
    </script>';

    echo ("<script>  var url = 'https://www.balldontlie.io/api/v1/players?search='+name+'';</script>");
} else  
    
if (isset($_GET['page'])) {
    $page_num = $_GET['page'];
    print '
    <script type="text/javascript">
         var pg;        
         pg = "' . $page_num . '"
        //  console.log(pg);
    </script>';

    echo ("<script>  var url = 'https://www.balldontlie.io/api/v1/players?page='+pg+'';</script>");
} else {

    echo ("<script>  var url = 'https://www.balldontlie.io/api/v1/players';</script>");
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

    <title>Players!</title>
</head>

<body>
    <div class="container">
        <h1>Players!</h1>
        <div class="row">

            <form class="form-inline">
                <div class="input-group">
                    <input type="text" name="name" id="name" class=" form-control" placeholder="Enter Player Name to Search">
                    <span class="input-group-btn">
                        <button type="submit" name="search" class="btn btn-success" id="bt">Search Player </button>
                    </span>
                </div>
                <a class="btn btn-secondary m-5" href="players.php">All Players</a>
            </form>


        </div>
        <table class="table table-striped">

            <thead>
                <tr>

                    <th>sn</th>
                    <th>Player Name</th>
                    <th>Position</th>
                    <th>Team Abbreviation</th>
                    <th>Name</th>
                    <th>Team Full Name</th>
                    <th>City</th>
                    <th>Conference</th>
                    <th>Division</th>
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
            // console.log(url);

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


                        table.append("<tr> <td>" + ++count +
                            "</td> <td> <a href='player_stats.php?id="+data.data[i].id+"'>" +
                            data.data[i].first_name + ' ' + data.data[i].last_name + "</a></td><td>" +
                            data.data[i].position + "</td><td>" +
                            data.data[i].team.abbreviation + "</td><td>" +
                            data.data[i].team.name + "</td>   <td>" +
                            data.data[i].team.full_name + "</td><td>" +
                            data.data[i].team.city + "</td>   <td>" +
                            data.data[i].team.conference + "</td>   <td>" +
                            data.data[i].team.division + "</td>   </tr>")

                    }
                    // console.log(data.meta.current_page)
                    if (data.meta.current_page != 1) {
                        x = parseInt(data.meta.current_page, 10) - 1;
                        page.append('<li class="page-item pre"><a class="page-link"  href="players.php?page=' + x + '" onclick="loadpage()">Previous</a></li>');
                    }
                    if (data.meta.current_page != data.meta.total_pages) {
                        x = parseInt(data.meta.current_page, 10) + 1;
                        page.append('<li class="page-item"><a class="page-link"  href="players.php?page=' + x + '">Next</a></li>');
                    }
                }



            });

            //-->
        </script>


    </div>
</body>

</html>