
<?php
    
    $data = [];
    $National_id = $_POST['national_id'];
    $plate_id = $_POST['plate_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $link = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($link ,'car_rental_system') or die(mysqli_error());
    $sql = " INSERT INTO reserve (National_id , plate_id , `start_date`, end_date)  VALUES ('$National_id', '$plate_id', '$start_date', '$end_date') ";
    mysqli_query($link, $sql);
    mysqli_close($link);
    $data['message'] = "the car is reserved successfully";
	   
    echo json_encode($data); 

?>


