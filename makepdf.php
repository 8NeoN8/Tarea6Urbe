<?php
include("database.php");

    if(isset($_POST['finalizar'])){

        $request_id = $_POST['id'];
        $query = "SELECT * FROM patients WHERE request_id = '$request_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if(!$row){
            echo "no funciona el row tilin";
        }
    }

    if(isset($_POST['finalizar'])){

        require_once('tcpdf_min/tcpdf.php');  
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("EXAMEN AG MEDICAL LABORATORIES");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        $obj_pdf->SetDefaultMonospacedFont('helvetica');  
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false);  
        $obj_pdf->setPrintFooter(false);  
        $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        $obj_pdf->SetFont('helvetica', '', 12);  
        $obj_pdf->AddPage();  
        $content = '';  
        $content .='  
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Paciente:'.$row['patient_first_name'].' '.$row['patient_last_name'].'</th>
                        <th>Edad:'.$row['age'].'</th>
                        <th>Fecha Solicitado:'.$row['date_requested'].'</th>
                        <th>Solicitud: <?php echo$row[request_id]?></th>          
                    </tr>
                    <tr>
                        <th>Peso: '.$row['weightkg'].'</th>                
                        <th>Tipo de Sangre: '.$row['blood_type'].'</th>
                        <th>Correo: '.$row['email'].'</th>
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
                        <td>'.$_POST['hemoglobina'].'</td>
                        <td>gr/di</td>
                        <td>14-18</td>
                    </tr>
                    <tr>
                        <td>HEMATOCRITO</td>
                        <td>'.$_POST['hematocrito'].'</td>
                        <td>%</td>
                        <td>44-61</td>
                    </tr>
                    <tr>
                        <td>CUENTA BLANCA</td>
                        <td>'.$_POST['cuentaBlanca'].'</td>
                        <td>mm3</td>
                        <td>5000-10000</td>
                    </tr>
                    <tr>
                        <td>SEGMENTADOS</td>
                        <td>'.$_POST['segmentados'].'</td>
                        <td>%</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>LINFOCITOS</td>
                        <td>'.$_POST['linfocitos'].'</td>
                        <td>%</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>TOTAL CELULARIDAD</td>
                        <td><'.$_POST['celularidad'].'</td>
                        <td></td>
                        <td>100-100</td>                    
                    </tr>
                    <tr>
                        <td>PLAQUETAS</td>
                        <td>'.$_POST['plaquetas'].'</td>
                        <td>x</td>
                        <td>150000-450000</td>                    
                    </tr>

                    <tr>
                        <th><b>BIOQUIMICA</b></th>
                    </tr>                

                    <tr>
                        <td>GLICEMIA EN AYUNAS</td>
                        <td>'.$_POST['glicemiaAyunas'].'</td>
                        <td>mg/di</td>
                        <td>70-100</td>                    
                    </tr>
                    <tr>
                        <td>COLESTEROL</td>
                        <td>'.$_POST['colesterol'].'</td>
                        <td>mg/di</td>
                        <td>0-200</td>                    
                    </tr>
                    <tr>
                        <td>TRIGLICERIDOS</td>
                        <td>'.$_POST['trigliceridos'].'</td>
                        <td>mg/di</td>
                        <td>36-150</td>                    
                    </tr>
                    
                </tbody>
            </table>
            ';

            $pdfName = 'Examen-'.$row['patient_first_name'].'-'.$row['patient_last_name'].'.pdf';
            $obj_pdf->writeHTML($content);  
            $obj_pdf->Output($pdfName, 'I');  


    }

?>

<?php

require("vendor\phpmailer\phpmailer\src\PHPMailer.php");
require("vendor\phpmailer\phpmailer\src\Exception.php");

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(false);                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('andrespaul0903@example.com', 'Mailer');
    $mail->addAddress($row['email']);     //Add a recipient Name is optional

    //Attachments
    $pdfPath = '/tmp/.'.$pdfname;
    $mail->addAttachment($pdfPath);    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>