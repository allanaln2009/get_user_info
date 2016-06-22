<?php
include("header.php");
$conexao = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco);
$res = mysql_query("SELECT * FROM cad_ip WHERE user_agent LIKE '%SM-G530BT%' ");
mysql_close();

$con = mysql_connect($servidor, $usuario0, $senha);
mysql_select_db($banco0);

echo "<table><tr><td><b>IP do usuário</b></td><td><b>IP Reverso</b></td><td><b>Data de acesso</b></td><td class=\"oculto\"><b>Título</b></td><td class=\"local\"><b>Local</b></td><td><b>UserAgent</b></td></tr>";
while($escrever=mysql_fetch_array($res)){
	$user_agent = between('(', ')', $escrever['user_agent']);
	$local		= after ('Post: ', $escrever['local']);
	
	if (!$user_agent){
		$user_agent	=	$escrever['user_agent'];
	}
	if (!$local || $local == "index"){
		$local	=	$escrever['local'];
		$query = "";
	}else{
		$query1 = mysql_query("SELECT post_title FROM wp_posts WHERE ID = '$local' ");
		$query = mysql_result($query1, 0);
	}
	
	echo "<tr><td>" . $escrever['ip'] . "</td><td>" . $escrever['host'] . "</td><td>" . $escrever['dthr'] . "</td><td class=\"oculto\">" . $query . "</td><td class=\"local\">" . $escrever['local'] . "</td><td class=\"a\">" . $user_agent . "</td></tr>";
}
echo "</table>";
mysql_close();
?>

</body>
</html>