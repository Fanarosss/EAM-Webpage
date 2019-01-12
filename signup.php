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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/options.js"></script>
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
      $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
      if ($pass != $cpass) {
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
        $user_insert_query = "INSERT INTO user VALUES('$type', '$user', '$pass', '$fname', '$email', '$phone')";
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
              <strong> You successfully signed up!</strong>You can now log in from <a href="http://localhost/index.php" class="alert-link">home page</a>.
            </div>';
          }
          ?>
          <h1 class="display-3">Sign Up</h1>
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
              <input type="text" class="form-control" name="FullName" id="FullName" value="<?php echo isset($_POST['FullName']) ? $_POST['FullName'] : '' ?>" required>
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
              <label for="Phone">Phone Number</label>
              <input type="tel" class="form-control" id="Phone" value="<?php echo isset($_POST['Phone']) ? $_POST['Phone'] : '' ?>"required>
            </div>
            <div class="form-group">
              <label for="University">University</label>
              <select class="form-control" id="University" name="University" onChange="getDepartments(this.value);" required>
                <option disabled selected value>-- Choose University --</option>
                <?php
                $query = "SELECT * from university where 1";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()){
                  echo '<option value='.$row['Id'].'>'.$row['Name'].'</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="Department">Department</label>
              <select class="form-control" id="department-list" name="department" required>
                <option disabled selected value="">-- Choose Department --</option>
              </select>
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
