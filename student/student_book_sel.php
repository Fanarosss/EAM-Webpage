<?php
   include('../src/session.php');
   include('../src/config.php');
   $form_completed = 0;
   if(isset($_POST['checkout'])){
     if(isset($_SESSION['Editing_Form'])){
       $query4 = "DELETE FROM form_has_book WHERE Form_id = '".$_SESSION['Editing_Form']."'";
       $conn->query($query4);
       $query5 = "DELETE FROM form WHERE Id = '".$_SESSION['Editing_Form']."'";
       $conn->query($query5);
     }
     $year = date('Y');
     $date = date('Y-m-d h:i:s');
	   $ended = 0;
     $username = mysqli_real_escape_string($conn, $_SESSION['Username']);
     $period = mysqli_real_escape_string($conn, $_SESSION['Period']);
     $query = "INSERT INTO form (User_id, Semester, Year, LastEdit, Ended) VALUES ('$username','$period','$year','$date','$ended')";
     $conn->query($query);
     $query2 = "SELECT * FROM form WHERE User_id = '$username' AND Ended = 0";
     $result = $conn->query($query2);
     $row = $result->fetch_assoc();
     $formid = $row['Id'];
     $count = 0;
     foreach($_SESSION['selected_books'] as $key => $book){
       $query = "INSERT INTO form_has_book (Form_id, Book_id, Class_id, PPoint) VALUES ('".$formid."','".$book['id']."','".$book['for_class']."', '".$_SESSION['selected_distrib'][$count]."')";
       $conn->query($query);
       $count++;
     }
     $form_completed = 1;
     unset($_POST['checkout']);
     unset($_SESSION['Editing_Form']);
   }

   if(isset($_POST['Cancel'])){
     unset($_POST['Cancel']);
     unset($_SESSION['Editing_Form']);
     unset($_SESSION['selected_class']);
     unset($_SESSION['selected_books']);
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
  <?php
  if($form_completed == 1){
    echo '<div class="alert alert-dismissible alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Well done!</strong> Your new form was saved with success. Check your e-mail for the PIN!!!</a>.
         </div>';
  }
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.0/js/bootstrap.min.js"></script>
  <!-- grid class containing all items -->
  <div class="bs1-grid">
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
            <a href="http://localhost/general/logout.php">
              <button class="dropbtn">Logout</button>
            </a>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="http://localhost/student/student_home.php">Student</a></li>
          <li class="breadcrumb-item active">SELECT</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- item 1 on bs2 grid - side bar -->
    <ul class="nav nav-pills flex-column">
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student/student_home.php">Home</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link active" href="http://localhost/student/student_book_sel.php">Book selection</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student/student_book_list.php">Book List</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student/student_faq.php">FAQ</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/student/student_manual.php">Manual</a>
      </li>
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="Book-Selection-Forms">
      <div class="CurrForm">
        <h5 style="margin-bottom: 0.5em;"><b>Current Semester Form:</b></h5>
        <a href="http://localhost/student/student_new_form1.php" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
            <?php
            $query2 = "SELECT form.Id, form.Semester, form.Year, form.LastEdit FROM user, form WHERE user.Username = '".$_SESSION['Username']."' AND user.Username = form.User_id AND form.Ended = 0";
            $result2 = $conn->query($query2);
            if (!$result2) die($conn->error);
            if (mysqli_num_rows($result2) > 0) {
              $row2 = $result2->fetch_assoc();
              echo '<h5 class="mb-1">Book Selection for Semester.</h5>
                    <small>'.$row2['LastEdit'].'.</small>
                  </div>
                  <p class="mb-1">'.$row2['Semester'].' Book Selection.</p>
                  <small>Click here to modify your choices.</small>';
            }else{
              echo '<h5 class="mb-1">Create new form.</h5>
                    <small>No edit.</small>
                  </div>
                  <p class="mb-1">Book Selection.</p>
                  <small>Click here to create a new form.</small>';
            }
            ?>
        </a>
      </div>
      <div class="OldForm">
        <h5 style="margin-bottom: 0.5em;"><b>Old Semester Forms:</b></h5>
        <?php
        $query = "SELECT form.Id, form.Semester, form.Year FROM user, form WHERE user.Username = '".$_SESSION['Username']."' AND user.Username = form.User_id AND form.Ended = 1 ORDER BY form.Id DESC";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        if (mysqli_num_rows($result) > 0) {
          while($row = $result->fetch_assoc()){
            echo '<a href="http://localhost/student/old_form.php?id='.$row['Id'].'" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">'.$row['Semester'].' '.$row['Year'].'</h5>
                  <small class="text-muted">Cannot be edited.</small>
                  </div>
                  <p class="mb-1">Book selection.</p>
                  <small class="text-muted">Click here to review.</small>
                  </a>';
          }
        }else{
          echo 'This is your first semester on the platform.';
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
