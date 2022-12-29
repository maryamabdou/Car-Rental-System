<html lang="en">
<head>
    <link rel = "stylesheet" href = "websiteadmin.css"> 
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
  <body>
    <div class = "container">
        <nav>
        <div class="nav nav-tabs  nav-fill" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register" aria-selected="true">Register Car</button>
          <button class="nav-link" id="nav-edit-tab" data-bs-toggle="tab" data-bs-target="#nav-edit" type="button" role="tab" aria-controls="nav-edit" aria-selected="false">Edit Car</button>
          <button class="nav-link" id="nav-report-tab" data-bs-toggle="tab" data-bs-target="#nav-report" type="button" role="tab" aria-controls="nav-report" aria-selected="false">See Reports</button>
          <button class="nav-link" id="nav-search-tab" data-bs-toggle="tab" data-bs-target="#nav-search" type="button" role="tab" aria-controls="nav-search" aria-selected="false">Search</button>
         
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        
        <!-- content of register car -->
        <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
        <form id="Car_Registeration"  onsubmit="validateRegisterForm()" action="car_register.php" method="post">
                <h1>Car Registeration</h1>
                <label for="model"><strong>Model</strong></label>
                <input type="text" id="model" name="model" placeholder="Enter Model" >
                <label for="plate_id"><strong>Plate ID</strong></label>
                <input type="text" id="plate_id" name="plate_id" placeholder="Enter Plate ID">
                <label for="year"><strong>Year</strong></label>
                <input type="text" id="year" name="year" placeholder="Enter Year">
                <label for="location"><strong>Office Location</strong></label>
                <input type="text" id="location" name="location" placeholder="Enter Location">
                <input type="submit" name="register" value="Register">
            </form>
        </div>

        <!-- content of edit car -->
        <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
            <form id="Car_Edit"  action="car_edit.php" onsubmit="validateEditForm()" method="post">
                <h1>Car Edit</h1>
                <label for="plateId"><strong>Plate ID</strong></label>
                <input type="text" id="plateId" name="plateId" placeholder="Enter Plate ID">
                <label for="car_status"><strong>Car Status</strong></label>
                <input type="text" id="car_status" name="car_status" placeholder="Enter Car Status">
                <input type="submit" name="edit" value="Edit">
            </form>
        </div>

        <!-- content of report car -->
        <div class="tab-pane fade" id="nav-report" role="tabpanel" aria-labelledby="nav-report-tab">
            <h1>Reports</h1>
            <select name="report_list" id="report_list">
                <option value="reservations">All Reservations in a specific period</option>
                <option value="reservation_car">Reservations of a car in a specific period</option>
                <option value="car_status">Car status on a specific day</option>
                <option value="reservation_customer">All Reservations of a specific customer</option>
                <option value="payments">Daily Payments</option>
            </select>
            <input type="submit" value="get option" onclick="option()">

            <form id="report1" action="report1.php" method="post" onsubmit="return validation1()">
            <div id="comp1" style="display:none">
                <label for="start"><strong>Beginning Date</strong></label>
                <input type="text" id="start" name="start" placeholder="Enter Beginning Date">
                <label for="end"><strong>End Date</strong></label>
                <input type="text" id="end" name="end" placeholder="Enter End Date">
                <input type="submit" name="Display1" value="Display">
            </div>
            </form>

            <form id="report2" action="report2.php" method="post" onsubmit="return validation2()">
            <div id="comp2" style="display:none">
                <label for="start2"><strong>Beginning Date</strong></label>
                <input type="text" id="start2" name="start2" placeholder="Enter Beginning Date">
                <label for="end2"><strong>End Date</strong></label>
                <input type="text" id="end2" name="end2" placeholder="Enter End Date">
                <label for="car"><strong>Plate ID</strong></label>
                <input type="text" id="car" name="car" placeholder="Enter Plate ID">
                <input type="submit" name="Display2" value="Display">
            </div>
            </form>

            <form id="report3" action="report3.php" method="post" onsubmit="return validation3()">
            <div id="comp3" style="display:none">
                <label for="date"><strong>Date</strong></label>
                <input type="text" id="date" name="date" placeholder="Enter the Date">
                <input type="submit" name="Display3" value="Display">
            </div>
            </form>

            <form id="report4" action="report4.php" method="post" onsubmit="return validation4()">
            <div id="comp4" style="display:none">
                <label for="customer"><strong>National ID</strong></label>
                <input type="text" id="customer" name="customer" placeholder="Enter National ID">
                <input type="submit" name="Display4" value="Display">
            </div>
            </form>

            <form id="report5" action="report5.php" method="post" onsubmit="return validation5()">
            <div id="comp5" style="display:none">
                <label for="start3"><strong>Beginning Date</strong></label>
                <input type="text" id="start3" name="start3" placeholder="Enter Beginning Date">
                <label for="end3"><strong>End Date</strong></label>
                <input type="text" id="end3" name="end3" placeholder="Enter End Date">
                <input type="submit" name="Display5" value="Display">
            </div>
            </form>
        </div>

        <!-- content of search car -->
        <div class="tab-pane fade" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">
            <?php
            $link = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
            mysqli_select_db($link ,'car_rental_system') or die(mysqli_error());
            
            $sql = "SELECT * FROM customer 
            NATURAL JOIN car 
            NATURAL JOIN reserve 
            UNION 
            SELECT NULL AS national_id, plate_id, NULL AS cust_name, NULL AS email, NULL AS phone, NULL AS password, 
            model, `year`, office_loc, car_status ,
            NULL AS reserve_id, NULL AS start_date, NULL AS end_date FROM car WHERE plate_id NOT IN (SELECT plate_id FROM reserve) 
            UNION 
            SELECT national_id, NULL AS plate_id, cust_name, email, phone,password, 
            NULL AS model, NULL AS `year`, NULL AS office_loc, NULL AS car_status ,
            NULL AS reserve_id, NULL AS start_date, NULL AS end_date FROM customer WHERE national_id NOT IN (SELECT national_id FROM reserve)";

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
            <th>reserve_id</th>
            <th>start_date</th>
            <th>end_date</th>
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
                    echo "<td>" . $row['reserve_id'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['end_date'] . "</td>";
                    echo "</tr>";
                }
            }
            echo "</tbody>
            </table>";
            mysqli_close($link);
            ?>
        </div>

      </div>
        </div>
      <script>
        function validateEditForm(){
            var plateId = document.getElementById('plateId').value;
            var car_status = document.getElementById('car_status').value;
            if(plateId == '' || car_status == '')
            {
                alert("You need to fill an empty field field");
				return false;
            }
        }

        function validateRegisterForm(){
            var model = document.getElementById('model').value;
            var plate_id = document.getElementById('plate_id').value;
            var year = document.getElementById('year').value;
            var location = document.getElementById('location').value;
            if(model == '' || plate_id == '' || year == '' || location == '')
            {
                alert("You need to fill an empty field");
                return false;
            }

        }

        function option(){
            selectElement = document.querySelector('#report_list');
            output = selectElement.options[selectElement.selectedIndex].value;
            
            if (output == "reservations"){
                comp1.style.display = "block";
                comp2.style.display = "none";
                comp3.style.display = "none";
                comp4.style.display = "none";
                comp5.style.display = "none";
            }
            if (output == "reservation_car"){
                comp2.style.display = "block";
                comp1.style.display = "none";
                comp3.style.display = "none";
                comp4.style.display = "none";
                comp5.style.display = "none";
            }
            if (output == "car_status"){
                comp3.style.display = "block";
                comp1.style.display = "none";
                comp2.style.display = "none";
                comp4.style.display = "none";
                comp5.style.display = "none";
            }
            if (output == "reservation_customer"){
                comp4.style.display = "block";
                comp1.style.display = "none";
                comp2.style.display = "none";
                comp3.style.display = "none";
                comp5.style.display = "none";
            }
            if (output == "payments"){
                comp5.style.display = "block";
                comp1.style.display = "none";
                comp2.style.display = "none";
                comp3.style.display = "none";
                comp4.style.display = "none";
            }              
        }

        function validation1(){
            var s = start.value;
            var e = end.value;
            
            if(e=="" && s==""){
                alert("Please enter the start and end date");
                return false;
            }
            
            if(e=="" || s==""){
                if(e=="")
                    alert("Please enter the end date");
                
                if(s=="")
                    alert("Please enter the start date");

                return false;
            }
        }

        function validation2(){
            var s = start2.value;
            var e = end2.value;
            var p = car.value;
            
            if(e=="" && s==""){
                alert("Please enter the data");
                return false;
            }
            
            if(e=="" || s=="" || p==""){
                if(e=="")
                    alert("Please enter the end date");
                
                if(s=="")
                    alert("Please enter the start date");

                if(p=="")
                    alert("Please enter the plate id");

                return false;
            }
        }

        function validation3(){
            var d = date.value;
            
            if(d==""){
                alert("Please enter the date");
                return false;
            }
        }

        function validation4(){
            var d = customer.value;
            
            if(d==""){
                alert("Please enter the national id");
                return false;
            }
        }

        function validation5(){
            var s = start3.value;
            var e = end3.value;
            
            if(e=="" && s==""){
                alert("Please enter the start and end date");
                return false;
            }
            
            if(e=="" || s==""){
                if(e=="")
                    alert("Please enter the end date");
                
                if(s=="")
                    alert("Please enter the start date");

                return false;
            }
        }

        
        $(document).ready(function () {
            $('#example').DataTable();
        });
      </script>
</body>
</html>