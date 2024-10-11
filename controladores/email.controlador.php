<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

  $phpmailer = new PHPMailer();
  $phpmailer->isSMTP();                                          //Send using SMTP
  $phpmailer->Host = 'smtp.gmail.com';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 587;
  $phpmailer->Username = '';
  $phpmailer->Password = '';                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $phpmailer->setFrom('beckalan303@gmail.com', 'Area de soporte');
  $phpmailer->addAddress($_GET['email']);     //Add a recipient

  //Content
  $phpmailer->isHTML(true);                                  //Set email format to HTML
  $phpmailer->Subject = 'Cambio de password';
  $phpmailer->Body    = 'Para cambiar su password ingrese <a href="http://127.0.0.1:8000/index.php?page=password_olvidado&id_usuario='.$_GET['id_usuario'].'">aqui</a>';
  $phpmailer->AltBody = 'Por favor habilite el html, no seas boton';

  $phpmailer->send();
  header('Location: ../index.php?page=listado_usuarios&message=Se ha enviado un email para cambiar su password&status=success');

?>
