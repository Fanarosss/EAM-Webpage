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
  $emailSuccess = 0;
  $email = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (!empty($_POST['Email'])){
        $email = test_input($_POST['Email']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email = mysqli_real_escape_string($conn, $_POST['Email']);
          $username = mysqli_real_escape_string($conn, $_SESSION['Username']);
          $query = "UPDATE user SET Email='$email' WHERE Username='$username'";
          $conn->query($query);
          $emailSuccess = 1;
          $_SESSION['Email'] = $email;
        }else{
          $emailErr = '<font size="2" style="color: red">Incorrect email format</font>';
        }
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
          <li class="breadcrumb-item"><a href="http://localhost/student_home.php">Student</a></li>
          <li class="breadcrumb-item active">Settings</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- item 1 on bs2 grid - side bar -->
    <ul class="nav nav-pills flex-column">
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student_home.php">Home</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student_book_sel.php">Book selection</a>
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
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="settings-sep">
      <form method="POST" action="">
        <div class="Settfield">
          <h4><b>Username</b></h4>
          <div class="form-group">
            <fieldset disabled="">
              <font size="2" style="color: red;">You cannot change your username</font>
              <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['Username'];?>" disabled="">
            </fieldset>
          </div>
        </div>
        <div class="Settfield">
          <h4><b>Email</h4>
          <span class="error"><?php echo $emailErr;?></span>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="<?php echo $_SESSION['Email'];?>" name="Email" id="Email">
            <button type="save" name="save-email" class="btn btn-primary btn">Save</button></b>
          </div>
        </div>
        <div class="Settfield" style="margin-bottom: 2em;">
          <h4><b>Password</b></h4>
          <div class="form-group">
            <font size="2">Type old password</font>
            <input type="text" class="form-control" placeholder="*******" id="inputDefault">
          </div>
          <font size="2">In case you forgot your password click <a href="#">HERE</a> and we will send you an E-mail</br></br></font>
          <font size="2">Type new password</font>
          <input type="text" class="form-control" placeholder="" id="inputDefault">
          <font size="2">Confirm new password</font>
          <input type="text" class="form-control" placeholder="" id="inputDefault">
          <button type="save" name="save-email" class="btn btn-primary btn">Save</button></b>
        </div>
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
          <h4><b>University</b></h4>
          <div class="form-group">
            <fieldset disabled="">
              <font size="2" style="color: red;">You cannot change your university</font>
              <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['University'];?>" disabled="">
            </fieldset>
          </div>
        </div>
        <div class="alert alert-dismissible alert-warning">
          <h4 class="alert-heading">Warning!</h4>
          <p class="mb-0">The areas that you can't edit are managed by the secretary of your university.</p>
        </div>
      </form>
      <div class="mymessages" style="margin: 50px">
        <?php
        if (isset($emailSuccess)){
          if ($emailSuccess==1){
            echo '<div class="alert alert-dismissible alert-success">
                    <strong>Well done!</strong> You successfully changed your E-mail.
                  </div>';
            $emailSuccess = 0;
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
