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
		private $senhaTeste = null;
		private $emailTeste = null;
		
		 public function __set($atrr, $value)
		{
			$this->$atrr = $value;
		}

		 public function __get($atrr)
		{
			return $this->$atrr;
		}

		public function EmailValidao()
		{
			if(empty($this->para) || empty($this->assunto) ||empty($this->mensagem) ||empty($this->senhaTeste) ||empty($this->emailTeste)){
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
	$novoEmail->__set('senhaTeste', $_POST['senha-teste']);
	$novoEmail->__set('emailTeste',$_POST['email-teste']);

	if(!$novoEmail->EmailValidao()){
		echo "Email Inválido";
		die();
	}




	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $novoEmail->__get('emailTeste');                 // SMTP username
    $mail->Password = $novoEmail->__get('senhaTeste');                          // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($novoEmail->__get('emailTeste'), 'Mailer');
    $mail->addAddress($novoEmail->__get('para'), 'Joe User');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
   //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $novoEmail->__get('assunto');
    $mail->Body    = $novoEmail->__get('mensagem');
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensagem foi enviado';
} catch (Exception $e) {
    echo 'Não foi possível enviar este email. Detalhes do erro: ', $mail->ErrorInfo;
}