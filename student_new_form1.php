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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./js/scripts.js"></script>
  <?php
  /*$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));

		if(!empty($_SESSION["selected_class"])) {
			if(in_array($productByCode[0]["code"],array_keys($_SESSION["selected_class"]))) {
				foreach($_SESSION["selected_class"] as $k => $v) {
						if($productByCode[0]["code"] == $k) {
							echo 'Class is already selected';
						}
				}
			} else {
				$_SESSION["selected_class"] = array_merge($_SESSION["selected_class"],$itemArray);
			}
		} else {
			$_SESSION["selected_class"] = $itemArray;
		}*/
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
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="" style="padding-left: 2em; padding-right: 2em;">Class Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form2.php" style="padding-left: 2em; padding-right: 2em;">Book Selection</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form3.php" style="padding-left: 2em; padding-right: 2em;">Pickup Point</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/student_new_form4.php" style="padding-left: 2em; padding-right: 2em;">Confirmation</a>
        </li>
      </ul>

      <div class="class-select">
        <?php
        include('./src/config.php');
        echo '<div class="panel-group" id="accordion" style="display:grid;">';
        echo '<div class="panel panel-default">
              <div class="panel-heading" style="margin-top: 2em;">
                <h4 class="panel-title">
                  <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h3><b>Winter Period:</b></h3></button>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">';
        for ($semid = 1; $semid <=7; $semid+=2) {
          $query = "SELECT * FROM class,student WHERE student.Username = '".$_SESSION['Username']."' AND student.Department_id = class.Department_id
                    AND Period = 'Winter' AND Semester='".$semid."' ORDER BY class.Name ASC";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
          echo '<div class="panel panel-default">
                <div class="panel-heading" style="margin-top: 2em;">
                  <h4 class="panel-title">
                    <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapsew1'.$semid.'"><h3><b>Semester '.$semid.':</b></h3></button>
                  </h4>
                </div>
                <div id="collapsew1'.$semid.'" class="panel-collapse collapse in">
                <div class="cart-container">';
          if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()){
              echo '<div class="myshop-item">
                    <div class="btn">
                    <input class="myButton" type="submit" value="'.$row['Name'].'">
                    </div>
                    <button class="button-hover-addcart button"><span>Add to selected</span><i class="far fa-check-circle"></i></button>
                    </div>';
            }
          }else{
            echo 'No classes available.';
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="panel-group" id="accordion" style="display:grid;">';
        echo '<div class="panel panel-default">
              <div class="panel-heading" style="margin-top: 2em;">
                <h4 class="panel-title">
                  <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><h3><b>Summer Period:</b></h3></button>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse in">';
        for ($semid = 2; $semid <=8; $semid+=2) {
          $query = "SELECT * FROM class,student WHERE student.Username = '".$_SESSION['Username']."' AND student.Department_id = class.Department_id
                    AND Period = 'Summer' AND Semester='".$semid."' ORDER BY class.Name ASC";
          $result = $conn->query($query);
          if (!$result) die($conn->error);
          echo '<div class="panel panel-default">
                <div class="panel-heading" style="margin-top: 2em;">
                  <h4 class="panel-title">
                    <button class="btn btn-outline-primary" data-toggle="collapse" data-parent="#accordion" href="#collapses1'.$semid.'"><h3><b>Semester '.$semid.':</b></h3></button>
                  </h4>
                </div>
                <div id="collapses1'.$semid.'" class="panel-collapse collapse in">
                <div class="cart-container">';
          if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()){
              echo '<div class="myshop-item">
                    <div class="btn">
                    <input class="myButton" type="submit" value="'.$row['Name'].'">
                    </div>
                    <button class="button-hover-addcart button"><span>Add to selected</span><i class="far fa-check-circle"></i></button>
                    </div>';
            }
          }else{
            echo 'No classes available.';
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        ?>
      </div>
      <button type="button" class="btn btn-primary btn-lg" style="margin-top: 2em;">Proceed</button>
    </div>
  </div>
</body>
</html>
