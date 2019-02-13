<?php

	require "../bibliotecas/PHPMailer/Exception.php";
	require '../bibliotecas/PHPMailer/OAuth.php';
	require '../bibliotecas/PHPMailer/PHPMailer.php';
	require '../bibliotecas/PHPMailer/POP3.php';
	require '../bibliotecas/PHPMailer/SMTP.php';


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	/**
	 * 
	 */
	class Email 
	{
		private $para = null;
		private $assunto = null;
		private $mensagem = null;
		
		 public function __set($atrr, $value)
		{
			$this->$atrr = $value;
		}

		public function EmailValidao()
		{
			if(empty($this->para) || empty($this->assunto) ||empty($this->mensagem)){
				return false;
			}
			else{
				return true;
			}
		}
	}


	$novoEmail = new Email();

	$novoEmail->__set('para',$_POST['para']);
	$novoEmail->__set('assunto',$_POST['assunto']);
	$novoEmail->__set('mensagem',$_POST['mensagem']);

	if(!$novoEmail->EmailValidao()){
		echo "Email Inválido";
		die();
	}




	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Não foi possível enviar este email. Detalhes do erro: ', $mail->ErrorInfo;
}