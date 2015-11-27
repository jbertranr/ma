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

?> 