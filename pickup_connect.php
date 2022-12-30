<html>
<?php
 if (isset($_POST['pickup'])) {
    $reserve_id = $_POST['reserve_id2'];
    $pickup_date = $_POST['pick_up_date2'];
    $link = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($link ,'car_rental_system') or die(mysqli_error());
	
   $sql = " SELECT * FROM reserve WHERE reserve_id =  '$reserve_id'";
   $select = mysqli_query($link, $sql);
   // mysqli_close($link);
   if(mysqli_num_rows($select) == 0)
   {
		echo '<script>alert("Wrong Reserve ID. Please re-enter.")</script>';
   }
   else
   {
	   $sql = " INSERT INTO Pickup (reserve_id , pickup_date)  VALUES ('$reserve_id', '$pickup_date') ";
       mysqli_query($link, $sql);
       mysqli_close($link);
	   
	   echo '<script>alert("Pickup date added successfully.")</script>';

   }
   
   		$script = "<script>
		location = 'customer.html';</script>";
		echo $script;
 }

?>
</html>