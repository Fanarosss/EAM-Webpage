<?php
  include('./src/session.php');
  include('./src/config.php');
  //Implementation similar to shoping cart

  if(!isset($_SESSION['Editing_Form'])){
    $query = "SELECT * FROM form WHERE form.User_id = '".$_SESSION['Username']."' AND form.Ended = 0";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    if (mysqli_num_rows($result) > 0) {
      $row = $result->fetch_assoc();
      $query2 = "SELECT * FROM class, form_has_book WHERE form_has_book.Form_id = '".$row['Id']."' AND form_has_book.Class_id = class.Id";
      $result2 = $conn->query($query2);
      $count = 0;
      $count2 = 0;
      while($row2 = $result2->fetch_assoc()){
        $_SESSION['selected_class'][$count] = array
        (
         'id' => $row2['Id'],
         'name' => $row2['Name'],
         'professor' => $row2['Professor'],
         'semester' => $row2['Semester']
        );
        $count++;
        $query3 = "SELECT * FROM book, form_has_book WHERE form_has_book.Form_id = '".$row['Id']."' AND form_has_book.class_id = '".$row2['Id']."'
                  AND book.Id = form_has_book.Book_id";
        $result3 = $conn->query($query3);
        while($row3 = $result3->fetch_assoc()){
          $_SESSION['selected_books'][$count2] = array
          (
            'id' => $row3['Id'],
            'title' => $row3['Title'],
            'author' => $row3['Author'],
            'publications' => $row3['Publications'],
            'for_class' => $row2['Id']
          );
          $count2++;
        }
      }
      $_SESSION['class_ids'] = array_column($_SESSION['selected_class'], 'id');
      $_SESSION['book_ids'] = array_column($_SESSION['selected_books'], 'id');
      $selected = array_column($_SESSION['selected_books'], 'for_class');
      $_SESSION['Editing_Form'] = $row['Id'];

    }
  }

   if(filter_input(INPUT_POST, 'add_to_selected')) {
     if(isset($_SESSION['selected_class'])){
       //counter for classes inside
       $count = count($_SESSION['selected_class']);
       //to match array keys and class ids
       $_SESSION['class_ids'] = array_column($_SESSION['selected_class'], 'id');

       //check if it already exists inside array
       if (!in_array(filter_input(INPUT_GET, 'id'), $_SESSION['class_ids'])) {
         $_SESSION['selected_class'][$count] = array
         (
           'id' => filter_input(INPUT_GET, 'id'),
           'name' => filter_input(INPUT_POST, 'Name'),
           'professor' => filter_input(INPUT_POST, 'Professor'),
           'semester' => filter_input(INPUT_POST, 'Semester')
         );
       }else{
         //if it already exists possibly print an error message.
       }
     }else{ //if selected doesnt exist, create first product with array key 0
       $_SESSION['selected_class'][0] = array
       (
         'id' => filter_input(INPUT_GET, 'id'),
         'name' => filter_input(INPUT_POST, 'Name'),
         'professor' => filter_input(INPUT_POST, 'Professor'),
         'semester' => filter_input(INPUT_POST, 'Semester')
       );
     }
     $_SESSION['class_ids'] = array_column($_SESSION['selected_class'], 'id');
   }

   /*echo '<pre>';
   print_r($class_ids);
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
        <a class="nav-link" href="http://localhost/student_manual.php" target="_blank">Manual</a>
      </li>
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="Book-Selection-Forms">
      <ul class="nav nav-tabs" style="margin-bottom: 2em; display: grid; grid-template-columns: auto auto auto auto auto;">
        <li class="nav-item">
          <a class="nav-link active" href="" style="padding-left: 2em; padding-right: 2em;">Class Selection</a>
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
          <a href="http://localhost/selected_classes.php" style="float: right;">
            <button type="button" class="btn btn-primary btn-lg">
              <i class="fa fa-book"></i>
              <span class="text">Selected Classes</span>
            </button>
          </a>
        </li>
      </ul>

      <div class="class-select">
        <?php
        if (isset($_SESSION['Period']) && ($_SESSION['Period'] == 'Winter')){
          echo '<div class="panel-group" id="accordion" style="display:grid;">';
          echo '<div class="panel panel-default">
                <div class="panel-heading" style="margin-top: 2em;">
                  <h4 class="panel-title">
                    <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h3><b>Winter Period:</b></h3></button>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">';
          for ($semid = 1; $semid <=7; $semid+=2) {
            $query = "SELECT * FROM class,student WHERE student.Username = '".$_SESSION['Username']."' AND student.Department_id = class.Department_id
                      AND Period = 'Winter' AND Semester='".$semid."' ORDER BY class.Name ASC";
            $result = $conn->query($query);
            if (!$result) die($conn->error);
            echo '<div class="panel panel-default">
                  <div class="panel-heading" style="margin-top: 2em;">
                    <h4 class="panel-title">
                      <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapsew1'.$semid.'"><h3><b>Semester '.$semid.':</b></h3></button>
                    </h4>
                  </div>
                  <div id="collapsew1'.$semid.'" class="panel-collapse collapse in">
                  <div class="cart-container">';
            if (mysqli_num_rows($result) > 0) {
              while($row = $result->fetch_assoc()){
                echo '<div class="myshop-item"';
                      if(isset($_SESSION['selected_class'])){
                        if (in_array($row['Id'], $_SESSION['class_ids'])) {
                          echo ' style="background-color: #eee;"><i class="fas fa-check-circle" style="color: #2ea0c9"></i>';
                      }else{
                        echo '>';
                      }
                    }else{
                      echo '>';
                    }
                echo  '<div class="btn">
                      <input class="myButton view_info" type="submit" data-toggle="modal" data-target="#myModal" id="'.$row['Id'].'" value="'.$row['Name'].'">
                      </div>
                      <form method="post" action="http://localhost/student_new_form1.php?action=add&id='.$row['Id'].'">
                      <input type="hidden" name="Name" value="'.$row['Name'].'"/>
                      <input type="hidden" name="Professor" value="'.$row['Professor'].'"/>
                      <input type="hidden" name="Semester" value="'.$row['Semester'].'"/>
                      <input type="submit" name="add_to_selected" class="button-hover-addcart button" value="Add to selected"/>
                      </form>
                      </div>';

              }
            }else{
              echo '<p>No classes available.<p>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<!-- Modal -->
                  <div class="modal fade" id="dataModal" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header" id="class_header">
                        </div>
                        <div class="modal-body" id="class_details">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>';
          }
          echo '</div>';
          echo '</div>';
        }
        if (isset($_SESSION['Period']) && ($_SESSION['Period'] == 'Summer')){
          echo '<div class="panel-group" id="accordion" style="display:grid;">';
          echo '<div class="panel panel-default">
                <div class="panel-heading" style="margin-top: 2em;">
                  <h4 class="panel-title">
                    <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><h3><b>Summer Period:</b></h3></button>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse in">';
          for ($semid = 2; $semid <=8; $semid+=2) {
            $query = "SELECT * FROM class,student WHERE student.Username = '".$_SESSION['Username']."' AND student.Department_id = class.Department_id
                      AND Period = 'Summer' AND Semester='".$semid."' ORDER BY class.Name ASC";
            $result = $conn->query($query);
            if (!$result) die($conn->error);
            echo '<div class="panel panel-default">
                  <div class="panel-heading" style="margin-top: 2em;">
                    <h4 class="panel-title">
                      <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapses1'.$semid.'"><h3><b>Semester '.$semid.':</b></h3></button>
                    </h4>
                  </div>
                  <div id="collapses1'.$semid.'" class="panel-collapse collapse in">
                  <div class="cart-container">';
            if (mysqli_num_rows($result) > 0) {
              while($row = $result->fetch_assoc()){
                echo '<div class="myshop-item"';
                      if(isset($_SESSION['selected_class'])){
                        if (in_array($row['Id'], $_SESSION['class_ids'])) {
                          echo ' style="background-color: #eee;"><i class="fas fa-check-circle" style="color: #2ea0c9"></i>';
                      }else{
                        echo '>';
                      }
                    }else{
                      echo '>';
                    }
                echo '<div class="btn">
                        <input class="myButton view_info" type="submit" data-toggle="modal" data-target="#myModal" id="'.$row['Id'].'" value="'.$row['Name'].'">
                      </div>
                      <form method="post" action="http://localhost/student_new_form1.php?action=add&id='.$row['Id'].'">
                      <input type="hidden" name="Name" value="'.$row['Name'].'">
                      <input type="hidden" name="Professor" value="'.$row['Professor'].'"/>
                      <input type="hidden" name="Semester" value="'.$row['Semester'].'"/>
                      <input type="submit" name="add_to_selected" class="button-hover-addcart button" value="Add to selected"/>
                      </form>
                      </div>';
              }
            }else{
              echo 'No classes available.';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<!-- Modal -->
                  <div class="modal fade" id="dataModal" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header" id="class_header">
                        </div>
                        <div class="modal-body" id="class_details">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>';
          }
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
        ?>
      </div>
      <div class="button-row" style="max-height: ;">
        <form method="post" action="http://localhost/student_book_sel.php">
          <a role="button" class="btn btn-primary btn-lg <?php if(!isset($_SESSION['selected_class'])){
          echo 'disabled';
        }else{
          if(isset($_SESSION['selected_class']) && (count($_SESSION['selected_class']) == 0)){
            echo 'disabled';}}?>"
          style="margin-top: 2em;" href="http://localhost/student_new_form2.php">Proceed</a>
          <input type="hidden" name="Cancel" value="unset"/>
          <button type="submit" class="btn btn-danger btn-lg" style="margin-top: 2em;">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
