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
              <li class="nav-item active">
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
          <li class="breadcrumb-item active">Contact</li>
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
        <form>
          <fieldset>
            <legend>Contact Form</legend>
            <div class="form-group">
              <label for="Name">Full Name</label>
              <input type="text" class="form-control" id="Name" placeholder="Ex: John Davis" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ex: John Davis'" required>
            </div>
            <div class="form-group">
              <label for="Phone">Phone Number</label>
              <input type="tel" class="form-control" id="Phone" placeholder="Ex: 6986321654" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ex: 6986321654'" required>
            </div>
            <div class="form-group">
              <label for="Email">Email Address</label>
              <input type="email" class="form-control" id="Email" placeholder="Ex: JohnD@gmail.com" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ex: JohnD@gmail.com'" required>
            </div>
            <div class="form-group">
              <label for="Type">User Type</label>
              <select class="form-control" id="Type" required>
                <option disabled selected value>-- Choose Type --</option>
                <option>Student</option>
                <option>Publisher</option>
                <option>Secretary</option>
                <option>Distributor</option>
                <option>Professor</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Title">Text Title</label>
              <input type="text" class="form-control" id="Title" required>
            </div>
            <div class="form-group">
              <label for="Text">Text Area</label>
              <textarea class="form-control" id="Text" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label for="File">File Input</label>
              <input type="file" class="form-control-file" id="File">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </fieldset>
        </form>
      </div>
      <!-- Item 4 on grid -->
      <div class="bs-container">
        <div class="card text-white bg-primary mb-3" style="max-width: 20rem; text-align: center;">
          <div class="card-header">Contact Details</div>
          <div class="card-body">
            <h3 class="card-title">Hours of Operation</h3>
            <h5><p class="card-text">Monday - Friday : 9.00 - 17.00</p></h5>
            <h3 class="card-title">Telephone Number</h3>
            <h5><p class="card-text">215 215 7850</p></h5>
          </div>
        </div>
        <div class="card text-white bg-primary mb-3" style="max-width: 20rem; text-align: center;">
          <div class="card-header">Communication Material</div>
          <div class="card-body">
            <h4><a href="https://eudoxus.gr/Files/Eudoxus_poster.pdf" target="_blank" style="color: #ffffff">Eudoxus Poster</a></h4>
            <h4><a href="https://eudoxus.gr/Files/Eudoxus-Triptyxo.pdf" target="_blank" style="color: #ffffff">Eudoxus Triptych</a></h4>
            <h4><a href="https://eudoxus.gr/Files/Syggrammata%20Eudoxus.pdf" target="_blank" style="color: #ffffff">Presentation of Eudoxus</a></h4>
            <h4><a href="https://eudoxus.gr/Files/Syggrammata.pdf" target="_blank" style="color: #ffffff">Who We Are</a></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
