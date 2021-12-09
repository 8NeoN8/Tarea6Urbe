<?php
    require("database.php");
    require("header.php");

?>
<h1><a href="./nurse.php">back</a></h1>

<?php
    if(isset($_SESSION['message'])){ ?>

        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
<?php session_unset(); }?>

<div class="row">

    <div class="col-md-6 offset-md-3">

        <div class="card card-body">

            <form action="save.php" method="post">
                <div class="form-group">
                    <input type="text" name="patient_first_name" class="form-control" placeholder="Nombre del paciente" autofocus required>
                </div>
                <div class="form-group">
                    <input type="text" name="patient_last_name" class="form-control" placeholder="Apellido del paciente" autofocus required>
                </div>
                <div class="form-group">
                    <input type="number" name="age" class="form-control" placeholder="Edad del paciente" autofocus required>
                </div>
                <div class="form-group">
                    <input type="float" name="weightkg" class="form-control" placeholder="Peso del paciente en Kg" autofocus required>
                </div>
                <div class="form-group">
                    <input type="text" name="blood_type" class="form-control" placeholder="Tipo de sangre del paciente" autofocus required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email del paciente" autofocus required>
                </div>
                
                <input type="submit" class="btn btn-success btn-block" name="save_patient" value="Guardar Registro">
            </form>

        </div>

    </div>

</div>







<?php
    require("footer.php");
?>