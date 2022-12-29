<html>
<?php
 if (isset($_POST['register'])) {
    $model = $_POST['model'];
    $plate_id = $_POST['plate_id'];
    $year = $_POST['year'];
    $office_loc = $_POST['location'];
    if($model == "" || $plate_id=="" || $year=="" || $office_loc=="")
    {
        echo '<script>alert("Please re-enter")</script>';
        $script = "<script>
        location = 'admin.php';</script>";
        echo $script;
    }
    else{
        $link = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
        mysqli_select_db($link ,'car_rental_system') or die(mysqli_error());
        $sql = " INSERT INTO car (plate_id , model , `year`, office_loc)  VALUES ('$plate_id', '$model', '$year', '$office_loc') ";
        mysqli_query($link, $sql);
        mysqli_close($link);
    }
	   
}
 
		   $script = "<script>
		   location = 'admin.php';</script>";
		   echo $script;

?>
</html>