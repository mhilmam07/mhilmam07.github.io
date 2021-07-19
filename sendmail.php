<?php
use PHPMailer\PHPMailer\PHPMailer;


require_once('I:\xampp\htdocs\myportofolio\phpmailer\Exception.php');
require_once('I:\xampp\htdocs\myportofolio\phpmailer\PHPMailer.php');
require_once('I:\xampp\htdocs\myportofolio\phpmailer\SMTP.php');


$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';        
        $mail->SMTPAuth = true;        
        $mail->Username = 'mhilmam07@gmail.com';
        $mail->Password = 'mandaneo07';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';
        
        $mail->setFrom('mhilmam07@gmail.com');
        $mail->addAddress('mhilmam07@gmail.com');
        
        $mail->isHTML(true);
        $mail->Subject = 'Message Received (Your Portfolio Website)';
        $mail->Body = "<h3>Name : $name <br>Email : $email <br>Messsage : $message</h3>";
        
        $mail->send();
        $alert = '<div class="alert-succes">
        <span>Message has been Sent! Thank You..</span>
        <.div>';
    } catch (Exception $e){
        $alert = '<div class="alert-error">
        <span>'.$e->getMessage().'</span>
        </div>';
    }
}










?>