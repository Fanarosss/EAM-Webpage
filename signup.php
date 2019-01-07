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
  <?php
    include('./src/config.php');
    $passwordErr = 0;
    $usernameErr = 0;
    $emailErr = 0;
    $success = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $type = mysqli_real_escape_string($conn, $_POST['Type']);
      $user = mysqli_real_escape_string($conn, $_POST['Username']);
      $pass = mysqli_real_escape_string($conn, $_POST['Password']);
      $cpass = mysqli_real_escape_string($conn, $_POST['CPassword']);
      $fname = mysqli_real_escape_string($conn, $_POST['FullName']);
      $email = mysqli_real_escape_string($conn, $_POST['Email']);
      $univ = mysqli_real_escape_string($conn, $_POST['University']);
      if ($pass != $cpass) {
        echo '<div style = "font-size:11px; color:#cc0000; margin-top:10px">Your Passwords do not match!</div>';
        $passwordErr = 1;
      }
      $user_check_query = "SELECT * FROM user WHERE Username='$user' OR Email='$email' LIMIT 1";
      $result = $conn->query($user_check_query);
      $check = mysqli_fetch_assoc($result);
      if ($check) {
        if ($check['Username'] == $user) {
          $usernameErr = 1;
        }
        if ($check['Email'] == $email) {
          $emailErr = 1;
        }
      }
      if ($emailErr == 0 && $passwordErr == 0 && $usernameErr == 0) {
        $user_insert_query = "INSERT INTO user VALUES('$type', '$user', '$pass', '$fname', '$email', '$univ')";
        $conn->query($user_insert_query);
        $success = 1;
      }
    }
  ?>
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
          <?php
          if ($success == 1) {
            echo '<div class="alert alert-dismissible alert-success">
              <strong> You successfully signed up!</strong>You can now <a href="http://localhost/login.php" class="alert-link">log in</a> or go to <a href="http://localhost/index.php" class="alert-link">home page</a>.
            </div>';
          }
          ?>
          <h1 class="display-3">Sign Up</h1>
          <form action="" method="POST">
            <hr class="my-2">
            <div class="form-group">
              <label for="Type">User Type</label>
              <select class="form-control" id="Type" name="Type" value="<?php echo isset($_POST['Type']) ? $_POST['Type'] : '' ?>" required>
                <option disabled selected value>-- Choose Type --</option>
                <option value='1' <?php if (isset($_POST['Type'])) {if($_POST['Type']=='1') echo 'selected="selected"';}?>>Student</option>
                <option value='2' <?php if (isset($_POST['Type'])) {if($_POST['Type']=='2') echo 'selected="selected"';}?>>Publisher</option>
                <option value='3' <?php if (isset($_POST['Type'])) {if($_POST['Type']=='3') echo 'selected="selected"';}?>>Secretary</option>
                <option value='4' <?php if (isset($_POST['Type'])) {if($_POST['Type']=='4') echo 'selected="selected"';}?>>Distributor</option>
                <option value='5' <?php if (isset($_POST['Type'])) {if($_POST['Type']=='5') echo 'selected="selected"';}?>>Professor</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Username">Username</label>
              <?php
              if ($usernameErr == 0){
                echo '<div class="form-group">
                <input type="text" class="form-control" name="Username" id="Username" value="';
                echo isset($_POST['Username']) ? $_POST['Username'] : '';
                echo '" required>';
              }else{
                echo '<div class="form-group has-danger">
                <input type="text" class="form-control is-invalid" name="Username" id="Username" value="';
                echo isset($_POST['Username']) ? $_POST['Username'] : '';
                echo '" required>';
                echo '<font size="2" class="invalid-feedback">Sorry, that username is taken. Try another?</font>';
              }
              ?>
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <?php
              if ($passwordErr == 0){
                echo '<div class="form-group">
                <input type="password" class="form-control" name="Password" id="Password" value="" required>';
              }else{
                echo '<div class="form-group has-danger">
                <input type="password" class="form-control is-invalid" name="Password" id="Password" value="" required>';
                echo '<font size="2" class="invalid-feedback">Passwords do not match!</font>';
              }
              ?>
            </div>
            <div class="form-group">
              <label for="CPassword"> Confirm Password</label>
              <input type="password" class="form-control" name="CPassword" id="CPassword" required>
            </div>
            <div class="form-group">
              <label for="FullName">Full Name</label>
              <input type="text" class="form-control" name="FullName" id="FullName" value="<?php echo isset($_POST['FullName']) ? $_POST['FullName'] : '' ?>"required>
            </div>
            <div class="form-group">
              <label for="Email">Email Address</label>
              <?php
              if ($emailErr == 0){
                echo '<div class="form-group">
                <input type="text" class="form-control" name="Email" id="Email" value="';
                echo isset($_POST['Email']) ? $_POST['Email'] : '';
                echo '" required>';
              }else{
                echo '<div class="form-group has-danger">
                <input type="text" class="form-control is-invalid" name="Email" id="Email" value="';
                echo isset($_POST['Email']) ? $_POST['Email'] : '';
                echo '" required>';
                echo '<font size="2" class="invalid-feedback">Sorry, that e-mail is already being used. Already have an account?</font>';
              }
              ?>
            </div>
            <div class="form-group">
              <label for="University">University</label>
              <input type="text" class="form-control" name="University" id="University" value="<?php echo isset($_POST['University']) ? $_POST['University'] : '' ?>">
            </div>
            <hr class="my-4">
            <button type="submit" name="SignUp" class="btn btn-primary">Submit</button>
            <a href="http://localhost/index.php">
               <input type="button" class="btn btn-primary" style="background-color: red;" value="Cancel" />
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
