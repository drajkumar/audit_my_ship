<?php
// Multiple recipients
if(isset($_POST['send'])){


$to = $_POST['email']; // note the comma

// Subject
$subject = 'Confirm Your email ';

// Message
$message = '
<html>
<head>
  <title>Confirm Your email</title>
</head>
<body>
  <h1>auditmyship.com</h1>
  <h2>Thank You For Registration in our website.</h2>
  <table>
    <tr>
      <th><a href="www.auditmyship.com/active.php?emailcode=<?php echo $emcode; ?>">Confirm</a></th>
    </tr>
   <p>*Please Confirm your E-mail Account by clicking the Confirm Button.</p>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: Rajkumar';
$headers[] = 'From: <www.auditmyship.com>';
$headers[] = 'Cc: www.auditmyship.com';
$headers[] = 'Bcc: www.auditmyship.com';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
}
?>




<form action="" method="post">
  <input type="email" name="email"><input type="submit" name="send" value="Send">
</form>