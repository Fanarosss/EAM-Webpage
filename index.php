<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="images/icon.png">
    <title>Eudoxus</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
  <!-- grid class containing all items -->
  <div class="grid">
    <div class="logo">
      <a href="index.php"><img src="images/eudoxus.png"/></a>
    </div>
    <div class="bs-grid">
      <!-- Item 1 on grid -->
      <div class="bs-item1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/announcements.php">Announcements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/book_database.php">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/contact.php">Contact</a>
              </li>
            </ul>
            <div class="mydropdown">
              <button class="dropbtn">Login</button>
              <div class="mydropdown-content">
                <a href="#">Student</a>
                <a href="#">Publisher</a>
                <a href="#">Secretary</a>
                <a href="#">Distributor</a>
                <a href="#">Professor</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </div>
      <!-- Item 3 on grid -->
      <div class="bs-item3">
        <div class="jumbotron">
          <h1 class="display-3">Book distribution!</h1>
          <p class="lead">Now with eudoxus book distribution at universities became easy.</p>
          <hr class="my-4">
          <p>Appropriate management and fast distribution throughout greece.</p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" href="http://localhost/about.php" role="button">Learn more</a>
          </p>
        </div>
      </div>
      <!-- Item 4 on grid -->
      <h2>Are you?</h2>
      <div class="button-row">
          <input class="myButton" type="submit" value="Student">
          <input class="myButton" type="submit" value="Publisher">
          <input class="myButton" type="submit" value="Secretary">
          <input class="myButton" type="submit" value="Distributor">
          <input class="myButton" type="submit" value="Professor">
      </div>
    </div>
  </div>
</body>
</html>
