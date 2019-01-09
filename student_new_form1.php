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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.0/js/bootstrap.min.js"></script>
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
          <li class="breadcrumb-item"><a href="http://localhost/student_book_sel.php">Select</a></li>
          <li class="breadcrumb-item active">New Form</li>
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
        <a class="nav-link active" href="http://localhost/student_book_sel.php">Book selection</a>
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
    <div class="Book-Selection-Forms">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="" style="padding-left: 2em; padding-right: 2em;">Class Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form2.php" style="padding-left: 2em; padding-right: 2em;">Book Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form3.php" style="padding-left: 2em; padding-right: 2em;">Pickup Point</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form4.php" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
        </li>
      </ul>

      <div class="class-select">
        <?php
        include('./src/config.php');
        $query = "SELECT * FROM class,student WHERE student.Username = '".$_SESSION['Username']."' AND student.Department_id = class.Department_id
                  AND Period = 'Winter' ORDER BY class.Name ASC";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        echo '<div class="panel-group" id="accordion" style="display:grid;">';
        echo '<div class="panel panel-default">
              <div class="panel-heading" style="margin-top: 2em;">
                <h4 class="panel-title">
                  <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h3><b>Winter Period:</b></h3></button>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">';
        if (mysqli_num_rows($result) > 0) {
          while($row = $result->fetch_assoc()){
            echo '<div class="btn">';
            echo '<input class="myButton" type="submit" value="'.$row['Name'].'">';
            echo '</div>';
          }
        }else{
          echo 'No classes available.';
        }
        echo '</div>';
        echo '</div>';
        $query = "SELECT * FROM class,student WHERE student.Username = '".$_SESSION['Username']."' AND student.Department_id = class.Department_id
                  AND Period = 'Summer' ORDER BY class.Name ASC";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        echo '<div class="panel panel-default">
              <div class="panel-heading" style="margin-top: 2em;">
                <h4 class="panel-title">
                  <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><h3><b>Summer Period:</b></h3></button>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse in">';
        if (mysqli_num_rows($result) > 0) {
          while($row = $result->fetch_assoc()){
            echo '<div class="btn">';
            echo '<input class="myButton" type="submit" value="'.$row['Name'].'">';
            echo '</div>';
          }
        }else{
          echo 'No classes available.';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        ?>
      </div>
      <button type="button" class="btn btn-primary btn-lg" style="margin-top: 2em;">Proceed</button>
    </div>
  </div>
</body>
</html>
