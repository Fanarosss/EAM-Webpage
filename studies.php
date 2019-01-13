<?php
   include('./src/session.php');
   include('./src/config.php');
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
              <li class="nav-item active">
                <a class="nav-link" href="http://localhost/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/contact.php">Contact</a>
              </li>
            </ul>
            <?php
              if(!isset($_SESSION['Id'])) {
                echo '<div class="mydropdown">';
                  echo '<button class="dropbtn" style="width: 110px;">Login</button>';
                  echo '<div class="mydropdown-content" style="width: 110px;">';
                    echo '<a href="http://localhost/login.php?id=1">Student</a>';
                    echo '<a href="http://localhost/login.php?id=2">Publisher</a>';
                    echo '<a href="http://localhost/login.php?id=3">Secretary</a>';
                    echo '<a href="http://localhost/login.php?id=4">Distributor</a>';
                    echo '<a href="http://localhost/login.php?id=5">Professor</a>';
                  echo '</div>';
                echo '</div>';
                echo '<a href="http://localhost/signup.php">';
                  echo '<button class="dropbtn" style="margin-left: 10px; width: 110px;">Sign Up</button>';
                echo '</a>';
              }else{
                echo '<a href="http://localhost/logout.php">';
                  echo '<button class="dropbtn">Logout</button>';
                echo '</a>';
              }
            ?>
          </div>
        </nav>
      </div>
      <!-- Item 2 on grid -->
      <div class="bs-item2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://localhost/index.php">Home</a></li>
          <li class="breadcrumb-item active">Studies</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- Item 1 on grid2 -->
    <?php
    if (isset($_SESSION['Id'])){
      if ($_SESSION['Id'] == 1){
        echo '
        <ul class="nav nav-pills flex-column">
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student_home.php">Home</a>
          </li>
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/student_book_sel.php">Book Selection</a>
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
        </ul>';
      }else if ($_SESSION['Id'] == 2){
        echo '
        <ul class="nav nav-pills flex-column">
          <li class="nav-item" style="padding-bottom:2em">
            <a class="nav-link" href="http://localhost/publisher_home.php">Home</a>
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
        </ul>';
      }
    }else{
      echo '
      <ul class="nav nav-pills flex-column">
      </ul>';
    }
    ?>
    <!-- Item 2 on grid2 -->
    <div class="bs-grid">
      <!-- Item 3 on grid -->
      <form method="post" action="studies.php">
        <div class="selection">
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
          <div class="form-group2" style="display: grid; grid-template-columns: 48% 4% 48%">
            <label for="period">Period</label>
            <h2></h2>
            <label for="semester">Semester</label>
          </div>
          <div class="form-group2" style="display: grid; grid-template-columns: 48% 4% 48%; margin-bottom: 2em;">
            <select class="form-control" id="period" name="period">
              <option selected value="">-- Any --</option>
              <option value="Winter">Winter</option>
              <option value="Summer">Summer</option>
            </select>
            <h2></h2>
            <select class="form-control" id="semester" name="semester">
              <option selected value="">-- Any --</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
          </div>
          <div class="search-bn-container" style="text-align: center;">
            <button type="submit" name="submit-options" class="btn btn-primary btn-lg">Search</button>
          </div>
        </form>
      </div>
      <div class="results-container">

        <?php
        if (isset($_POST['submit-options'])){
          $dep_id = mysqli_real_escape_string($conn, $_POST['department']);
          if (!empty($_POST['period']) && !empty($_POST['semester'])){
            $period = mysqli_real_escape_string($conn, $_POST['period']);
            $semester = mysqli_real_escape_string($conn, $_POST['semester']);
            $query = "SELECT * FROM class WHERE class.Department_id='".$dep_id."' AND class.Period = '".$period."' AND class.Semester = '".$semester."'";
          }else if (!empty($_POST['period'])){
            $period = mysqli_real_escape_string($conn, $_POST['period']);
            $query = "SELECT * FROM class WHERE class.Department_id='".$dep_id."' AND class.Period = '".$period."'";
          }else if (!empty($_POST['semester'])){
            $semester = mysqli_real_escape_string($conn, $_POST['semester']);
            $query = "SELECT * FROM class WHERE class.Department_id='".$dep_id."' AND class.Semester = '".$semester."'";
          }else {
            $query = "SELECT * FROM class WHERE class.Department_id='".$dep_id."'";
          }
          $result = $conn->query($query);
          echo '<div class="fancy-header">
                  <p style="text-align: center;"><a href="curriculum.php">Link for the curriculum<a> of your Department</p>
                  <h1>Classes:</h1>
                </div>';
          if (mysqli_num_rows($result) > 0) {
            echo '<div class="class-row">';
            echo '<div class="panel-group" id="accordion" style="display: grid; grid-template-columns: 33% 33% 33%;">';
            while($row = $result->fetch_assoc()){
              echo '<div class="panel panel-default">
                    <div class="panel-heading" style="margin-top: 2em;">
                      <h4 class="panel-title">
                        <button class="myButton" data-toggle="collapse" data-parent="#accordion" href="#collapse1'.$row['Id'].'">'.$row['Id'].' | '.$row['Name'].'</button>
                      </h4>
                    </div>
                    <div id="collapse1'.$row['Id'].'" class="panel-collapse collapse in">
                    <div class="class-info">
                      <input class="btn btn-outline-dark view_info" style="min-width: 200px;" type="submit" data-toggle="modal" data-target="#dataModal1" id="'.$row['Id'].'" value="Class Info">
                    </div>
                    <div class="cart-container" style="display: grid; grid-template-columns: 50% 50%">';
              $query2 = "SELECT * FROM book,class_has_choice WHERE class_has_choice.Class_id='".$row['Id']."' AND book.Id = class_has_choice.Book_id";
              $result2 = $conn->query($query2);
              if (mysqli_num_rows($result) > 0) {
                while($row2 = $result2->fetch_assoc()){
                  echo '<div class="btn2" >';
                  echo '<input class="myButton view_data" type="submit" data-toggle="modal" data-target="#dataModal2" id="'.$row2['ISBN'].'" value="'.$row2['Title'].'">';
                  echo '</div>';
                  }
                }else{
                  echo 'No books listed for this class';
                }
              echo '</div>
                  </div>
                </div>';
            }
            echo '<!-- Modal -->
                  <div class="modal fade" id="dataModal2" role="dialog">
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
            echo '</div>
                  </div>';
            echo '<!-- Modal -->
                  <div class="modal fade" id="dataModal1" role="dialog">
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
          }else{
            echo "There are no results matching your search.";
          }
        }
        ?>

      </div>
    </div>
  </div>
</body>
</html>
