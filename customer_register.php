<?php 
         
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "Car_Rental_System";  
    
    $con = mysqli_connect($host, $user, $password, $db_name);  
    
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
     
    $name = $_POST['name'];
    $email = $_POST['email'];  
    $password = $_POST['password'];  
    $national_id = $_POST['national_id'];
    $phone = $_POST['phone'];
      
    $select_email = mysqli_query($con, "SELECT * FROM Customer WHERE email = '$email' ");
    $select_national = mysqli_query($con, "SELECT * FROM Customer WHERE national_id = '$national_id' ");

    if(mysqli_num_rows($select_email)) {
        echo "<script>
            window.location.href = 'http://localhost/final/customer_register.html';
            alert('E-mail already exists');
        </script>";
    }

    else if(mysqli_num_rows($select_national)) {
        echo "<script>
            window.location.href = 'http://localhost/final/customer_register.html';
            alert('National ID already exists');
        </script>";
    }
        
    else    
    {
        $sql = "INSERT INTO Customer (National_id, cust_name, email, phone, password) VALUES ('$national_id','$name','$email', '$phone', '$password')";
            
            if(mysqli_query($con, $sql)){
                header("Location: http://localhost/final/outline.html", TRUE, 301);
                exit();
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($con);
            }
    } 
 
?>