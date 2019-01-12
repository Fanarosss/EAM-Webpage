<?php
   include('./src/session.php');
   include('./src/config.php');

   if (filter_input(INPUT_GET, 'action') == 'delete'){
     foreach($_SESSION['selected_class'] as $key => $book){
       if ($book['id'] == filter_input(INPUT_GET, 'id')){
         unset($_SESSION['selected_class'][$key]);
       }
     }
     //reset session array keys so they match
     $_SESSION['selected_class'] = array_values($_SESSION['selected_class']);
     $_SESSION['class_ids'] = array_column($_SESSION['selected_class'], 'id');
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

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
      <ul class="nav nav-tabs" style="margin-bottom: 2em; display: grid; grid-template-columns: auto auto auto auto auto;">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form1.php" style="padding-left: 2em; padding-right: 2em;">Class Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(!isset($_SESSION['selected_class'])){
            echo 'disabled';
          }else{
            if(isset($_SESSION['selected_class']) && (count($_SESSION['selected_class']) == 0)){
              echo 'disabled';}}?>"
            href="http://localhost/student_new_form2.php" style="padding-left: 2em; padding-right: 2em;">Book Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(!isset($_SESSION['selected_books'])){
            echo 'disabled';
          }else{
            if(isset($_SESSION['selected_books']) && (count($_SESSION['selected_books']) == 0)){
              echo 'disabled';}}?>"
         href="http://localhost/student_new_form3.php" style="padding-left: 2em; padding-right: 2em;">Pickup Point</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="http://localhost/student_new_form4.php" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
        </li>
        <li class="nav-item" style="margin-right: 0px; float: right;">
          <a href="" style="float: right;">
            <button type="button" class="btn btn-primary btn-lg" style="background-color: #046889;">
              <i class="fa fa-book"></i>
              <span class="text">Selected Classes</span>
            </button>
          </a>
        </li>
      </ul>
      </li>
      <div class="selection-cart">
        <?php
        echo '<h2><b>Selected Classes</b></h2>';
        echo '<table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Professor</th>
                  <th scope="col">Code</th>
                  <th scope="col">Semester</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>';
        $count = 0;
        if (isset($_SESSION['selected_class'])){
          while($count < count($_SESSION['selected_class'])){
            $classid = $_SESSION['selected_class'][$count]['id'];
            echo '<tr>
                    <th scope="row">'.$_SESSION['selected_class'][$count]['name'].'</th>
                    <td>'.$_SESSION['selected_class'][$count]['professor'].'</td>
                    <td>'.$_SESSION['selected_class'][$count]['id'].'</td>
                    <td>'.$_SESSION['selected_class'][$count]['semester'].'</td>
                    <td><a class="btn btn-danger btn-sm" href="http://localhost/selected_classes.php?action=delete&id='.$classid.'"><i class="fas fa-trash-alt"></i> Delete</a></td>
                  </tr>';
            $count++;
          }
        }else{
          echo '<tr><p>No classes selected.<p></tr>';
        }
        echo  '</tbody>
              </table>';
        ?>
      </div>
      <a role="button" class="btn btn-primary btn-lg" href="http://localhost/student_new_form1.php">Go back</a>
    </div>
  </div>
</body>
</html>
