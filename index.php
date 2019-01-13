<?php
   include('./src/session.php');
?>
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
  <div class="bs1-grid">
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
            <?php
              if(!isset($_SESSION['Id'])) {
                echo '<div class="mydropdown">';
                  echo '<button class="dropbtn" style="width: 110px;">Login</button>';
                  echo '<div class="mydropdown-content" style="width: 110px;">';
                    echo '<a href="http://localhost/login.php?id=1">Student</a>';
                    echo '<a href="http://localhost/login.php?id=2">Publisher</a>';
                    echo '<a href="http://localhost/login.php?id=3">Secretary</a>';
                    echo '<a href="http://localhost/login.php?id=4">Distributor</a>';
                    echo '<a href="http://localhost/login.php?id=5">Professor</a>';
                  echo '</div>';
                echo '</div>';
                echo '<div class="mydropdown" style="margin-left:10px">';
                  echo '<button class="dropbtn" style="width: 110px;">Sign Up</button>';
                  echo '<div class="mydropdown-content" style="width: 110px;">';
                    echo '<a href="http://localhost/signup.php?id=1">Student</a>';
                    echo '<a href="http://localhost/signup.php?id=2">Publisher</a>';
                    echo '<a href="http://localhost/signup.php?id=3">Secretary</a>';
                    echo '<a href="http://localhost/signup.php?id=4">Distributor</a>';
                    echo '<a href="http://localhost/signup.php?id=5">Professor</a>';
                  echo '</div>';
                echo '</div>';
              }else{
                echo '<a href="http://localhost/logout.php">';
                  echo '<button class="dropbtn">Logout</button>';
                echo '</a>';
              }
            ?>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- Item 1 on grid2 -->
    <?php
    if (isset($_SESSION['Id'])){
      if ($_SESSION['Id'] == 1){
        echo '
        <ul class="nav nav-pills flex-column">
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student_home.php">Home</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student_book_sel.php">Book Selection</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student_book_list.php">Book List</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student_faq.php">FAQ</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student_manual.php">Manual</a>
          </li>
        </ul>';
      }else if ($_SESSION['Id'] == 2){
        echo '
        <ul class="nav nav-pills flex-column">
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher_home.php">Home</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher_book_man.php">Book Management</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher_courier.php">Courier Service</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher_faq.php">FAQ</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher_manual.php">Manual</a>
          </li>
        </ul>';
      }
    }else{
      echo '
      <ul class="nav nav-pills flex-column">
      </ul>';
    }
    ?>
    <!-- Item 2 on grid2 -->
    <div class="bs-grid">
      <!-- Item 1 on grid -->
      <div class="bs-item3">
        <div class="jumbotron" style="margin-bottom: 10px;">
          <h1 class="display-3">Book distribution!</h1>
          <p class="lead">Now with eudoxus book distribution at universities became easy.</p>
          <hr class="my-4">
          <div class="splitter">
            <div class="split1">
              <p>Appropriate management and fast distribution throughout greece.</p>
              <p class="lead">
                <a class="btn btn-primary btn-lg" href="http://localhost/about.php" role="button">Learn more</a>
              </p>
            </div>
            <div class="split2" style="padding-left: 2em;">
              <a role="button" class="btn btn-outline-primary btn-lg" href="http://localhost/studies.php"><h3>Browser for all departments.</h3></a>
            </div>
            <div class="split3" style="padding-left: 2em;">
              <a role="button" class="btn btn-outline-primary btn-lg" href="http://localhost/book_database.php"><h3>Search Engine.</h3></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 2 on grid -->
      <h2>Are you?</h2>
      <div class="button-row">
        <a href="http://localhost/login.php?id=1">
          <input class="myButton" type="submit" value="Student">
        </a>
        <a href="http://localhost/login.php?id=2">
          <input class="myButton" type="submit" value="Publisher">
        </a>
        <a href="http://localhost/login.php?id=3">
          <input class="myButton" type="submit" value="Secretary">
        </a>
        <a href="http://localhost/login.php?id=4">
          <input class="myButton" type="submit" value="Distributor">
        </a>
        <a href="http://localhost/login.php?id=5">
          <input class="myButton" type="submit" value="Professor">
        </a>
      </div>
    </div>
  </div>
</body>
</html>
