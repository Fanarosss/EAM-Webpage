<?php
   include('./src/session.php');
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
  <?php
    include('./src/config.php');
    $IdErr = 0;
    $TitleErr = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if ($_GET['action'] == 'submit'){
        $id = mysqli_real_escape_string($conn, $_POST['Id']);
        $title = mysqli_real_escape_string($conn, $_POST['Title']);
        $author = mysqli_real_escape_string($conn, $_POST['Author']);
        $pages = mysqli_real_escape_string($conn, $_POST['Pages']);
        $dims = mysqli_real_escape_string($conn, $_POST['Dimensions']);
        $cost = mysqli_real_escape_string($conn, $_POST['Costing']);
        $_SESSION['b_author'] = $author;
        $_SESSION['b_pages'] = $pages;
        $_SESSION['b_dims'] = $dims;
        $_SESSION['b_cost'] = $cost;
        $book_check_query = "SELECT * FROM book WHERE Id='$id' OR Title='$title'";
        $result = $conn->query($book_check_query);
        $check = mysqli_fetch_assoc($result);
        if ($check) {
          if ($check['Id'] == $id) {
            $IdErr = 1;
            unset($_SESSION['p_add2']);
          }else{
            $_SESSION['b_id'] = $id;
          }
          if ($check['Title'] == $title) {
            $TitleErr = 1;
            unset($_SESSION['p_add2']);
          }else{
            $_SESSION['b_title'] = $title;
          }
        }else{
          $_SESSION['b_id'] = $id;
          $_SESSION['b_title'] = $title;
          $_SESSION['p_add2'] = 1;
          $success = 1;
        }
      }else if($_GET['action'] == 'reset'){
        unset($_SESSION['b_id']);
        unset($_SESSION['b_title']);
        unset($_SESSION['b_author']);
        unset($_SESSION['b_pages']);
        unset($_SESSION['b_dims']);
        unset($_SESSION['b_cost']);
        unset($_SESSION['p_add2']);
      }
    }
  ?>
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
          <li class="breadcrumb-item"><a href="http://localhost/publisher_home.php">Publisher</a></li>
          <li class="breadcrumb-item"><a href="http://localhost/publisher_book_man.php">Book Management</a></li>
          <li class="breadcrumb-item active">Add Book</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="bs2-grid">
    <!-- item 1 on bs2 grid - side bar -->
    <ul class="nav nav-pills flex-column">
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher_home.php">Home</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link active" href="http://localhost/publisher_book_man.php">Book Management</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher_courier.php">Courier Service</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="http://localhost/publisher_faq.php">FAQ</a>
      </li>
      <li class="nav-item" style="padding-bottom:2em">
        <a class="nav-link" href="https://eudoxus.gr/files/ManualPublishersUpdateBooks.pdf" target="_blank">Manual</a>
      </li>
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="Book-Selection-Forms">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="http://localhost/publisher_add_book_1.php" style="padding-left: 2em; padding-right: 2em;">Check</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="http://localhost/publisher_add_book_2.php" style="padding-left: 2em; padding-right: 2em;">Book Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['p_add2'] <= 0) {echo 'disabled';} ?>" data-toggle="tab" href="http://localhost/publisher_add_book_3.php" style="padding-left: 2em; padding-right: 2em;">Book Files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['p_add3'] <= 0) {echo 'disabled';} ?>" data-toggle="tab" href="http://localhost/publisher_add_book_4.php" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
        </li>
      </ul>
      <div class="jumbotron2">
        <?php
        if ($success == 1) {
          echo '<div class="alert alert-dismissible alert-success" style="margin-top: 20px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>--Book info has been registered successfully!--</strong> Click <a href="http://localhost/publisher_add_book_3.php" class="alert-link">here</a> to proceed.
                </div>';
        }
        ?>
        <p class="lead">Please enter book's info below:</p>
        <hr class="my-4">
        <form action="publisher_add_book_2.php" method="POST">
          <fieldset>
            <div class="form-group">
              <label for="Id">Id</label>
              <?php
              if ($IdErr == 0){
                echo '<div class="form-group">
                <input type="text" class="form-control" name="Id" value="';
                echo isset($_SESSION['b_id']) ? $_SESSION['b_id'] : '';
                echo '" required>';
              }else{
                echo '<div class="form-group has-danger">
                <input type="text" class="form-control is-invalid" name="Id" value="';
                echo isset($_POST['Id']) ? $_POST['Id'] : '';
                echo '" required>';
                if(isset($_SESSION['b_id'])){
                  unset($_SESSION['b_id']);
                }
                echo '<font size="2" class="invalid-feedback">Sorry, that Id is already registered. Try another?</font>';
              }
              ?>
            </div>
            <div class="form-group">
              <label for="Title">Title</label>
              <?php
              if ($TitleErr == 0){
                echo '<div class="form-group">
                <input type="text" class="form-control" name="Title" value="';
                echo isset($_SESSION['b_title']) ? $_SESSION['b_title'] : '';
                echo '" required>';
              }else{
                echo '<div class="form-group has-danger">
                <input type="text" class="form-control is-invalid" name="Title" value="';
                echo isset($_POST['Title']) ? $_POST['Title'] : '';
                echo '" required>';
                if(isset($_SESSION['b_title'])){
                  unset($_SESSION['b_title']);
                }
                echo '<font size="2" class="invalid-feedback">Sorry, that Title is already registered. Try another?</font>';
              }
              ?>
            </div>
            <div class="form-group">
              <label for="Author">Author(s)</label>
              <input type="text" class="form-control" name="Author" value="<?php echo isset($_SESSION['b_author']) ? $_SESSION['b_author'] : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="ISBN">ISBN</label>
              <?php
                echo '<div class="form-group">
                <input type="text" class="form-control" name="ISBN" value="';
                echo $_SESSION['ISBN'];
                echo '" disabled>';
              ?>
            </div>
            <div class="form-group">
              <label for="Pages">Pages</label>
              <input type="number" class="form-control" name="Pages" value="<?php echo isset($_SESSION['b_pages']) ? $_SESSION['b_pages'] : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="Dimensions">Dimensions</label>
              <input type="text" class="form-control" pattern="\d{2}[\*]\d{2}" title="Ex: 45*35 (Length*Width)" name="Dimensions" value="<?php echo isset($_SESSION['b_dims']) ? $_SESSION['b_dims'] : '' ?>" required>
            </div>
            <div class="form-group">
              <label for="Costing">Costing</label>
              <input type="number" class="form-control" name="Costing" value="<?php echo isset($_SESSION['b_cost']) ? $_SESSION['b_cost'] : '' ?>" required>
            </div>
            <hr class="my-4">
            <button type="submit" formaction="publisher_add_book_2.php?action=submit" class="btn btn-primary" name="submit-check">Submit</button>
            <button type="submit" formaction="publisher_add_book_2.php?action=reset" formnovalidate class="btn btn-primary" name="reset">Reset</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
