<?php

session_start();

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
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="la.jpg" alt="Los Angeles" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="chicago.jpg" alt="Chicago" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="ny.jpg" alt="New York" class="d-block w-100">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="col-sm-12  text-center">
        <section>
            <h1><b>ABOUT Hoop Squad</b></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rhoncus dui quis lobortis commodo. Quisque ac cursus enim.
                Proin non nisl sem. Donec ipsum erat, dignissim maximus risus sit amet, efficitur aliquet purus. Nulla maximus ligula non
                ligula dictum mattis. In a enim cursus, mollis tortor eu, eleifend ipsum. Phasellus aliquet rhoncus pretium. Proin hendrerit
                nulla mauris, aliquet posuere nunc rhoncus ut. Vivamus laoreet fermentum neque sit amet iaculis. Sed ex est, auctor id v
                ulputate et, laoreet at felis. Fusce id nibh quam. Curabitur vel elementum magna.

                Nullam et dui sed lectus iaculis scelerisque ac eget velit. Mauris pharetra malesuada nunc feugiat dictum.
                Duis mattis, quam id tempor porttitor, quam ante cursus dolor, id porttitor mauris sapien sit amet dui. Pellentesque
                placerat nunc sit amet justo rutrum euismod. Aliquam imperdiet cursus libero sed luctus. Mauris ullamcorper magna sed augue
                pellentesque, id aliquet eros dictum. Curabitur condimentum elit turpis, et malesuada justo convallis ut. Duis dapibus nisl
                vel neque vestibulum, et mattis nibh vestibulum. Phasellus eleifend eget libero et consequat. Aliquam eget
                porttitor enim, et dignissim diam. Pellentesque interdum lorem eget ultrices maximus. </p>
        </section>
    </div>
    <div class="col-sm-6  text-center">
        <section>
            <h1><b>ABOUT Hoop Squad</b></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rhoncus dui quis lobortis commodo. Quisque ac cursus enim.
                Proin non nisl sem. Donec ipsum erat, dignissim maximus risus sit amet, efficitur aliquet purus. Nulla maximus ligula non
                ligula dictum mattis. In a enim cursus, mollis tortor eu, eleifend ipsum. Phasellus aliquet rhoncus pretium. Proin hendrerit
                nulla mauris, aliquet posuere nunc rhoncus ut. Vivamus laoreet fermentum neque sit amet iaculis. Sed ex est, auctor id v
                ulputate et, laoreet at felis. Fusce id nibh quam. Curabitur vel elementum magna.

                Nullam et dui sed lectus iaculis scelerisque ac eget velit. Mauris pharetra malesuada nunc feugiat dictum.
                Duis mattis, quam id tempor porttitor, quam ante cursus dolor, id porttitor mauris sapien sit amet dui. Pellentesque
                placerat nunc sit amet justo rutrum euismod. Aliquam imperdiet cursus libero sed luctus. Mauris ullamcorper magna sed augue
                pellentesque, id aliquet eros dictum. Curabitur condimentum elit turpis, et malesuada justo convallis ut. Duis dapibus nisl
                vel neque vestibulum, et mattis nibh vestibulum. Phasellus eleifend eget libero et consequat. Aliquam eget
                porttitor enim, et dignissim diam. Pellentesque interdum lorem eget ultrices maximus. </p>
        </section>
    </div>
    <div class="col-sm-6  text-center">
        <section>
            <h1><b>ABOUT Hoop Squad</b></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rhoncus dui quis lobortis commodo. Quisque ac cursus enim.
                Proin non nisl sem. Donec ipsum erat, dignissim maximus risus sit amet, efficitur aliquet purus. Nulla maximus ligula non
                ligula dictum mattis. In a enim cursus, mollis tortor eu, eleifend ipsum. Phasellus aliquet rhoncus pretium. Proin hendrerit
                nulla mauris, aliquet posuere nunc rhoncus ut. Vivamus laoreet fermentum neque sit amet iaculis. Sed ex est, auctor id v
                ulputate et, laoreet at felis. Fusce id nibh quam. Curabitur vel elementum magna.

                Nullam et dui sed lectus iaculis scelerisque ac eget velit. Mauris pharetra malesuada nunc feugiat dictum.
                Duis mattis, quam id tempor porttitor, quam ante cursus dolor, id porttitor mauris sapien sit amet dui. Pellentesque
                placerat nunc sit amet justo rutrum euismod. Aliquam imperdiet cursus libero sed luctus. Mauris ullamcorper magna sed augue
                pellentesque, id aliquet eros dictum. Curabitur condimentum elit turpis, et malesuada justo convallis ut. Duis dapibus nisl
                vel neque vestibulum, et mattis nibh vestibulum. Phasellus eleifend eget libero et consequat. Aliquam eget
                porttitor enim, et dignissim diam. Pellentesque interdum lorem eget ultrices maximus. </p>
        </section>
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
