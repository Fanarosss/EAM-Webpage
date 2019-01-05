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
              <button class="dropbtn" style="width: 110px;">Login</button>
              <div class="mydropdown-content" style="width: 110px;">
                <a href="http://localhost/login.php?id=1">Student</a>
                <a href="http://localhost/login.php?id=2">Publisher</a>
                <a href="http://localhost/login.php?id=3">Secretary</a>
                <a href="http://localhost/login.php?id=4">Distributor</a>
                <a href="http://localhost/login.php?id=5">Professor</a>
              </div>
            </div>
            <a href="http://localhost/signup.php">
              <button class="dropbtn" style="margin-left: 10px; width: 110px;">Sign Up</button>
            </a>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item active">Sign Up</li>
        </ol>
      </div>
      <!-- Item 3 on grid -->
      <div class="bs-item3">
        <div class="jumbotron">
          <h1 class="display-3">Sign Up</h1>
          <form action="" method="POST">
            <hr class="my-2">
            <div class="form-group">
              <label for="Type">User Type</label>
              <select class="form-control" id="Type" type="button"  required>
                <option disabled selected value>-- Choose Type --</option>
                <option>Student</option>
                <option>Publisher</option>
                <option>Secretary</option>
                <option>Distributor</option>
                <option>Professor</option>
              </select>
            </div>
            <div title="select number">
                <select id="select">
                    <option>one</option>
                    <option>two</option>
                    <option>three</option>
                </select>
            </div>
            <div class="form-group">
              <label for="Username">Username</label>
              <input type="text" class="form-control" name="Username" id="Username" required>
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" class="form-control" name="Password" id="Password" required>
            </div>
            <div class="form-group">
              <label for="CPassword"> Confirm Password</label>
              <input type="password" class="form-control" name="CPassword" id="CPassword" required>
            </div>
            <div class="form-group">
              <label for="FullName">Full Name</label>
              <input type="text" class="form-control" name="FullName" id="FullName" required>
            </div>
            <div class="form-group">
              <label for="Email">Email Address</label>
              <input type="email" class="form-control" id="Email" required>
            </div>
            <div class="form-group">
              <label for="University">University</label>
              <input type="text" class="form-control" id="University">
            </div>
            <hr class="my-4">
            <button type="submit" name="Login" class="btn btn-primary">Submit</button>
            <a href="http://localhost/index.php">
               <input type="button" class="btn btn-primary" style="background-color: red;" value="Cancel" />
            </a>
          </form>
          <?php
            include('./src/config.php');
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
              $user = mysqli_real_escape_string($conn, $_POST['Username']);
              $pass = mysqli_real_escape_string($conn, $_POST['Password']);
              $query = "SELECT * FROM user WHERE Username = '".$user."' AND Password = '".$pass."' AND Id = '".$id."'";
              $result = $conn->query($query);
              if (mysqli_num_rows($result) == 1) {
                $_SESSION['login_user'] = $user;
                if ($id == 1){
                  header("location: student_home.php");
                }else if ($id == 2){
                  header("location: publisher_home.php");                       //not exists
                }else if ($id == 3){
                  header("location: secretary_home.php");                       //not exists
                }else if ($id == 4){
                  header("location: distributor_home.php");                     //not exists
                }else if ($id == 5){
                  header("location: professor_home.php");                       //not exists
                }
              } else {                                                          //create better messages
                echo '<div style = "font-size:11px; color:#cc0000; margin-top:10px">"Your Login Name or Password is invalid"</div>';
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
