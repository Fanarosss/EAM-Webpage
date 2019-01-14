<?php
   include('../src/session.php');
   include('../src/config.php');
   $deleted = 0;
   if (filter_input(INPUT_GET, 'action') == 'delete'){
     $ISBN = $_GET['ISBN'];
     $book_delete_query = "DELETE from book where ISBN = '$ISBN'";
     $conn->query($book_delete_query);
     $deleted = 1;
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
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
          <li class="breadcrumb-item"><a href="http://localhost/publisher/publisher_home.php">Publisher</a></li>
          <li class="breadcrumb-item active">Book Management</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- item 1 on bs2 grid - side bar -->
    <ul class="nav nav-pills flex-column">
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher/publisher_home.php">Home</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link active" href="http://localhost/publisher/publisher_book_man.php">Book Management</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher/publisher_courier.php">Courier Service</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher/publisher_faq.php">FAQ</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher/publisher_manual.php">Manual</a>
      </li>
    </ul>
    <div class="bs-item3">
      <div class="jumbotron2">
        <?php
        if ($deleted == 1) {
          echo '<div class="alert alert-dismissible alert-danger" style="margin-top: 20px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>--Book was deleted successfully!--</strong>
                </div>';
        }
        if(isset($_SESSION['msg'])){
          if ($_SESSION['msg'] == 1){
            echo '<div class="alert alert-dismissible alert-success" style="margin-top: 20px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>--Book was added successfully!--</strong>
                  </div>';
            unset($_SESSION['msg']);
          }else if ($_SESSION['msg'] == 2){
            echo '<div class="alert alert-dismissible alert-success" style="margin-top: 20px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>--Book was edited successfully!--</strong>
                  </div>';
            unset($_SESSION['msg']);
          }
        }
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="collapse navbar-collapse" id="navbarColor01">
            <a class="btn btn-primary btn-lg" href="http://localhost/publisher/publisher_add_book_1.php" role="button"><i class="fas fa-book"></i>  Add Book</a>
            <form action="http://localhost/publisher/publisher_book_man.php" method="POST">
              <div class="form-inline my-2 my-lg-0" style="margin-left: 20px">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit-search">Search</button>
                <div class="form-group">
                  <select class="btn btn-primary btn-lg" style="margin-left: 20px">
                    <option disabled selected value>-- Sort By --</option>
                    <option>Id</option>
                    <option>Title</option>
                    <option>Author</option>
                    <option>ISBN</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </nav>
        <table class="table table-hover" style="margin-top: 20px">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">ISBN</th>
              <th scope="col">Pages</th>
              <th scope="col">Dimensions</th>
              <th scope="col">Costing</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $p = $_SESSION['Username'];
            if (isset($_POST['submit-search'])){
              $search = mysqli_real_escape_string($conn, $_POST['search']);
              $query = "SELECT * FROM book WHERE Publications = '$p' AND (Id LIKE '%$search%' OR Title LIKE '%$search%' OR Author LIKE '%$search%'
                        OR ISBN LIKE '%$search%')";
            } else {
              $query = "SELECT * FROM book WHERE Publications = '$p'";
            }
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
              echo  "<tr><td>" . $row['Id'] .
                    "</td><td>" . $row['Title'] .
                    "</td><td>" . $row['Author'] .
                    "</td><td>" . $row['ISBN'] .
                    "</td><td>" . $row['Pages'] .
                    "</td><td>" . $row['Dimensions'] .
                    "</td><td>" . $row['Costing'] .
                    "</td><td>" . '<a class="btn btn-primary" name="submit-check" href="http://localhost/publisher/publisher_edit_book.php?ISBN='.$row['ISBN'].'">Edit</a>' .
                    '<a class="btn btn-danger btn" style="margin-left:10px" href="http://localhost/publisher/publisher_book_man.php?action=delete&ISBN='.$row['ISBN'].'"><i class="fas fa-trash-alt"></i> Delete</a>' ."</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
