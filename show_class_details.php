<?php
   include('./src/session.php');
   include('./src/config.php');

   $query = "SELECT class.Id as CId, class.Professor, class.Semester, department.Name as DName FROM class, department WHERE class.Id = '".$_POST["class_id"]."' AND department.Id = class.Department_id";
   $result = $conn->query($query);
   if (!$result) die($conn->error);
   while($row = $result->fetch_assoc()){
     echo'<p>Professor: '.$row['Professor'].'.</p>
          <p>Department: '.$row['DName'].'.</p>
          <p>Class Code: '.$row['CId'].'.</p>
          <p>Semester: '.$row['Semester'].'.</p>';
   }
?>
