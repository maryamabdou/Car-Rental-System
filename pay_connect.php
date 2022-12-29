<html>
<?php
 if (isset($_POST['pay'])) {
    $reserve_id = $_POST['reserve_id'];
    $payment_date = $_POST['payment_date'];
	$payment = $_POST['payment'];
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
       $sql = " INSERT INTO payment (reserve_id, price, payment_date)  VALUES ('$reserve_id', '$payment', '$payment_date') ";
       mysqli_query($link, $sql);
       mysqli_close($link);
	   
	   echo '<script>alert("Payment accepted.")</script>';
   }
   
		$script = "<script>
		location = 'customer.html';</script>";
		echo $script;
 }

?>
</html>