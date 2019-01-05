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
</head>

<body>
  <!-- grid class containing all items -->
  <div class="grid">
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
              <li class="nav-item active">
                <a class="nav-link" href="http://localhost/book_database.php">Book Database</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/studies.php">Studies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/contact.php">Contact</a>
              </li>
            </ul>
            <?php
              if(!isset($_SESSION['login_user'])) {
                echo '<div class="mydropdown">';
                  echo '<button class="dropbtn">Login</button>';
                  echo '<div class="mydropdown-content">';
                    echo '<a href="http://localhost/login.php?id=1">Student</a>';
                    echo '<a href="http://localhost/login.php?id=2">Publisher</a>';
                    echo '<a href="http://localhost/login.php?id=3">Secretary</a>';
                    echo '<a href="http://localhost/login.php?id=4">Distributor</a>';
                    echo '<a href="http://localhost/login.php?id=5">Professor</a>';
                  echo '</div>';
                echo '</div>';
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
          <li class="breadcrumb-item active">Book Database</li>
        </ol>
      </div>
      <!-- Item 3 on grid -->
      <h1 style="text-align:center">Search for book in Eudoxus database</h1>
      <!-- Item 4 on grid -->
      <div class="container">
        <form action="book_database.php" method="POST">
          <div class="form-group">
            <input type="text" name="search" class="form-control" id="search" aria-describedby="search">
            <small id="emailHelp" class="form-text text-muted">For advanced search use commas (,) for different keys.</small>
            <small id="emailHelp" class="form-text text-muted">Example search: Algorithms, Kleidarithmos.</small>
          </div>
          <div class="search-bn-container">
            <button type="submit" name="submit-search" class="btn btn-primary btn-lg">Search</button>
          </div>
        </form>
      </div>
      <!-- Item 5 on grid -->
      <div class="results-container">
        <?php
        include './src/config.php';
        if (isset($_POST['submit-search'])){
          $search = mysqli_real_escape_string($conn, $_POST['search']);
          $query = "SELECT * FROM book WHERE Title LIKE '%$search%' OR Author LIKE '%$search'
                    OR ISBN LIKE '%$search' OR Publications LIKE '%$search'";
          $result = $conn->query($query);
          if ($result){
            echo '<h1>Results</h1>';
            echo '<div class="book-row">';
            while($row = $result->fetch_assoc()){
              echo '<div class="btn">';
              echo '<input class="myButton" type="submit" value="'.$row['Title'].'">';
              echo '</div>';
            }
            echo '</div>';
          }else{
            echo "<h1>There are no results matching your search.</h1>";
          }
        } else {
          $query = "SELECT * FROM book";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
          echo '<h1>All books</h1>';
          echo '<div class="book-row">';
          while($row = $result->fetch_assoc()){
            echo '<div class="btn">';
            echo '<input class="myButton" type="submit" value="'.$row['Title'].'">';
            echo '</div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
