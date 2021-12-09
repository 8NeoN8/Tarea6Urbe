<?php

include("header.php")

?>

<div class="container">

    <div class="row">

        <div class="col-md-4 offset-md-4">

            <div class="card card-body">

                <form action="makepdf.php" method="post">
                    <h1>PDF TEST</h1>
                    <input type="text" name="name" placeholder="Nombre" class="form-control" required>
                    <input type="text" name="surname" placeholder="Apellido" class="form-control" required>
                    <input type="email" name="email" placeholder="Correo" class="form-control" required>
                    <input type="tel" name="tlf" placeholder="Telefono" class="form-control" required>        
                    <textarea name="message" rows="3" placeholder="Tu mensaje" class="form-control"></textarea>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
                
            </div>

        </div> 

    </div>
</div>

<?php

include('footer.php')

?>