<?php
session_start();
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

require "mailer/PHPMailer.php";
require "mailer/OAuth.php";
require "mailer/SMTP.php";
require "mailer/POP3.php";
require "mailer/Exception.php";


use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPmailer();

//Configurações do servidor
$mail->SMTPDebug = 2; 
$mail->isSMTP();
$mail->Host = 'smtp1.exemplo.com;smtp2.exemplo.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "rodrigopiska12@gmail.com";
$mail->Password = "Rodrigo13";

//Destinatario
$mail->setFrom("rodrigopiska12@gmail.com ", "TESTANDO");
$mail->addAddress("rodrigopiska12@gmail.com"); // Pra quem você quer enviar o email, nome é opcional

//Conteudo
$mail->isHTML(true); 
$mail->subject ="Titulo da mensagem";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->Body = 'Corpo da mesangem';
$mail->AltBody = 'Um corpo mais simples pra que não da suporte a email com HTML';

#Mensagem em modo TEXTO
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

#Verifica se o email foi enviado
if($mail->send){
    $_SESSION['success']="Email enviado!";
    header("location: index.php");
}else{
    $_SESSION['danger']="Falha ao enviar email!";
    header("location: contato.php");
}



