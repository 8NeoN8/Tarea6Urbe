<?php
include("database.php");

if(isset($_POST['save_patient'])){
    $patient_first_name = $_POST['patient_first_name'];
    $patient_last_name = $_POST['patient_last_name'];
    $patient_first_name = strtoupper($patient_first_name);
    $patient_last_name = strtoupper($patient_last_name);
    $age = $_POST['age'];
    $weightkg = $_POST['weightkg'];
    $blood_type = $_POST['blood_type'];
    $blood_type = strtoupper($blood_type);
    $email = $_POST['email'];

    $query = "INSERT INTO patients(patient_first_name, patient_last_name, age, weightkg, blood_type, email) VALUES ('$patient_first_name', '$patient_last_name', '$age', '$weightkg', '$blood_type', '$email')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        $_SESSION['message'] = "Fallo al Registrar Paciente!";
        $_SESSION['message_type'] = "danger";
        header("Location:ingresaPaciente.php");

    }else{
        $_SESSION['message'] = "Paciente Registrado!";
        $_SESSION['message_type'] = "success";

        header("Location:$_SESSION[role].php");
    }
}

if(isset($_POST['save_request'])){
    $name = explode("-",$_POST['patient_name']);
    $patient_first_name = $name[0];
    $patient_last_name = $name[1];
    $patient_first_name = strtoupper($patient_first_name);
    $patient_last_name = strtoupper($patient_last_name);
    $request_id = uniqid();
    $date_requested = $_POST['date_requested'];

    $query = "INSERT INTO exam_request(patient_first_name,patient_last_name, date_requested, request_id) VALUES ('$patient_first_name','$patient_last_name', '$date_requested', '$request_id')";
    $result = mysqli_query($conn, $query);

    $query2 = "UPDATE patients SET request_id = '$request_id', date_requested = '$date_requested' WHERE patient_first_name = '$patient_first_name' AND patient_last_name = '$patient_last_name'";
    $result2 = mysqli_query($conn, $query2);

    if(!$result){
        $_SESSION['message'] = "Fallo al Enviar Solicitud!";
        $_SESSION['message_type'] = "danger";
        header("Location:solicitarExamen.php");

    }else{
        $_SESSION['message'] = "Solicitud Enviada!";
        $_SESSION['message_type'] = "success";
        header("Location:nurse.php");
    }

    if(!$result2){
        $_SESSION['message'] = "Fallo al Enviar Solicitud!";
        $_SESSION['message_type'] = "danger";
        header("Location:solicitarExamen.php");

    }else{
        $_SESSION['message'] = "Solicitud Enviada!";
        $_SESSION['message_type'] = "success";
        header("Location:$_SESSION[role].php");
    }

}

?>