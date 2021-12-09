<?php
    require("database.php");
    require("header.php");

?>

<?php
    if(isset($_SESSION['message'])){ ?>

        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
<?php session_unset(); }?>

<?php

    $_SESSION['role'] = "doctor";

?>
<h1><a href="./index.php">back</a></h1>


<div class="row">

        <div class="col-md-6 offset-md-3 bg-dark">

        <h1><a href="./ingresaPaciente.php">Ingresar Paciente</a></h1>
        <h1><a href="./verPacientes.php">Ver Pacientes</a></h1>
        <h1><a href="./verSolicitudes.php">Ver Solicitudes de Examen</a></h1>

        </div>

</div>


<?php
    require("footer.php");
?>