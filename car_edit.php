<html>
<?php
 if (isset($_POST['edit'])) {
    $plate_id = $_POST['plateId'];
    $car_status = $_POST['car_status'];
    $link = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($link ,'car_rental_system') or die(mysqli_error());
       $sql = " SELECT * FROM car WHERE plate_id =  '$plate_id'";
       $select = mysqli_query($link, $sql);
      // mysqli_close($link);
	   if(mysqli_num_rows($select) == 0)
	   {
			echo '<script>alert("Wrong Plate ID. Please re-enter")</script>';
	   }
	   else
	    {
		   $sql = " UPDATE Car SET car_status = '$car_status'  WHERE plate_id =  '$plate_id'";
		   mysqli_query($link, $sql);
		   mysqli_close($link);
		   echo '<script>alert("Car edited successfully")</script>';
		   
		}
	 
		   $script = "<script>
		   location = 'admin.php';</script>";
		   echo $script;
 }

?>
</html>
