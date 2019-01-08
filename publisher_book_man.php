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
          <li class="breadcrumb-item active">Book Management</li>
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
    <div class="bs-item3">
      <div class="jumbotron2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <div class="collapse navbar-collapse" id="navbarColor01">
            <a class="btn btn-primary btn-lg" href="http://localhost/publisher_settings.php" role="button"><i class="fas fa-book"></i>  Add Book</a>
            <form action="publisher_book_man.php" method="POST">
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
              <th scope="col">Available</th>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">ISBN</th>
              <th scope="col">Registration</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include './src/config.php';
            $p = $_SESSION['Username'];
            if (isset($_POST['submit-search'])){
              $search = mysqli_real_escape_string($conn, $_POST['search']);
              $query = "SELECT * FROM book WHERE Publications = '$p' AND (Id LIKE '%$search%' OR Title LIKE '%$search%' OR Author LIKE '%$search%'
                        OR ISBN LIKE '%$search%')";
              $result = $conn->query($query);
            } else {
              $query = "SELECT * FROM book WHERE Publications = '$p'";
              $result = $conn->query($query);
            }
            while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
              echo "<tr><td>x</td><td>" . $row['Id'] . "</td><td>" . $row['Title'] . "</td><td>" . $row['Author'] . "</td><td>" . $row['ISBN'] . "</td><td>x</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
