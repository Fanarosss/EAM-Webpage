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
    $success = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $ISBN = $_SESSION['ISBN'];
      $f1 = addslashes(file_get_contents($_FILES['FPage']['tmp_name']));
      $f2 = addslashes(file_get_contents($_FILES['BPage']['tmp_name']));
      $f3 = addslashes(file_get_contents($_FILES['Contents']['tmp_name']));
      $f4 = addslashes(file_get_contents($_FILES['Extract']['tmp_name']));

      $book_insert_query = "UPDATE book SET FPage = '$f1', BPage = '$f2', Contents = '$f3', Extract = '$f4' WHERE ISBN = '$ISBN'";
      $conn->query($book_insert_query);
      $success = 1;
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
          <a class="nav-link" data-toggle="tab" href="http://localhost/publisher_add_book_2.php" style="padding-left: 2em; padding-right: 2em;">Book Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="http://localhost/publisher_add_book_3.php" style="padding-left: 2em; padding-right: 2em;">Book Files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="http://localhost/publisher_add_book_4.php" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
        </li>
      </ul>
      <div class="jumbotron2">
        <!-- <?php
        include('./src/config.php');
        $sql = "SELECT * FROM book WHERE Id = '1000'";
        $sth = $conn->query($sql);
        $result=mysqli_fetch_assoc($sth);
        echo $result['Title'];
        echo "HERE";
        header("Content-type: image/jpeg");
        echo '<img src="data:image/jpeg;base64,' . base64_encode( $result['Extract'] ) . '" />';
        ?> -->
        <?php
        if ($success == 1) {
          echo '<div class="alert alert-dismissible alert-success" style="margin-top: 20px">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>--Book files have been registered successfully!--</strong> Click <a href="http://localhost/publisher_add_book_4.php" class="alert-link">here</a> to proceed.
                </div>';
        }
        ?>
        <p class="lead">Please enter book's files below:</p>
        <hr class="my-4">
        <form action="publisher_add_book_3.php" method="POST" enctype="multipart/form-data">
          <fieldset>
            <div class="form-group">
              <label for="FPage">Front Page</label>
              <input type="file" class="form-control-file" name="FPage" accept="image/*" onchange="loadFile1(event)">
              <img id="output1" style="margin-top:10px"/>
              <script>
                var loadFile1 = function(event) {
                  var output = document.getElementById('output1');
                  output.src = URL.createObjectURL(event.target.files[0]);
                };
              </script>
            </div>
            <div class="form-group">
              <label for="BPage">Back Page</label>
              <input type="file" class="form-control-file" name="BPage" accept="image/*" onchange="loadFile2(event)">
              <img id="output2" style="margin-top:10px"/>
              <script>
                var loadFile2 = function(event) {
                  var output = document.getElementById('output2');
                  output.src = URL.createObjectURL(event.target.files[0]);
                };
              </script>
            </div>
            <div class="form-group">
              <label for="Contents">Contents</label>
              <input type="file" class="form-control-file" name="Contents" accept="image/*" onchange="loadFile3(event)">
              <img id="output3" style="margin-top:10px"/>
              <script>
                var loadFile3 = function(event) {
                  var output = document.getElementById('output3');
                  output.src = URL.createObjectURL(event.target.files[0]);
                };
              </script>
            </div>
            <div class="form-group">
              <label for="Extract">Extract</label>
              <input type="file" class="form-control-file" name="Extract" accept="image/*" onchange="loadFile4(event)">
              <img id="output4" style="margin-top:10px"/>
              <script>
                var loadFile4 = function(event) {
                  var output = document.getElementById('output4');
                  output.src = URL.createObjectURL(event.target.files[0]);
                };
              </script>
            </div>
            <hr class="my-4">
            <button type="submit" class="btn btn-primary" name="submit-check">Submit</button>
            <button type="reset" class="btn btn-primary" name="reset" onClick="deleteall(event)">Reset</button>
            <script>
              var deleteall = function(event) {
                document.getElementById('output4').value = "";
                var output = document.getElementById('output4');
                output.src = URL.createObjectURL(event.target.files[0]);
              };
            </script>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
