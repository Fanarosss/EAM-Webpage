<?php
   include('session.php');
   include('config.php');

   $query = "SELECT * FROM book WHERE book.ISBN = '".$_POST["book_id"]."'";
   $result = $conn->query($query);
   if (!$result) die($conn->error);
   while($row = $result->fetch_assoc()){
     echo'<h3>'.$row['Title'].'.</h3>';
   }
?>
