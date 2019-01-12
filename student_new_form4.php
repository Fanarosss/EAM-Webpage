<?php
   include('./src/session.php');
   include('./src/config.php');
   //Implementation similar to shoping cart

   if(filter_input(INPUT_POST, 'select_type')) {
     $count = 0;
     foreach($_SESSION['selected_books'] as $book){
       //It is 0 for distribution point and 1 for students
       $_SESSION['selected_distrib'][$count] = filter_input(INPUT_POST, 'optionsRadios'.$count.'');
       $count++;
     }
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
          <a class="nav-link" href="http://localhost/student_new_form2.php" style="padding-left: 2em; padding-right: 2em;">Book Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form3.php" style="padding-left: 2em; padding-right: 2em;">Pickup Point</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
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
      <div class="Confirmation-container">
        <?php
        $counter = 0;
        foreach($_SESSION['selected_books'] as $key => $book){
          $query = "SELECT * FROM class WHERE class.Id = '".$book['for_class']."'";
          $result = $conn->query($query);
          $tclass = $result->fetch_assoc();
          $query2 = "SELECT * FROM user, distributor, book, user_has WHERE book.Id = '".$book['id']."' AND user.Username = user_has.User_id
                    AND user_has.Book_id = book.Id AND user.Id = 4";
          $result2 = $conn->query($query2);
          $distributοr = $result2->fetch_assoc();
          echo '<div class="BookPreview">
                  <div class="BookInfo">
                    <h3><b>'.$book['title'].'</b></h3>
                    <h5>Selected for class '.$tclass['Name'].'</h5></br>
                    <h5>Author: '.$book['author'].'</h5>
                    <h5>Publications: '.$book['publications'].'</h5></br>
                  </div>';
          if ($_SESSION['selected_distrib'][$counter] == 0){
            echo '<div class="DistribInfo">
                    <h5>Distribution Point: '.$distributοr['FullName'].'</h5>
                    <div class="mymap">
                      <img src="https://developers.google.com/maps/documentation/urls/images/map-no-params.png" style="max-width:400px; max-height: 350px;">
                    </div>
                    <div class="dinfo">
                      <p class="text-muted">Address: '.$distributοr['Address'].'</p>
                      <p class="text-muted">Phone: '.$distributοr['Phone'].'</p>
                    </div>
                  </div>
                </div>';
          }else{
            echo '<div class="StudentInfo">
                    <h3>Book exchange arranged with fellow student.</h3>
                </div>
              </div>';
          }
          $counter++;
        }
        ?>
      </div>
      <form method="post" action="http://localhost/student_book_sel.php">
        <input type="hidden" name="checkout" id="checkout" value="1"/>
        <button type="save" name="save-form" class="btn btn-primary btn-lg">Confirm</button>
      </form>
    </div>
  </div>
</body>
</html>
