<?php
$email = $_REQUEST["email"];

$to = "rabihtouma@webshots.me";
$subject = "New Offer Request";

$message = "
<html>
<head>
<title>Request Pre-Launching Offer</title>
</head>
<body>
<p>New Customer Informations :</p>
<table>
<tr>
<th>Email: </th>
<td>" . $email . "</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: info@webshots.me' . "\r\n";
$headers .= 'Cc: rabih.g.touma@gmail.com' . "\r\n";
mail($to,$subject,$message,$headers);
 header('Location: index.php');
 ?>