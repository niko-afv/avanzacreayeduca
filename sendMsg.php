<?php
/*include_once './third-party/PHPMailer/class.phpmailer.php';

$content = $_POST['vars'];

$texto = "Alguien te enviado sus datos desde el formulario de contacto de http://www.avanzacreayeduca.cl";
$texto .= "<br/> con las siguiente informaci&oacute;n  <br /><br />";

foreach($content as $item => $val){
    //$texto .= " <strong> ".$item .": </strong> ". $val." <br />";
}

$mail = new PHPMailer();

$mail->From = 'niko.afv@gmail.com';
$mail->FromName = 'Avanza Crea y Educa';
$mail->addAddress('niko.afv@gmail.com', 'Nicolás Fredes');  // Add a recipient
$mail->isHTML(true);
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';


if($mail->send()){
    $respuesta = TRUE;
}else{
    $respuesta = FALSE;
}

echo json_encode($respuesta);*/
?>




<?php
$nombre = $_POST['vars']['nombre'];
$apellido = $_POST['vars']['apellido'];
$email = $_POST['vars']['email'];
$comentario = $_POST['vars']['mensaje'];

$html = "
 <h3>Contacto - Avanza Crea y Educa</h3>
 <br    /><strong>Nombre:</strong> " . $nombre . " " . $apellido .
"<br    /><strong>E-mail:</strong> " . $email .
"<br    /><strong>Comentario:</strong>  " . $comentario .
"";

date_default_timezone_set('America/Santiago');
require_once('./third-party/PHPMailer/class.phpmailer.php');

$mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores.
$mail->IsSMTP();

try {
//------------------------------------------------------
    $correo_emisor="monsalve.veronica@gmail.com";
    $nombre_emisor="Contacto Avanza, Crea y Educa";
    $contrasena="vmamada19";
    $correo_destino="monsalve.veronica@gmail.com";
    $nombre_destino="Contacto Avanza, Crea y Educa";
    $correo_destino2="niko.afv@gmail.com";
    $nombre_destino2="Nicolás Fredes";
//--------------------------------------------------------
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->Username   = $correo_emisor;
    $mail->Password   = $contrasena;
    $mail->AddReplyTo($correo_emisor, $nombre_emisor);
    $mail->AddAddress($correo_destino, $nombre_destino);
    $mail->AddAddress($correo_destino2, $nombre_destino2);
    $mail->SetFrom($correo_emisor, $nombre_emisor);
    $mail->Subject = 'Contacto - Avanza, crea y Educa';
    $mail->MsgHTML($html);
//----------------------------------------------------------
    $respuesta = "";
    if($mail->Send()){
        $respuesta = TRUE;
    }else{
        $respuesta = FALSE;
    }
    echo json_encode($respuesta);
} catch (phpmailerException $e) {    
    $respuesta = FALSE;
    echo json_encode($respuesta);
}