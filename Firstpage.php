


<?php   
    $data = [];
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "Car_Rental_System";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    
    
    $email = $_POST['email'];  
    $password = $_POST['password'];
    $type = $_POST['radio'];

        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password);  
      
        if( $type == 'Customer'){
            $sql = "select * FROM Customer where email = '$email' and password = '$password' ";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            
            if($count == 1){ 
                $national_id = $row['National_id'];
                $data['national_id'] = $national_id;
                $data['type'] = 'Customer';
                $data['message'] = 'Success!';
                $data['success'] = true;
                
            
            }  
            else{   
                $data['type'] = 'Customer';
                $data['success'] = false;
                $data['message'] = 'Login failed. Invalid username or password.!';
            }
        }    
        else {
            $sql = "select * FROM Admin where email = '$email' and password = '$password' ";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            
            $select = mysqli_query($con, "SELECT admin_name FROM Admin where email = '$email' ");
            
            if($count == 1){ 
                $data['message'] = 'Success!';
                $data['success'] = true;
                $data['type'] = 'Admin';
            }  
            else{   
                $data['type'] = 'Admin';
                $data['success'] = false;
                $data['message'] = 'Login failed. Invalid username or password.!';
            } 
    }  


    echo json_encode($data); 
?>