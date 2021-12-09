<?php
    require("database.php");
    require("header.php");

?>

<?php
    if(isset($_SESSION['message'])){ ?>

        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['username']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
<?php session_unset(); }?>

<?php

    $query = "SELECT * FROM patients";
    $result = mysqli_query($conn, $query); 

?>

<h1><a href="./nurse.php">back</a></h1>

<div class="row">

    <div class="col-md-6 offset-md-3 bg-dark">

    <div class="card card-body my-2">

            <form action="save.php" method="post">
                <div class="form-group">

                    <select name="patient_name" class="form-control" autofocus required>
                        <?php                                                                                             
                        while($row = mysqli_fetch_array($result)){

                            echo "<option value='$row[patient_first_name]-$row[patient_last_name]'>$row[patient_first_name] $row[patient_last_name]</option>";

                        }?>
                    </select>
                            
                </div>
                <div class="form-group">
                    <input type="date" name="date_requested" class="form-control" required>
                </div>                        
                <input type="submit" class="btn btn-success btn-block" name="save_request" value="Enviar Solicitud">
            </form>

        </div>

    </div>

</div>

<?php
    require("footer.php");
?>