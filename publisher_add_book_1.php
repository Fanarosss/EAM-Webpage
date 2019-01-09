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
          <a class="nav-link active" data-toggle="tab" href="http://localhost/publisher_add_book_1.php" style="padding-left: 2em; padding-right: 2em;">Check</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="http://localhost/publisher_add_book_2.php" style="padding-left: 2em; padding-right: 2em;">Book Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="http://localhost/publisher_add_book_3.php" style="padding-left: 2em; padding-right: 2em;">Book Files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="http://localhost/publisher_add_book_4.php" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
        </li>
      </ul>
      <div class="jumbotron2">
        <h1 class="display-3">Check ISBN</h1>
        <p class="lead">Please type book's ISBN to check if it is already registered!</p>
        <hr class="my-4">
        <form action="publisher_add_book_1.php" method="POST">
          <fieldset>
            <div class="form-group">
              <input type="text" class="form-control" name="ISBN" placeholder="ISBN" value="<?php echo isset($_POST['ISBN']) ? $_POST['ISBN'] : '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit-check">Check</button>
          </fieldset>
        </form>
        <?php
        include './src/config.php';
        $p = $_SESSION['Username'];
        if (isset($_POST['submit-check'])){
          $search = mysqli_real_escape_string($conn, $_POST['ISBN']);
          $query = "SELECT * FROM book WHERE Publications = '$p' AND ISBN = '$search'";
          $result = $conn->query($query);
          if (mysqli_num_rows($result) > 0) {
            echo '<div class="alert alert-dismissible alert-danger" style="margin-top: 20px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>--Check Fail--</strong> This ISBN was found in another book that you have already registered!
                  </div>';
          }else{
            echo '<div class="alert alert-dismissible alert-success" style="margin-top: 20px">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>--Check Success--</strong> This ISBN is ready to be registered! Click <a href="http://localhost/publisher_add_book_2.php" class="alert-link">here</a> to proceed.
                  </div>';
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
