<?php

$servidor	= "";
$usr 		= "";
$pass 		= "";
$dbname 	= "";

$conn = new mysqli($servidor, $usr, $pass, $dbname);

if ($conn->connect_error) {
    die("Falha conexão: " . $conn->connect_error);
}

$host = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Brazil/East");
$dthr    =  date("D - d/m/Y  -  H:i:s");
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$user = $_SERVER['REMOTE_USER'];
$remote_user = $_SERVER['REDIRECT_REMOTE_USER'];

$post 	 =	$_GET["p"];
$paged	 =	$_GET["paged"];

if ($post != null){
	$local	=	"Post: $post";
}else{
	if ($paged != null){
		$local	=	"Page: $paged";
	}else{
		$local	=	"index";
	}
}

$sql	=	"INSERT INTO cad_ip(ip, host, dthr, local, user_agent, user, remote_user) VALUES ('$ip', '$host', '$dthr', '$local', '$user_agent', '$user', '$remote_user')";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>