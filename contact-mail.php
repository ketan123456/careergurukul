<?php //print_r($_POST); die;
$toEmail = "info@careergurukulindia.com";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$contact = $_POST['phone'];

$subject="Contact Form Submission";
// To send HTML mail, the Content-type header must be set.
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:' . $email. "\r\n"; // Sender's Email
$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
$template = '<table width="650" style="border:1px solid #ddd; text-align:left;" >
  <tr>
    <th scope="row" style="background:#eee; border:1px solid #ccc; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">Name </th>
    <td style="border:1px solid #ccc; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">'.$name.'</td>
  </tr>
  <tr>
    <th scope="row" style="background:#eee; border:1px solid #ccc; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">Email ID</th>
    <td style="border:1px solid #ccc; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">'.$email.'</td>
  </tr>
  <tr>
    <th scope="row" style="background:#eee; border:1px solid #ccc; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">Mobile Number</th>
    <td style="border:1px solid #ccc; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">'.$contact.'</td>
  </tr>
  <tr>
    <th scope="row" style="background:#eee; border:1px solid #ccc; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">Message</th>
    <td style="border:1px solid #ccc; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">'.$message.'</td>
  </tr>
</table>';
$sendmessage = "<div>" . $template . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage = wordwrap($sendmessage, 70);
// Send mail by PHP Mail Function.

if(mail($toEmail, $subject, $sendmessage, $headers)) {
    print "Thank you for your message. It has been sent.";
}else{
    print "Thank you for your message. It has been sent.";
}



?>