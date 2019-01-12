<?php
   include('./src/session.php');
   include('./src/config.php');
   $form_completed = 0;
   if(isset($_POST['checkout'])){
     if(isset($_SESSION['Editing_Form'])){
       $query4 = "DELETE FROM form_has_book WHERE Form_id = '".$_SESSION['Editing_Form']."'";
       $conn->query($query4);
       $query5 = "DELETE FROM form WHERE Id = '".$_SESSION['Editing_Form']."'";
       $conn->query($query5);
     }
     $year = date('Y');
     $date = date('Y-m-d h:i:sa');
     $query = "INSERT INTO form(User_id, Semester, Year, LastEdit, Ended) VALUES ('".$_SESSION['Username']."','".$_SESSION['Period']."','".$year."','".$date."',0)";
     $conn->query($query);
     $query2 = "SELECT * FROM form WHERE User_id = '".$_SESSION['Username']."' AND Ended = 0";
     $result = $conn->query($query2);
     $row = $result->fetch_assoc();
     $formid = $row['Id'];
     foreach($_SESSION['selected_books'] as $key => $book){
       $query = "INSERT INTO `form_has_book`(`Form_id`, `Book_id`, `Class_id`) VALUES ('".$formid."','".$book['id']."','".$book['for_class']."')";
       $conn->query($query);
     }
     $form_completed = 1;
     unset($_POST['checkout']);
     unset($_SESSION['Editing_Form']);
   }

   if(isset($_POST['Cancel'])){
     unset($_POST['Cancel']);
     unset($_SESSION['Editing_Form']);
   }
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
          <li class="breadcrumb-item active">SELECT</li>
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
      <div class="CurrForm">
        <h5 style="margin-bottom: 0.5em;"><b>Current Semester Form:</b></h5>
        <a href="http://localhost/student_new_form1.php" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Book Selection for Semester.</h5>
            <small>Last Edit.</small>
          </div>
          <p class="mb-1">Book Selection for Semester.</p>
          <small>Click here to create or modify your choices.</small>
        </a>
      </div>
      <div class="OldForm">
        <h5 style="margin-bottom: 0.5em;"><b>Old Semester Forms:</b></h5>
        <?php
        include('./src/config.php');
        $query = "SELECT form.Id, form.Semester, form.Year FROM user, form WHERE user.Username = '".$_SESSION['Username']."' AND user.Username = form.User_id AND form.Ended = 1 ORDER BY form.Id DESC";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        if (mysqli_num_rows($result) > 0) {
          while($row = $result->fetch_assoc()){
            echo '<a href="http://localhost/old_form.php?id='.$row['Id'].'" class="list-group-item list-group-item-action flex-column align-items-start">
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
