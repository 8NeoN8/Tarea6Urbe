<?php

require("database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AG Laboratories Manager</title>
    <!--Bootstrap 5.1-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/680b73e3a3.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./#.php">AG Medical Laboratories S.A.</a>
  </div>
</nav>
    

    <div class="row">
        <div class="col-md-4 offset-md-4">

            <div class="card card-body">
                <form action="login.php" method="post">                    
                    <div class="form-group">                        
                        <input type="email" name="user_email" class="form-control" placeholder="ingrese su correo" requiered>
                    </div>
                    <div class="form-group">                        
                        <input type="password" name="password" class="form-control" placeholder="ingrese su contraseña" required>
                    </div>
                    <input type="submit" class="btn btn-dark" name="login" value="Log In">
                </form>
            </div>

            <?php
                if(isset($_SESSION['message'])){ ?>

                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['username']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            
            <?php session_unset(); }?>

        </div>
    </div>

<?php
    require("footer.php");
?>