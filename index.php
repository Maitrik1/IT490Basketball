?<php

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
            <a class="nav-link" href="login.php">Account</a>
          </li>
          <li class="nav-item">
            <input type="text" placeholder="Search..">
            <button type="submit">Search</button>
	  </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>


        </ul>
      </div>
    </nav>
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
