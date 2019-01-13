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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/scripts.js"></script>
  <?php
    include('./src/config.php');
    $ISBN = filter_input(INPUT_GET, 'ISBN');
    $publications = $_SESSION['Username'];
    $book_find_query = "SELECT * FROM book WHERE ISBN = '$ISBN'";
    $result = $conn->query($book_find_query);
    $book = mysqli_fetch_assoc($result);
  ?>
  <?php
    $TitleErr = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $title = mysqli_real_escape_string($conn, $_POST['Title']);
      $author = mysqli_real_escape_string($conn, $_POST['Author']);
      $pages = mysqli_real_escape_string($conn, $_POST['Pages']);
      $dims = mysqli_real_escape_string($conn, $_POST['Dimensions']);
      $cost = mysqli_real_escape_string($conn, $_POST['Costing']);
      if(empty(file_get_contents($_FILES['FPage']['tmp_name']))){
        $img1 = $book['FPage'];
      }else{
        $img1 = addslashes(file_get_contents($_FILES['FPage']['tmp_name']));
      }
      if(empty(file_get_contents($_FILES['BPage']['tmp_name']))){
        $img2 = $book['BPage'];
      }else{
        $img2 = addslashes(file_get_contents($_FILES['BPage']['tmp_name']));
      }
      if(empty(file_get_contents($_FILES['Contents']['tmp_name']))){
        $img3 = $book['Contents'];
      }else{
        $img3 = addslashes(file_get_contents($_FILES['Contents']['tmp_name']));
      }
      if(empty(file_get_contents($_FILES['Extract']['tmp_name']))){
        $img4 = $book['Extract'];
      }else{
        $img4 = addslashes(file_get_contents($_FILES['Extract']['tmp_name']));
      }
      // $img2 = addslashes(file_get_contents($_FILES['BPage']['tmp_name']));
      // if(empty($img2)){
      //   $img2 = $book['BPage'];
      // }
      // $img3 = addslashes(file_get_contents($_FILES['Contents']['tmp_name']));
      // if(empty($img3)){
      //   $img3 = $book['Contents'];
      // }
      // $img4 = addslashes(file_get_contents($_FILES['Extract']['tmp_name']));
      // if(empty($img4)){
      //   $img4 = $book['Extract'];
      // }
      $book_check_query = "SELECT * FROM book WHERE ISBN!='$ISBN' AND Title='$title'";
      $check_result = $conn->query($book_check_query);
      $check = mysqli_fetch_assoc($check_result);
      if ($check) {
        $TitleErr = 1;
      }else{
        $book_edit1_query = "UPDATE book SET Title='$title', Author='$author', Pages='$pages', Dimensions='$dims', Costing='$cost' where ISBN = '$ISBN'";
        $conn->query($book_edit1_query);
        $book_editimg1_query = "UPDATE book SET FPage='$img1' where ISBN = '$ISBN'";
        $conn->query($book_editimg1_query);
        $book_editimg2_query = "UPDATE book SET BPage='$img2' where ISBN = '$ISBN'";
        $conn->query($book_editimg2_query);
        $book_editimg3_query = "UPDATE book SET Contents='$img3' where ISBN = '$ISBN'";
        $conn->query($book_editimg3_query);
        $book_editimg4_query = "UPDATE book SET Extract='$img4' where ISBN = '$ISBN'";
        $conn->query($book_editimg4_query);
        $_SESSION['msg'] = 2;
        header("location: publisher_book_man.php");
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
          <li class="breadcrumb-item active">Edit Book</li>
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
        <a class="nav-link" href="http://localhost/publisher_manual.php">Manual</a>
      </li>
    </ul>
    <!-- item2 on bs2 grid-->
    <div class="bs-item3">
      <div class="jumbotron2">
        <h1 class="display-3">Edit Book</h1>
        <hr class="my-4">
        <form action="publisher_edit_book.php?ISBN=<?php echo $_GET['ISBN'];?>" method="POST" enctype="multipart/form-data">
          <fieldset>
            <div class="form-group">
              <label for="Id">Id</label>
              <?php
                echo '<div class="form-group">
                <input type="text" class="form-control" name="Id" value="';
                echo $book['Id'];
                echo '" disabled>';
              ?>
            </div>
            <div class="form-group">
              <label for="Title">Title</label>
              <?php
              if ($TitleErr == 0){
                echo '<div class="form-group">
                <input type="text" class="form-control" name="Title" value="';
                echo $book['Title'];
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
              <input type="text" class="form-control" name="Author" value="<?php echo $book['Author']?>" required>
            </div>
            <div class="form-group">
              <label for="ISBN">ISBN</label>
              <?php
                echo '<div class="form-group">
                <input type="text" class="form-control" name="ISBN" value="';
                echo $book['ISBN'];
                echo '" disabled>';
              ?>
            </div>
            <div class="form-group">
              <label for="Pages">Pages</label>
              <input type="number" class="form-control" name="Pages" value="<?php echo $book['Pages']?>" required>
            </div>
            <div class="form-group">
              <label for="Dimensions">Dimensions</label>
              <input type="text" class="form-control" pattern="\d{2}[\*]\d{2}" title="Ex: 45*35 (Length*Width)" name="Dimensions" value="<?php echo $book['Dimensions']?>" required>
            </div>
            <div class="form-group">
              <label for="Costing">Costing</label>
              <input type="number" class="form-control" name="Costing" value="<?php echo $book['Costing']?>" required>
            </div>
            <hr class="my-4">
            <div class="form-group">
              <label for="FPage">Front Page <?php echo !empty($book['FPage']) ? " (Already Submitted)" : " (NOT Submitted)" ?></label>
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
              <label for="BPage">Back Page <?php echo !empty($book['BPage']) ? " (Already Submitted)" : " (NOT Submitted)" ?></label>
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
              <label for="Contents">Contents <?php echo !empty($book['Contents']) ? " (Already Submitted)" : " (NOT Submitted)" ?></label>
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
              <label for="Extract">Extract <?php echo !empty($book['Extract']) ? " (Already Submitted)" : " (NOT Submitted)" ?></label>
              <input type="file" class="form-control-file" name="Extract" accept="image/*" onchange="loadFile4(event)">
              <img id="output4" style="margin-top:10px"/>
              <script>
                var loadFile4 = function(event) {
                  var output = document.getElementById('output4');
                  var Images = document.createElement("Images");
                  output.src = URL.createObjectURL(event.target.files[0]);
                };
              </script>
            </div>
            <hr class="my-4">
            <button type="submit" class="btn btn-primary" name="submit-check">Edit</button>
            <a class="btn btn-primary" name="submit-check" href="http://localhost/publisher_book_man.php">Cancel</a>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
