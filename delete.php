<?php

    include("database.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM patients WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die;
        }
    }

    $_SESSION['message'] = 'Registro de Paciente Eliminado';
    $_SESSION['message_type'] = 'danger';

    header("Location: verPacientes.php");
?>