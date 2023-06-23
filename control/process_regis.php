<?php
require 'connect_db.php';


if(isset($_POST['dangki'])){
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

  
      

            $query = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($connect, $query);
        
            if (mysqli_num_rows($result) > 0) {
                echo '<script language="javascript">alert("Email đã được đăng kí vui lòng đăng kí lại !"); window.location="../Register.php"</script>';
                die ();
            } else {
               
        
                $query2 = "INSERT INTO user (user_name, email, password,phone, address )
                          VALUES ('$name', '$email', '$password','$phone', '$address')";
        
        $result = mysqli_query($connect, $query2);   
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="../Login.php"</script>';
       
        die ();
        

            }
        }
    