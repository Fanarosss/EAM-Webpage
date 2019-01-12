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
          <a class="nav-link active" href="" style="padding-left: 2em; padding-right: 2em;">Pickup Point</a>
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
      <div class="pickup-point-select">
      <form method="post" action="http://localhost/student_new_form4.php">
        <?php
        include('./src/config.php');
        if (isset($_SESSION['selected_books'])) {
          echo '<table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Book</th>
                    <th scope="col">Class</th>
                    <th scope="col">From Distributor</th>
                    <th scope="col">From Student</th>
                  </tr>
                </thead>
                <tbody>';
          $count = 0;
          while($count < count($_SESSION['selected_books'])){
            echo '<tr>
                    <th scope="row">'.$_SESSION['selected_books'][$count]['id'].'</th>
                    <td>'.$_SESSION['selected_books'][$count]['title'].'</td>
                    <td>'.$_SESSION['selected_books'][$count]['for_class'].'</td>
                    <td><fieldset class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios'.$count.'" id="optionsRadios'.$count.'" value="0" checked>
                            Select this to pick up a new book from the closest distributor.
                            </label>
                          </div>
                        </fieldset>
                    </td>
                    <td><fieldset class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios'.$count.'" id="optionsRadios'.$count.'" value="1">
                            Select this to take the book from a fellow student.
                            </label>
                          </div>
                        </fieldset>
                    </td>
                  </tr>';
            $count++;
          }
        }
        echo  '</tbody>
              </table>';
        ?>
        <input type="submit" class="btn btn-primary btn-lg" name="select_type" value="Save and Proceed"/>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
