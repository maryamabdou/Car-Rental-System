<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
  </head>
<?php
session_start();
if (isset($_POST['Display1'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $link = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($link ,'car_rental_system') or die(mysqli_error());
    
    $sql = "SELECT National_id,cust_name, email,phone,password,plate_id, model,`year`,office_loc,car_status FROM reserve 
    NATURAL JOIN car 
    NATURAL JOIN customer 
    WHERE (start_date BETWEEN '$start' and '$end') OR (end_date BETWEEN '$start' and '$end')";

    $result = mysqli_query($link, $sql);

    
    echo "
    <table id=\"example\" class=\"table table-striped table-bordered\" style=\"width:100%\">
    <thead>
    <th>National_id</th>
    <th>cust_name</th>
    <th>email</th>
    <th>phone</th>
    <th>password</th>
    <th>plate_id</th>
    <th>model</th>
    <th>year</th>
    <th>office_loc</th>
    <th>car_status</th>
    </tr>
    </thead>
    <tbody>";

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<td>" . $row['National_id'] . "</td>";
            echo "<td>" . $row['cust_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['plate_id'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['office_loc'] . "</td>";
            echo "<td>" . $row['car_status'] . "</td>";
            echo "</tr>";
        }
    }
    echo "</tbody>
    </table>";
    mysqli_close($link);
}

?>
<body>
<input type="submit" name="print" value="Print" onclick="window.print()">
</body>
<script>
$(document).ready(function () {
                $('#example').DataTable();
            });
</script>
</html>