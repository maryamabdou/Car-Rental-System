<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
  </head>
<body>

<h1><?php echo "The optgroup element" ?></h1>

<p>The optgroup tag is used to group related options in a drop-down list:</p>

<form action="reserve.php" method="Post">
	<?php 
if (isset($_POST['submit'])) {
    $pickup_date = $_POST['pick_up_date'];
    $return_date = $_POST['return_date'];
    $link = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    mysqli_select_db($link ,'car_rental_system') or die(mysqli_error());
	$sql = "SELECT plate_id, model,`year` FROM car NATURAL LEFT OUTER JOIN reserve WHERE car_status = 'active' and ( (end_date < '$pickup_date') or (`start_date` > '$return_date') or (`start_date` is NULL)  ) ";
	$select = mysqli_query($link, $sql);
	  
	if (mysqli_num_rows($select)>0){
    echo "
    <table id=\"example\" class=\"table table-striped table-bordered\" style=\"width:100%\">
    <thead>
    <tr>
    <th>Plate_Id</th>
    <th>Model</th>
    <th>Year</th>
    </tr>
    </thead>
    <tbody>";
    
    while($row = mysqli_fetch_array($select))
    {
    echo "<tr onclick=\"callme(this)\">";
    echo "<td>" . $row['plate_id'] . "</td>";
    echo "<td>" . $row['model'] . "</td>";
    echo "<td>" . $row['year'] . "</td>";
    echo "</tr>";
    }
    echo "</tbody>
   
</table>";

    }  
	else{
		echo "none";
	}
	mysqli_close($link);
}
?>
<input type="text" id="id_type" />
<input type="text" id="event_category" />
<input type="text" id="description" />
<input type="text" id="national" />
  <br><br>
  <button type="submit" name="reserve" class="btn btn-success">
                    Reserve
                  </button>
</form>
<p id="demo"></p>
<script>
  let national = sessionStorage.getItem('data') ;
  let p_i;
  sessionStorage.setItem('data',national);
  function callme(e)
{
  var tds=e.getElementsByTagName('td');
  document.getElementById("id_type").value = tds[0].innerHTML.trim();
  document.getElementById("event_category").value = tds[1].innerHTML.trim();
  document.getElementById("description").value = tds[2].innerHTML.trim();
  document.getElementById("national").value = national;
  p_i= tds[0].innerHTML.trim();

}
$(document).ready(function () {
                $('#example').DataTable();
            });

            
 $(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
      national_id: national,
      plate_id: p_i,
      start_date:" <?php echo $_POST['pick_up_date']; ?>" ,
      end_date: "<?php echo $_POST['return_date']; ?>",
     
    };

    $.ajax({
      type: "POST",
      url: "reserve.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      document.getElementById("demo").innerHTML = data['message'];
      console.log(data);
     // alert(data['message']);
    });

    event.preventDefault();
  });
});           
</script>


 
</body>
</html>
