<html>
<?php
 if (isset($_POST['return'])) {
    $reserve_id = $_POST['reserve_id'];
    $return_date = $_POST['return_date'];
    $link = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($link ,'car_rental_system') or die(mysqli_error());
	
	$sql = " SELECT * FROM reserve WHERE reserve_id =  '$reserve_id'";
   mysqli_query($link, $sql);
   mysqli_close($link);
   if(mysqli_num_rows($select) == 0)
   {
		echo '<script>alert("Wrong Reserve ID. Please re-enter.")</script>';
   }
   else
   {
       $sql = " INSERT INTO `Return` (reserve_id , return_date)  VALUES ('$reserve_id', '$return_date') ";
       mysqli_query($link, $sql);   
	   mysqli_close($link);
	   echo '<script>alert("Return date added successfully.")</script>';
   }
   
		$script = "<script>
		location = 'customer.html';</script>";
		echo $script;
   
 }

?>
</html>