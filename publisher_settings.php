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
  <?php
  include('./src/config.php');
  $emailErr = "";
  $passErr = "";
  $phoneErr = "";
  $passwordSuccess = 0;
  $addressSuccess = 0;
  $emailSuccess = 0;
  $phoneSuccess = 0;
  $email = "";
  $phone = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (!empty($_POST['Password']) && !empty($_POST['CPassword'])){
        $password = test_input($_POST['Password']);
        $cpassword = test_input($_POST['CPassword']);
        if ($password == $cpassword) {
          $password = mysqli_real_escape_string($conn, $_POST['Password']);
          $username = mysqli_real_escape_string($conn, $_SESSION['Username']);
          $query = "UPDATE user SET Password='$password' WHERE Username='$username'";
          $conn->query($query);
          $passwordSuccess = 1;
        }else{
          $passErr = '<font size="2" style="color: red">Not matching passwords</font>';
        }
        unset($_POST['Password']);
        unset($_POST['CPassword']);
      }

      if (!empty($_POST['Address'])){
        $address = mysqli_real_escape_string($conn, $_POST['Address']);
        $username = mysqli_real_escape_string($conn, $_SESSION['Username']);
        $query = "UPDATE publisher SET Address='$address' WHERE Username='$username'";
        $conn->query($query);
        $addressSuccess = 1;
        $_SESSION['Address'] = $address;
        unset($_POST['Address']);
      }

      if (!empty($_POST['Email'])){
        $email = test_input($_POST['Email']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email = mysqli_real_escape_string($conn, $_POST['Email']);
          $username = mysqli_real_escape_string($conn, $_SESSION['Username']);
          $email_check_query = "SELECT * FROM user WHERE Username!='$username' AND Email='$email' LIMIT 1";
          $result = $conn->query($email_check_query);
          $check = mysqli_fetch_assoc($result);
          if (!$check) {
            $query = "UPDATE user SET Email='$email' WHERE Username='$username'";
            $conn->query($query);
            $emailSuccess = 1;
            $_SESSION['Email'] = $email;
          }else{
            $emailErr = '<font size="2" style="color: red">This email is taken</font>';
          }
        }else{
          $emailErr = '<font size="2" style="color: red">Incorrect email format</font>';
        }
        unset($_POST['Email']);
      }

      if (!empty($_POST['Phone'])){
        $phone = preg_replace('/[^0-9]/', '', $_POST['Phone']);
        if(strlen($phone) === 10) {
          $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
          $username = mysqli_real_escape_string($conn, $_SESSION['Username']);
          $query = "UPDATE user SET Phone='$phone' WHERE Username='$username'";
          $conn->query($query);
          $phoneSuccess = 1;
          $_SESSION['Phone'] = $phone;
        }else{
          $phoneErr = '<font size="2" style="color: red">Incorrect phone format</font>';
        }
        unset($_POST['Phone']);
      }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
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
          <li class="breadcrumb-item"><a href="http://localhost/publisher_home.php">Publisher</a></li>
          <li class="breadcrumb-item active">Settings</li>
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
        <a class="nav-link" href="http://localhost/publisher_manual.php" target="_blank">Manual</a>
      </li>
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="settings-sep">
      <form method="POST" action="">
        <div class="Settfield">
          <h4><b>Full Name</b></h4>
          <div class="form-group">
            <fieldset disabled="">
              <font size="2" style="color: red;">You cannot change your full name</font>
              <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['FullName'];?>" disabled="">
            </fieldset>
          </div>
        </div>
        <div class="Settfield">
          <h4><b>Username</b></h4>
          <div class="form-group">
            <fieldset disabled="">
              <font size="2" style="color: red;">You cannot change your username</font>
              <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['Username'];?>" disabled="">
            </fieldset>
          </div>
        </div>
        <div class="Settfield" style="margin-bottom: 2em;">
          <h4><b>Password</b></h4>
          <font size="2">In case you forgot your password click <a href="#">HERE</a> and we will send you an E-mail</br></font>
          <span class="error"><?php echo $passErr;?></br></span>
          <font size="2">Type new password</font>
          <input type="password" class="form-control" placeholder="" id="Password" name="Password">
          <font size="2">Confirm new password</font>
          <input type="password" class="form-control" placeholder="" id="CPassword" name="CPassword">
          <button type="save" name="save-pass" class="btn btn-primary btn" style="margin-top:10px">Save</button></b>
        </div>
        <div class="Settfield">
          <h4><b>Address</h4>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="<?php echo $_SESSION['Address'];?>" name="Address" id="Address">
            <button type="save" name="save-address" class="btn btn-primary btn" style="margin-top:10px">Save</button></b>
          </div>
        </div>
        <div class="Settfield">
          <h4><b>Email</h4>
          <span class="error"><?php echo $emailErr;?></span>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="<?php echo $_SESSION['Email']; ?>" name="Email" id="Email">
            <button type="save" name="save-email" class="btn btn-primary btn" style="margin-top:10px">Save</button></b>
          </div>
        </div>
        <div class="Settfield">
          <h4><b>Phone</b></h4>
          <span class="error"><?php echo $phoneErr;?></span>
          <div class="form-group">
            <input class="form-control" type="text" name="Phone" id="Phone" placeholder="<?php echo $_SESSION['Phone'];?>">
            <button type="save" name="save-phone" class="btn btn-primary btn" style="margin-top:10px">Save</button></b>
          </div>
        </div>
        <div class="Settfield">
          <h4><b>Date Added</b></h4>
          <div class="form-group">
            <fieldset disabled="">
              <font size="2" style="color: red;">You cannot change your Addition Date</font>
              <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['Date'];?>" disabled="">
            </fieldset>
          </div>
        </div>
        <div class="alert alert-dismissible alert-warning">
          <h4 class="alert-heading">Warning!</h4>
          <p class="mb-0">The areas that you can't edit are managed by Eudoxus.</p>
        </div>
      </form>
      <div class="mymessages" style="margin: 50px">
        <?php

        if (isset($passwordSuccess)){
          if ($passwordSuccess==1){
            echo '<div class="alert alert-dismissible alert-success">
                    <strong>Well done!</strong> You successfully changed your Password.
                  </div>';
            $passwordSuccess = 0;
          }
        }

        if (isset($addressSuccess)){
          if ($addressSuccess==1){
            echo '<div class="alert alert-dismissible alert-success">
                    <strong>Well done!</strong> You successfully changed your Address.
                  </div>';
            $addressSuccess = 0;
          }
        }

        if (isset($emailSuccess)){
          if ($emailSuccess==1){
            echo '<div class="alert alert-dismissible alert-success">
                    <strong>Well done!</strong> You successfully changed your E-mail.
                  </div>';
            $emailSuccess = 0;
          }
        }

        if (isset($phoneSuccess)){
          if ($phoneSuccess==1){
            echo '<div class="alert alert-dismissible alert-success">
                    <strong>Well done!</strong> You successfully changed your Phone.
                  </div>';
            $phoneSuccess = 0;
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
