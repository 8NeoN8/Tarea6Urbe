<?php

    include("database.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM exam_request WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die;
        }
    }

    $_SESSION['message'] = 'Solicitud Eliminada';
    $_SESSION['message_type'] = 'danger';

    header("Location: verSolicitudes.php");
?>