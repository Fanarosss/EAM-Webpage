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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


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
                echo '<a href="http://localhost/signup.php">';
                  echo '<button class="dropbtn" style="margin-left: 10px; width: 110px;">Sign Up</button>';
                echo '</a>';
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
          <li class="breadcrumb-item active">About</li>
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
            <a class="nav-link" href="https://eudoxus.gr/Files/User%20Manual%20Foitites.pdf" target="_blank">Manual</a>
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
            <a class="nav-link" href="https://eudoxus.gr/files/ManualPublishersUpdateBooks.pdf" target="_blank">Manual</a>
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
        <div class="timeline" style="background-color:#008cba">

          <div class="timeline-item">
            <div class="timeline-icon">
              <span class="fas fa-anchor" style="padding:17px"></span>
            </div>
            <div class="timeline-content">
              <p class="timeline-content-date">2010</h2>
              <p>
                <a href="http://localhost/index.php" target="_blank">Eudoxus</a>
                is launched and now all students can now benefit from this tool. Gathered information for all books and all classes. Both AEI and TEI can use and benefit from Eudoxus.</p>
            </div>
          </div>

          <div class="timeline-item">
            <div class="timeline-icon">
              <span class="fas fa-book-reader" style="padding:17px"></span>
            </div>
            <div class="timeline-content right">
              <p class="timeline-content-date">Students</h2>
              <p>All students that are before their n+2 year of their studies, can have up to 40 free books for their classes.
                They can choose a book from the selections of the teacher, using all information necesary (front page, author, title, publications).
                They can only choose book for the classes that they actually attend this semester. In case They don't want a new book, or they don't have enough points
                they can always trade a book with another colleague. For more info click <a href="https://eudoxus.gr/Files/Terms_and_Conditions_Plus.pdf" target="_blank">here</a>.</p>
            </div>
          </div>

          <div class="timeline-item">
            <div class="timeline-icon">
              <span class="fas fa-book" style="padding:17px"></span>
            </div>
            <div class="timeline-content">
              <p class="timeline-content-date">Publishers</h2>
              <p>
                 Every publisher in order to use the platform must sign up first and get authentication from our team.
                 Then he will be able to upload in our database all of his books, so that the universities can pick them as choices for their students.
                 Also, additional to the books, publisher will have to add all of their distributors (if any). Every book should have at least one point of distribution,
                 even the publications themselves. For more info click <a href="https://eudoxus.gr/Files/Terms_and_Conditions_v1.pdf" target="_blank">here</a>.
              </p>
            </div>
          </div>

          <div class="timeline-item">
            <div class="timeline-icon">
              <span class="fas fa-building" style="padding:17px"></span>
            </div>
            <div class="timeline-content right">
              <p class="timeline-content-date">Distributors</h2>
              <p>
                Distribution point must be signed up, so that they can make deals with the publisher and distribute their books.
                The distributors are those who take the books from the publications and then the students go and pick them up from there.
                The position of the distribution points on map are very important!
              </p>
            </div>
          </div>

          <div class="timeline-item">
            <div class="timeline-icon">
              <span class="fas fa-feather-alt" style="padding:17px"></span>
            </div>
            <div class="timeline-content">
              <p class="timeline-content-date">Secretaries</p>
              <p>
                For every university and department the secretary must be signed up and authenticated to Eudoxus platform, so that they can pick
                the books for their students, provide the carriculations. For every semester the book selection must be repeated.
              </p>
            </div>
          </div>

          <div class="timeline-item">
            <div class="timeline-icon">
              <span class="fas fa-file-pdf" style="padding:17px"></span>
            </div>
            <div class="timeline-content right">
              <p class="timeline-content-date">Professors</h2>
              <p>
                For those who provide with free books and tips there is a place here to upload them. Sign up is obligatory.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
