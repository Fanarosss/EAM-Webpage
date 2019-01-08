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
          <li class="breadcrumb-item active">Old Form</li>
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
    <div class="Old-Form">
      <?php
      $formid = $_GET['id'];
      $query = "SELECT * FROM form WHERE form.Id = '".$formid."'";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      $row = mysqli_fetch_assoc($result);
      echo '<h2><u><b>'.$row['Semester'].' '.$row['Year'].'</b></u></h2>';
      echo '<table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Class</th>
                <th scope="col">Professor</th>
                <th scope="col">Class Code</th>
                <th scope="col">Book Title</th>
                <th scope="col">Book Code</th>
              </tr>
            </thead>
            <tbody>';
      $query = "SELECT class.Name, class.Professor, class.Id AS cId, book.Id AS bId, book.Title  FROM form, book, class, form_has_book
                WHERE form.Id = '".$formid."' AND form.Id = form_has_book.Form_id AND class.Id = form_has_book.Class_id
                AND book.Id = form_has_book.Book_id ORDER BY class.Name ASC";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      while($row = $result->fetch_assoc()){
        echo '<tr>
                <th scope="row">'.$row['Name'].'</th>
                <td>'.$row['Professor'].'</td>
                <td>'.$row['cId'].'</td>
                <td>'.$row['Title'].'</td>
                <td>'.$row['bId'].'</td>
              </tr>';
      }
      echo  '</tbody>
            </table>';
      ?>

    </div>
  </div>
</body>
</html>
