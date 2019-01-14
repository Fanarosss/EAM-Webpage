<?php
   include('../src/session.php');
   include('../src/config.php');
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
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if ($_GET['action'] == 'confirm'){
        $id = $_SESSION['b_id'];
        $title = $_SESSION['b_title'];
        $author = $_SESSION['b_author'];
        $publications = $_SESSION['Username'];
        $ISBN = $_SESSION['ISBN'];
        $pages = $_SESSION['b_pages'];
        $dims = $_SESSION['b_dims'];
        $cost = $_SESSION['b_cost'];
        $img1 = $_SESSION['img1'];
        $img2 = $_SESSION['img2'];
        $img3 = $_SESSION['img3'];
        $img4 = $_SESSION['img4'];
        $book_insert_query = "INSERT INTO book VALUES('$id', '$title', '$author', '$publications', '$ISBN', '$pages', '$dims', '$cost', '$img1', '$img2', '$img3', '$img4')";
        $conn->query($book_insert_query);
        unset($_SESSION['b_id']);
        unset($_SESSION['b_title']);
        unset($_SESSION['b_author']);
        unset($_SESSION['ISBN']);
        unset($_SESSION['b_pages']);
        unset($_SESSION['b_dims']);
        unset($_SESSION['b_cost']);
        unset($_SESSION['img1']);
        unset($_SESSION['img2']);
        unset($_SESSION['img3']);
        unset($_SESSION['img4']);
        unset($_SESSION['p_add1']);
        unset($_SESSION['p_add2']);
        unset($_SESSION['p_add3']);
        $_SESSION['msg'] = 1;
        header("location: publisher_book_man.php");
      }else if($_GET['action'] == 'cancel'){
        unset($_SESSION['b_id']);
        unset($_SESSION['b_title']);
        unset($_SESSION['b_author']);
        unset($_SESSION['ISBN']);
        unset($_SESSION['b_pages']);
        unset($_SESSION['b_dims']);
        unset($_SESSION['b_cost']);
        unset($_SESSION['img1']);
        unset($_SESSION['img2']);
        unset($_SESSION['img3']);
        unset($_SESSION['img4']);
        unset($_SESSION['p_add1']);
        unset($_SESSION['p_add2']);
        unset($_SESSION['p_add3']);
        header("location: publisher_book_man.php");
      }
    }
  ?>
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
          <li class="breadcrumb-item"><a href="http://localhost/publisher/publisher_book_man.php">Book Management</a></li>
          <li class="breadcrumb-item active">Add Book</li>
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
    <!-- item2 on bs2 grid-->
    <div class="Book-Selection-Forms">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/publisher/publisher_add_book_1.php" style="padding-left: 2em; padding-right: 2em;">Check</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/publisher/publisher_add_book_2.php" style="padding-left: 2em; padding-right: 2em;">Book Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/publisher/publisher_add_book_3.php" style="padding-left: 2em; padding-right: 2em;">Book Files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/publisher/publisher_add_book_4.php" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
        </li>
      </ul>
      <div class="jumbotron2">
        <div class="separator" style="margin-bottom:2em">
          <?php
            $ISBN = $_SESSION['ISBN'];
            $sql = "SELECT * FROM book WHERE ISBN = '$ISBN'";
            $sth = $conn->query($sql);
            $result=mysqli_fetch_assoc($sth);
          ?>
          <div class="Headers">
            <h5>Id</h5>
            <h5>Title</h5>
            <h5>Author(s)</h5>
            <h5>ISBN</h5>
            <h5>Pages</h5>
            <h5>Dimensions</h5>
            <h5>Costing</h5>
            <br>
            <h5>Front Page</h5>
            <h5>Back Page</h5>
            <h5>Contents</h5>
            <h5>Extract</h5>
          </div>
          <div class="Info">
            <h5><?php echo $_SESSION['b_id'];?></h5>
            <h5><?php echo $_SESSION['b_title'];?></h5>
            <h5><?php echo $_SESSION['b_author'];?></h5>
            <h5><?php echo $_SESSION['ISBN'];?></h5>
            <h5><?php echo $_SESSION['b_pages'];?></h5>
            <h5><?php echo $_SESSION['b_dims'];?></h5>
            <h5><?php echo $_SESSION['b_cost'];?></h5>
            <br>
            <h5><?php echo !empty($_SESSION['img1']) ? 'Yes' : 'No';?></h5>
            <h5><?php echo !empty($_SESSION['img2']) ? 'Yes' : 'No';?></h5>
            <h5><?php echo !empty($_SESSION['img3']) ? 'Yes' : 'No';?></h5>
            <h5><?php echo !empty($_SESSION['img4']) ? 'Yes' : 'No';?></h5>
          </div>
        </div>
        <hr class="my-4">
        <form action="http://localhost/publisher/publisher_add_book_4.php" method="POST" enctype="multipart/form-data">
          <button type="submit" formaction="http://localhost/publisher/publisher_add_book_4.php?action=confirm" class="btn btn-primary" name="submit-check">Confirm</button>
          <button type="submit" formaction="http://localhost/publisher/publisher_add_book_4.php?action=cancel" formnovalidate class="btn btn-danger" name="cancel">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
