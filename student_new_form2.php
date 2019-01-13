<?php
   include('./src/session.php');
   include('./src/config.php');
   //Implementation similar to shoping cart
   $SingleBook = 0;
   $DuplicateBook = 0;
   if(filter_input(INPUT_POST, 'add_to_selected')) {
     if(isset($_SESSION['selected_books'])){
       //counter for books inside
       $count = count($_SESSION['selected_books']);
       //to match array keys and book ids
       $_SESSION['book_ids'] = array_column($_SESSION['selected_books'], 'id');
       $selected = array_column($_SESSION['selected_books'], 'for_class');

       //check if it already exists inside array
       if(in_array(filter_input(INPUT_POST, 'For_class'), $selected)){
         $SingleBook = 1;
       }else if (!in_array(filter_input(INPUT_GET, 'id'), $_SESSION['book_ids'])) {
         $_SESSION['selected_books'][$count] = array
         (
           'id' => filter_input(INPUT_GET, 'id'),
           'title' => filter_input(INPUT_POST, 'Title'),
           'author' => filter_input(INPUT_POST, 'Author'),
           'publications' => filter_input(INPUT_POST, 'Publications'),
           'for_class' => filter_input(INPUT_POST, 'For_class')
         );
       }else {
         //if it already exists possibly print an error message.
         $DuplicateBook = 1;
       }
     }else{ //if selected doesnt exist, create first product with array key 0
       $_SESSION['selected_books'][0] = array
       (
         'id' => filter_input(INPUT_GET, 'id'),
         'title' => filter_input(INPUT_POST, 'Title'),
         'author' => filter_input(INPUT_POST, 'Author'),
         'publications' => filter_input(INPUT_POST, 'Publications'),
         'for_class' => filter_input(INPUT_POST, 'For_class')
       );
     }
     $selected = array_column($_SESSION['selected_books'], 'for_class');
     $_SESSION['book_ids'] = array_column($_SESSION['selected_books'], 'id');
   }
   /*echo '<pre>';
   print_r($_SESSION);
   echo '</pre>';*/
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
  <script type="text/javascript" src="./js/scripts.js"></script>
  <!-- grid class containing all items -->
  <?php
    if ($SingleBook == 1){
      echo '<div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Already selected book for this class</strong>
            </div>';
      $SingleBook = 0;
    }
    if ($DuplicateBook == 1){
      echo '<div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>You have already selected this book for another class</strong>
            </div>';
      $DuplicateBook = 0;
    }
  ?>
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
        <a class="nav-link" href="http://localhost/student_manual.php">Manual</a>
      </li>
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="Book-Selection-Forms">
      <ul class="nav nav-tabs" style="margin-bottom: 2em; display: grid; grid-template-columns: auto auto auto auto auto;">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form1.php" style="padding-left: 2em; padding-right: 2em;">Class Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="" style="padding-left: 2em; padding-right: 2em;">Book Selection</a>
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
          <a href="http://localhost/selected_books.php" style="float: right;">
            <button type="button" class="btn btn-primary btn-lg">
              <i class="fa fa-book"></i>
              <span class="text">Selected Books</span>
            </button>
          </a>
        </li>
      </ul>
      <div class="class-select">
        <?php
        include('./src/config.php');
        if (isset($_SESSION['selected_class'])) {
          $count = 0;
          while($count < count($_SESSION['selected_class'])){
            echo '<h3><b><u>'.$_SESSION['selected_class'][$count]['name'].'</b></u></br></h3>';
            $query = "SELECT class.Id AS Id, book.Title, book.Author, book.Publications, book.ISBN,book.Id as BId FROM class,class_has_choice,book WHERE class.Id = '".$_SESSION['selected_class'][$count]['id']."' AND class_has_choice.Class_id = class.Id
            AND class_has_choice.Book_id = book.Id ORDER BY book.Title ASC";
            $result = $conn->query($query);
            if (!$result) die($conn->error);
            //search for forms with this class as selected
            $query2 = "SELECT * FROM form, form_has_book WHERE form_has_book.Class_id = '".$_SESSION['selected_class'][$count]['id']."' AND form.User_id = '".$_SESSION['Username']."'
                         AND form_has_book.Form_id = form.Id AND form.Ended = 1";
            $result2 = $conn->query($query2);
            if (!$result2) die($conn->error);
            echo '<div class="cart-container">';
            if (mysqli_num_rows($result2) > 0){
              echo '<h5>You have already gotten a book for this class<h5>';
            } else if ((mysqli_num_rows($result) > 0)) {
              while($row = $result->fetch_assoc()){
                echo '<div class="myshop-item"';
                      if(isset($_SESSION['selected_books'])){
                        if (in_array($row['BId'], $_SESSION['book_ids'])) {
                          $found = 0;
                          foreach($_SESSION['selected_books'] as $key => $tbook){
                            if (($_SESSION['selected_class'][$count]['id'] == $tbook['for_class']) && ($row['BId'] == $tbook['id'])){
                              echo ' style="background-color: #eee;"><i class="fas fa-check-circle" style="color: #2ea0c9"></i>';
                              $found = 1;
                            }
                          }
                          if ($found == 0){
                            echo '>';
                          }
                      }else{
                        echo '>';
                      }
                    }else{
                      echo '>';
                    }
                echo '<div class="btn">
                        <input class="myButton view_data" title="Click to view book preview" type="submit" data-toggle="modal" data-target="#myModal" id="'.$row['ISBN'].'" value="'.$row['Title'].'">
                      </div>
                      <form method="post" action="http://localhost/student_new_form2.php?action=add&id='.$row['BId'].'">
                            <input type="hidden" name="Title" value="'.$row['Title'].'"/>
                            <input type="hidden" name="Author" value="'.$row['Author'].'"/>
                            <input type="hidden" name="Publications" value="'.$row['Publications'].'"/>
                            <input type="hidden" name="For_class" value="'.$row['Id'].'"/>
                            <input type="submit" name="add_to_selected" class="button-hover-addcart button" value="Add to selected"/>
                      </form>
                      </div>';
                echo '<!-- Modal -->
                      <div class="modal fade" id="dataModal" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header" id="book_header">
                            </div>
                            <div class="modal-body" id="book_details">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                        </div>
                      </div>';
              }
            }else{
              echo 'No books available.';
            }
            echo '</div>';
            $count++;
          }
        }else{
          echo 'No classes available.';
        }
        ?>
      </div>
      <form method="post" action="http://localhost/student_book_sel.php">
        <a role="button" class="btn btn-primary btn-lg <?php if(!isset($_SESSION['selected_books'])){
        echo 'disabled';
      }else{
        if(isset($_SESSION['selected_books']) && (count($_SESSION['selected_books']) == 0)){
          echo 'disabled';}}?>"
        style="margin-top: 2em;" href="http://localhost/student_new_form3.php">Proceed</a>
        <input type="hidden" name="Cancel" value="unset"/>
        <button type="submit" class="btn btn-danger btn-lg" style="margin-top: 2em;">Cancel</a>
      </form>
    </div>
  </div>
</body>
</html>
