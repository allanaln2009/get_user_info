<?php
// Comentado porque não há necessidade de acoplar informações aqui
/*
$servidor="";
$usr="";
$pass="";
$dbname="";

$conn = new mysqli($servidor, $usr, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$host = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Brazil/East");
$dthr    =  date("D - d/m/Y  -  H:i:s");

$sql	=	"INSERT INTO cad_ip(ip, host, dthr, local) VALUES ('$ip', '$host', '$dthr', '$local')";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
*/
?>