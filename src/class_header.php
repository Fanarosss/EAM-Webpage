<?php
   include('session.php');
   include('config.php');

   $query = "SELECT * FROM class WHERE class.Id = '".$_POST["class_id"]."'";
   $result = $conn->query($query);
   if (!$result) die($conn->error);
   while($row = $result->fetch_assoc()){
     echo'<h3>'.$row['Name'].'.</h3>';
   }
?>
