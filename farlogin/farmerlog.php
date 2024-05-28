<?php
         if(isset($_POST['farsubmit']))
         {
          
            $host="localhost";
            $user="root";
            $password="";
            $db_name="doctor";
            $con = mysqli_connect($host, $patientid, $db_name);  
            if(mysqli_connect_errno()) {  
                die("Failed to connect with MySQL: ". mysqli_connect_error());  
             }  
            $username1 = $_POST['tableuser']; 
            $username=strtolower($username1);
            $password = $_POST['pass'];  
          
            //to prevent from mysqli injection  
            $username = stripcslashes($patientid);  
            $username = mysqli_real_escape_string($con, $patientid);   
          
            $sql = "select *from farmsign where user = '$patientid'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
                echo "<h1> Login Sucessfull.</h1>"; 
                header("Location:../analysis/home.php?tname=$patientid");
            }  
            else{  
                
                header("Location:farlogin.php?error=error");
                echo "<h1> Login failed. Invalid username or password.</h1>";  
            }     
 
         } 
        
    ?>