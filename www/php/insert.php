<?php
$servername = "mysql.hostinger.es";
$username = "u261058157_admin";
$password = "mImUVY2g";
$dbname = "u261058157_ma";
$codi = $_POST['codi'];
$usuari_codi= $_POST['usuari_codi'];
$adreca = $_POST['adreca'];
$descripcio = $_POST['descripcio'];
$imatge = $_POST['imatge'];
$den_x = $_POST['den_x'];
$den_y = $_POST['den_y'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO denuncia (codi,usuari_codi,adreca,descripcio,imatge,den_x,den_y,usu_x,usu_y) VALUES ('$codi','$usuari_codi','$adreca','$descripcio','$imatge','$den_x','$den_y','$den_x','$den_y')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

// Tramesa del correu electrònic

$to  = 'aidan@example.com' . ', '; // note the comma
$to .= 'wez@example.com';

// subject
$subject = 'Birthday Reminders for August';

// message
$message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Jordi <jbertranr@gmail.com>' . "\r\n";
$headers .= 'From: Risc Animal <jbertranr@gmail.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
// $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
$subject = 'Nova alerta Risc Animal';
$message = '
<html>
<head>
  <title>Nova Alerta de risc animal introduïda</title>
</head>
<body>
  <p>Nova Alerta de risc animal introduïda!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Mail it
mail($to, $subject, $message, $headers);


?> 