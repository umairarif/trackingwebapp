<?php

$field_name = $_POST['userName'];

$field_email = $_POST['userEmail'];

$field_message = $_POST['userMsg'];

$field_phone= $_POST['userPhone'];



$mail_to = 'bosch-dento@hotmail.co.uk';

$subject = 'Message from a site visitor '.$field_name;



$body_message = 'From: '.$field_name."\n";
$body_message= 'Phone: '.$field_phone."\n";
$body_message .= 'E-mail: '.$field_email."\n";

$body_message .= 'Message: '.$field_message;



$headers = 'From: '.$field_email."\r\n";

$headers .= 'Reply-To: '.$field_email."\r\n";



$mail_status = mail($mail_to, $subject, $body_message, $headers);



if ($mail_status) { ?>

	<script language="javascript" type="text/javascript">

		alert('Thank you for the message. We will contact you shortly.');

		window.location = 'contact.html';

	</script>

<?php

}


?>