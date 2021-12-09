<?php

    require("database.php");

    $email = $_POST['user_email'];
    $password = $_POST['password'];


    $query = "SELECT * from lab_users where email = '$email' and password = '$password'";

    $result = mysqli_query($conn, $query);

    $users = mysqli_fetch_array($result);

    $rows = mysqli_num_rows($result);

    if($rows){
        $username = $users['username'];
        $_SESSION['message'] = "Bienvenido enfermera/o $username";
        $_SESSION['message_type'] = "success";
        if($users['role']==="doctor"){
            header("Location: doctor.php");      
        }else{
            header("Location: nurse.php");      
        }
    }else{
        $_SESSION['message'] = "Datos Incorrectos. Intentelo de Nuevo";
        $_SESSION['message_type'] = "danger";
        header("Location:index.php");
    }



    

    /*$query2 = "SELECT * FROM lab_users";

    $result2 = mysqli_query($conn, $query2);

    

    if($array['counting']>=0){
        
        
    }else{
        
    }*/

?>