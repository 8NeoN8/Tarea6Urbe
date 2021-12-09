<?php

    include("database.php");

    if(isset($_GET['request_id'])){
        $request_id = $_GET['request_id'];
        $query = "SELECT * FROM patients WHERE request_id = '$request_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if(!$row){
            echo "no funciona el row tilin";
        }
        
    }
    

    include("header.php");

?>

<div class="col-md-8 offset-md-2">
    <form action="makepdf.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo$request_id?>">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Paciente: <?php echo$row['patient_first_name']; echo" $row[patient_last_name]"?></th>
                    <th>Edad: <?php echo$row['age']?> </th>
                    <th>Fecha Solicitado: <?php echo$row['date_requested']?></th>
                    <th>Solicitud: <?php echo$row['request_id']?></th>          
                </tr>
                <tr>
                    <th>Peso: <?php echo$row['weightkg']?></th>                
                    <th>Tipo de Sangre: <?php echo$row['blood_type']?></th>
                    <th>Correo: <?php echo$row['email']?></th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th><b>Hematologia</b></th>
                    <th>Resultado</th>
                    <th>Unidads</th>
                    <th>Valor de Referencia</th>
                </tr>

                <tr>
                    <th>Hematologia + Plaquetas</th>
                </tr>
                <tr>
                    <td>HEMOGLOBINA</td>
                    <td><input type="float" name="hemoglobina" min="0"></td>
                    <td>gr/di</td>
                    <td>14-18</td>
                </tr>
                <tr>
                    <td>HEMATOCRITO</td>
                    <td><input type="float" name="hematocrito" min="0"></td>
                    <td>%</td>
                    <td>44-61</td>
                </tr>
                <tr>
                    <td>CUENTA BLANCA</td>
                    <td><input type="float" name="cuentaBlanca" min="0"></td>
                    <td>mm3</td>
                    <td>5000-10000</td>
                </tr>
                <tr>
                    <td>SEGMENTADOS</td>
                    <td><input type="float" name="segmentados" min="0"></td>
                    <td>%</td>
                    <td></td>
                </tr>
                <tr>
                    <td>LINFOCITOS</td>
                    <td><input type="float" name="linfocitos" min="0"></td>
                    <td>%</td>
                    <td></td>
                </tr>
                <tr>
                    <td>TOTAL CELULARIDAD</td>
                    <td><input type="float" name="celularidad" min="0"></td>
                    <td></td>
                    <td>100-100</td>                    
                </tr>
                <tr>
                    <td>PLAQUETAS</td>
                    <td><input type="float" name="plaquetas" min="0"></td>
                    <td>x</td>
                    <td>150000-450000</td>                    
                </tr>

                <tr>
                    <th>BIOQUIMICA</th>
                </tr>                

                <tr>
                    <td>GLICEMIA EN AYUNAS</td>
                    <td><input type="float" name="glicemiaAyunas" min="0"></td>
                    <td>mg/di</td>
                    <td>70-100</td>                    
                </tr>
                <tr>
                    <td>COLESTEROL</td>
                    <td><input type="float" name="colesterol" min="0"></td>
                    <td>mg/di</td>
                    <td>0-200</td>                    
                </tr>
                <tr>
                    <td>TRIGLICERIDOS</td>
                    <td><input type="float" name="trigliceridos" min="0"></td>
                    <td>mg/di</td>
                    <td>36-150</td>                    
                </tr>
                
            </tbody>
        </table>
        <button type="submit" name="finalizar" class="btn btn-primary">Finalizar Examen</button>
    </form>
</div>

<?php
    include("footer.php");
?>

<?php


?>