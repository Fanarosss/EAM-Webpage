<?php
   include('../src/session.php');
   include('../src/config.php');
   if(isset($_SESSION['Id'])) {
     if ($_SESSION['Id'] == 1){
       header("location: ../student/student_home.php");
     }else if ($_SESSION['Id'] == 2){
       header("location: ../publisher/publisher_home.php");
     }else if ($_SESSION['Id'] == 3){
       header("location: secretary_home.php");
     }else if ($_SESSION['Id'] == 4){
       header("location: distributor_home.php");
     }else if ($_SESSION['Id'] == 5){
       header("location: professor_home.php");
     }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="http://localhost/images/icon.png">
    <title>Eudoxus</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/css/style.css">
</head>

<body>
  <!-- grid class containing all items -->
  <div class="grid">
    <div class="logo">
      <a href="http://localhost/index.php"><img src="http://localhost/images/eudoxus.png"/></a>
    </div>
    <div class="bs-grid">
      <!-- Item 1 on grid -->
      <div class="bs-item1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/announcements.php">Announcements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/book_database.php">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/general/contact.php">Contact</a>
              </li>
            </ul>
            <div class="mydropdown">
              <button class="dropbtn" style="width: 110px;">Login</button>
              <div class="mydropdown-content" style="width: 110px;">
                <a href="http://localhost/general/login.php?id=1">Student</a>
                <a href="http://localhost/general/login.php?id=2">Publisher</a>
                <a href="">Secretary</a>
                <a href="">Distributor</a>
                <a href="">Professor</a>
              </div>
            </div>
            <div class="mydropdown" style="margin-left:10px">
              <button class="dropbtn" style="width: 110px;">Sign Up</button>
              <div class="mydropdown-content" style="width: 110px;">
                <a href="http://localhost/general/signup.php?id=1">Student</a>
                <a href="http://localhost/general/signup.php?id=2">Publisher</a>
                <a href="">Secretary</a>
                <a href="">Distributor</a>
                <a href="">Professor</a>
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
          <?php
          if (isset($_SESSION['signup'])) {
            if($_SESSION['signup'] == 1){
              echo '<div class="alert alert-dismissible alert-success">
                <strong> You successfully signed up!</strong>
              </div>';
              unset($_SESSION['signup']);
            }
          }
          ?>
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
          <form action="" method="POST">
            <hr class="my-2">
            <div class="form-group">
              <label for="Username">Username</label>
              <input type="text" class="form-control" name="Username" id="Username" required>
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" class="form-control" name="Password" id="Password" required>
            </div>
            <hr class="my-4">
            <button type="submit" name="Login" class="btn btn-primary">Submit</button>
            <a href="http://localhost/index.php">
               <input type="button" class="btn btn-primary" style="background-color: red;" value="Cancel" />
            </a>
          </form>
          <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
              $user = mysqli_real_escape_string($conn, $_POST['Username']);
              $pass = mysqli_real_escape_string($conn, $_POST['Password']);
              $query = "SELECT FullName, Email, Phone, Period, Deadline FROM user,system WHERE Username = '".$user."' AND Password = '".$pass."' AND Id = '".$id."'";
              $result = $conn->query($query);
              if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Id'] = $id;
                $_SESSION['Username'] = $user;
                $_SESSION['FullName'] = $row["FullName"];
                $_SESSION['Email'] = $row["Email"];
                $_SESSION['Phone'] = $row["Phone"];
                $_SESSION['Period'] = $row["Period"];
                $_SESSION['Deadline'] = $row["Deadline"];
                if ($id == 1){
                  $query2 = "SELECT university.name, department.name AS dname, student.RegDate FROM student,department,university WHERE student.Username = '".$user."'
                  AND student.Department_id = department.Id AND university.Id = department.University_id";
                  $result2 = $conn->query($query2);
                  $row = mysqli_fetch_assoc($result2);
                  $_SESSION['University'] = $row['name'];
                  $_SESSION['Department'] = $row['dname'];
                  $_SESSION['Date'] = $row['RegDate'];
                  header("location: http://localhost/student/student_home.php");
                }else if ($id == 2){
                  $query2 = "SELECT Address, DateAdded FROM publisher WHERE Username = '".$user."'";
                  $result2 = $conn->query($query2);
                  $row = mysqli_fetch_assoc($result2);
                  $_SESSION['Address'] = $row["Address"];
                  $_SESSION['Date'] = $row["DateAdded"];
                  header("location: http://localhost/publisher/publisher_home.php");                       //not exists
                }else if ($id == 3){
                  header("location: secretary_home.php");                       //not exists
                }else if ($id == 4){
                  header("location: distributor_home.php");                     //not exists
                }else if ($id == 5){
                  header("location: professor_home.php");                       //not exists
                }
              } else {                                                          //create better messages
                echo '<div style = "font-size:11px; color:#cc0000; margin-top:10px">Your Login Name or Password is invalid</div>';
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
