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
                <a href="http://localhost/login.php?id=1">Student</a>
                <a href="http://localhost/login.php?id=2">Publisher</a>
                <a href="http://localhost/login.php?id=3">Secretary</a>
                <a href="http://localhost/login.php?id=4">Distributor</a>
                <a href="http://localhost/login.php?id=5">Professor</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item active">Log In</li>
        </ol>
      </div>
      <!-- Item 3 on grid -->
      <div class="bs-item3">
        <div class="jumbotron">
          <form>
            <h1 class="display-3">Log In</h1>
            <?php
              $id = $_GET['id'];
              if ($id == 1){
                echo "For Students";
              }else if ($id == 2){
                echo "For Publishers";
              }else if ($id == 3){
                echo "For Secretaries";
              }else if ($id == 4){
                echo "For Distributors";
              }else if ($id == 5){
                echo "For Professors";
              }
             ?>
            <hr class="my-2">
            <div class="form-group">
              <label for="Username">Username</label>
              <input type="text" class="form-control" id="Username">
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" class="form-control" id="Password">
            </div>
            <hr class="my-4">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="http://localhost/index.php">
               <input type="button" class="btn btn-primary" style="background-color: red;" value="Cancel" />
            </a>
        </form>
        </div>
      </div>
    </div>
  </div>
</body>
