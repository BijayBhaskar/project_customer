<!DOCTYPE html>
<html>
<head>
	<title>Send mail from PHP using SMTP</title>
	
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<h1 class="text-center"> Email </h1>

<hr>
	<?php 
	require_once 'vendor/autoload.php';
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\PHPMailer;
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
	<div class="row">
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
        	<div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">To Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email_id" maxlength="50" required="email">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder= "Enter Subject" maxlength="50" required="subject">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">Message:</label>
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your Message Here" maxlength="6000" rows="4"></textarea>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">File:</label>
                    <input name="file[]" multiple="multiple" class="form-control" type="file" id="file">
                </div>
            </div>-->
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendmail" class="btn btn-lg btn-primary ">Send</button>
                </div>
            </div>
        </form>
	</div>
</div>
</body>
</html>