<?php
   include('./src/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="images/icon.png">
    <title>Announcements</title>
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
              <li class="nav-item active">
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
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item active">Announcements</li>
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
      <!-- Item 3 on grid -->
      <div class="bs-item3">
        <div class="list-group">
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">New Extra Time for Declaration and Distribution of books</h5>
              <small>09/01/2019</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>By command of Ministry of Education, Research and Religious Affairs, the time of
              Declaration and Distribution of books is further extended until Friday 18 January 2019 for
              Declaration and Friday 1 February 2019 for Distribution.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Extra Time for Declaration and Distribution of books</h5>
              <small>20/12/2018</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>By command of Ministry of Education, Research and Religious Affairs, the time of
              Declaration and Distribution of books is extended until Friday 11 January 2019 for
              Declaration and Friday 25 January 2019 for Distribution.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Problem for Publishers using Mozilla Firefox</h5>
              <small>01/11/2018</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>We inform you that due to the latest update of Mozilla Firefox browser, Eudoxus
              site has some stability issues. We are currently dealing with this issue and we suggest
              the use of some other browser until then. We are sorry for any inconvinience.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Start of Declaration and Distribution of books</h5>
              <small>23/10/2018</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>By command of Ministry of Education, Research and Religious Affairs, the
              Declaration and Distribution of books is officially starting. Declarations will be
              available from Wednesday 24 October 2018 until Friday 21 December 2018. Distribution will be
              available from Wednesday 24 October 2018 until Friday 11 January 2019.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Extra Time for Registration of Book Directories</h5>
              <small>12/09/2018</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>Time of Registration of Book Directories is extended until Friday 28 September 2018.
              After expiration of deadline, no further registrations will be accepted.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Extra Time for Post of Educational Books of Academic Year 2018-2019</h5>
              <small>27/07/2018</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>Time of Post of Educational Books is extended until Friday 10 August 2018.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Post of Educational Books of Academic Year 2018-2019</h5>
              <small>20/06/2018</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>By request of Ministry of Education, Research and Religious Affairs, Distributors who are
              willing to provide educational books for academic year 2018-2019 are obliged to register their Books
              of choice from Thursday 21 June 2018 until Friday 27 July 2018.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"> New Extra Time for Distribution of Books</h5>
              <small>31/05/2018</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>Time of Distribution of Books is extended until Friday 8 June 2018.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">Scheduled Maintenance 16/05/2018</h5>
              <small>11/05/2018</small>
            </div>
            <details>
              <summary>Read More</summary>
              <br>
              <p>Due to maintenance, it is possible for our site to be down from 09:00 to 13:00 on
              Wednesday 16/05/2018. We are sorry for any inconvinience.</p>
            </details>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
