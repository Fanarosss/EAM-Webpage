<?php
   include('./src/session.php');
   include('./src/config.php');

   $query = "SELECT * FROM book WHERE book.ISBN = '".$_POST["book_id"]."'";
   $result = $conn->query($query);
   if (!$result) die($conn->error);
   while($row = $result->fetch_assoc()){
     echo '<p>Author: '.$row['Author'].'.</p>
          <p>Publications: '.$row['Publications'].'.</p>
          <p>ISBN: '.$row['ISBN'].'.</p>
          <p>Book Code: '.$row['Id'].'.</p>
          <p>Pages: '.$row['Pages'].'</p>
          <p>Dimensions: '.$row['Dimensions'].'</p>';
    if(!empty($row['FPage'])){
      echo '<img src="data:image/jpeg;base64, '.base64_encode($row['FPage']).'" width="300" height="400"/>';
    }
  }
?>
