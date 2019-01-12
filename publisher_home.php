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
            <a href="http://localhost/logout.php">
              <button class="dropbtn">Logout</button>
            </a>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item active">Publisher</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- item 1 on bs2 grid - side bar -->
    <ul class="nav nav-pills flex-column">
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link active" href="http://localhost/publisher_home.php">Home</a>
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
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="bs-item3">
      <div class="jumbotron2">
        <div class="separator" style="margin-bottom:2em">
          <div class="Headers">
            <h2 style="margin-bottom:1em;">Full Name</h2>
            <h5>Username</h5>
            <h5>Address</h5>
            <h5>E-mail</h5>
            <h5>Phone</h5>
            <h5>Since</h5>
          </div>
          <div class="Info">
            <h2 style="margin-bottom:1em;"><?php echo $_SESSION['FullName'];?></h2>
            <h5><?php echo $_SESSION['Username'];?></h5>
            <h5><?php echo $_SESSION['Address'];?></h5>
            <h5><?php echo $_SESSION['Email'];?></h5>
            <h5><?php echo $_SESSION['Phone'];?></h5>
            <h5><?php echo $_SESSION['Date'];?></h5>
          </div>
          <div class="card border-primary mb-3" style="max-width: 20rem;">
            <div class="card-header">Collaboration with Eudoxus</div>
            <div class="form-group">
              <div class="custom-control custom-checkbox" style="text-align: center; margin-top:10px">
                <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                <label class="custom-control-label" for="customCheck1">2018-2019</label>
              </div>
              <hr class="my-2">
              <div class="custom-control custom-checkbox" style="text-align: center">
                <input type="checkbox" class="custom-control-input" disabled="" checked>
                <label class="custom-control-label">2017-2018</label>
              </div>
              <div class="custom-control custom-checkbox" style="text-align: center">
                <input type="checkbox" class="custom-control-input" disabled="" checked>
                <label class="custom-control-label">2016-2017</label>
              </div>
              <div class="custom-control custom-checkbox" style="text-align: center">
                <input type="checkbox" class="custom-control-input" disabled="">
                <label class="custom-control-label">2015-2016</label>
              </div>
              <div class="custom-control custom-checkbox" style="text-align: center">
                <input type="checkbox" class="custom-control-input" disabled="">
                <label class="custom-control-label">2014-2015</label>
              </div>
              <div class="custom-control custom-checkbox" style="text-align: center">
                <input type="checkbox" class="custom-control-input" disabled="" checked>
                <label class="custom-control-label">2013-2014</label>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <p>If you wish to change any of your info.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="http://localhost/publisher_settings.php" role="button"><i class="fas fa-cogs"></i> Settings</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
