<?php

    include("database.php");
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

<div class="col-md-8 offset-md-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Peso</th>
                <th>Tipo de Sangre</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    
                $query = "SELECT * FROM patients";
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
                                echo $row['age'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['weightkg'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['blood_type'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['email'];                                
                            ?>
                        </td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
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