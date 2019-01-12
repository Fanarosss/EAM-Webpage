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
      <!-- Item 3 on grid -->
      <div class="bs-item3">
        <div class="list-group">
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
          <div class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small>3 days ago</small>
            </div>
            <details>
              <summary>Read More</summary>
              <p> - by Refsnes Data. All Rights Reserved.</p>
              <p>All content and graphics on this web site are the property of the company Refsnes Data.</p>
            </details>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
