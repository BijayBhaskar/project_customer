<?php 
	require_once 'vendor/autoload.php';
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
		if(isset($_POST['sendmail'])) {
			
			require 'vendor/phpmailer/phpmailer/src/Exception.php';
			require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
			require 'vendor/phpmailer/phpmailer/src/SMTP.php';

			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Mailer = "smtp";

			$mail->SMTPDebug  = 1;  
			$mail->SMTPAuth   = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port       = 2525;
			$mail->Host = 'smtp.elasticemail.com';
			$mail->Username = "bijay@facebook.com";                
			$mail->Password = "5B727105EAED1BA09368BC61B15A17F0BFBFC0AE45554889978300B24D7B2E8AF7088A44E80929F34FD0D79C6281D822";                           
			$mail->setFrom("bijay@facebook.com", 'customer');
			$mail->addAddress($_POST['email']);     
			$mail->addReplyTo("bijay@facebook.com");
			for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    
			}
			$mail->isHTML(true);                                  
			$mail->Subject = $_POST['subject'];
			$mail->Body    = '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';
			$mail->AltBody = $_POST['message'];

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
	 ?>