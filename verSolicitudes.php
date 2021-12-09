<?php
    require("database.php");    

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
    require("header.php");

?>

<h1><a href="./doctor.php">back</a></h1>

<div class="col-md-8 offset-md-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre de Paciente</th>
                <th>Apellido de Paciente</th>
                <th>Fecha Solicitado</th>
                <th>Estado de la solicitud</th>                
                <th>Solicitud</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    
                $query = "SELECT * FROM exam_request";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){?>

                    <tr>
                        <td>
                            <?php                                
                                echo $row['patient_first_name'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['patient_last_name'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['date_requested'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['request_status'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['request_id'];                                
                            ?>
                        </td>
                        <td>
                            <a href="examen.php?request_id=<?php echo $row['request_id']; ?>" class="btn btn-primary" tittle="Realizar Examen">
                            <i class="fas fa-marker"></i>
                            </a>
                            <a href="deleteRequest.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" tittle="Realizar Examen">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>                      
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</div>


<?php
    require("footer.php");
?>