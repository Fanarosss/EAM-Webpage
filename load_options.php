<?php
include('./src/session.php');
include('./src/config.php');

if (isset($_POST['uid'])){
  $uni_id = mysqli_escape_string($conn, $_POST['uid']);
  $query = "SELECT * FROM department WHERE department.University_id = '".$uni_id."'";
  $result = $conn->query($query);
  ?>
  <option value="">-- Choose Department --</option>
  <?php
	while($department=$result->fetch_assoc()) {
    ?>
  	<option name="department" value="<?php echo $department["Id"]; ?>"><?php echo $department["Name"]; ?></option>
    <?php
  }
}
?>
