<?php
function spamcheck($field)
  {
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }
  
  /////////////////////////////////////////////
  if (isset($_POST['e-mail']))
  {//if "email" is filled out, proceed

  //check if the email address is invalid
  $mailcheck = spamcheck($_POST['e-mail']);
  if ($mailcheck==FALSE)
    {
    echo "Invalid input";
    }
	function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	else{
	//send email
	$email = $_POST['e-mail'] ;
    $sender = $_POST['name'];
    $subject = "amjeNET Inquiries" ;
    $message .= "Name : ".clean_string($_POST['name'])."\n" ;
    $message .= "E-Mail : ".clean_string($_POST['e-mail'])."\n" ;
    $message .= "Phone : ".clean_string($_POST['tp'])."\n" ;
    $message .= clean_string($_POST['txtMessage'])."\n" ;
    mail("info@amjenet.co.nz", "$subject",
    $message, "From: $email" );
    echo "<script type='text/javascript'>alert('Thank you for using amjeNET inquiry form. We will be in touch with you very soon')
window.location.href='contact us.html';</script>";
	}
}
	

?>