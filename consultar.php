<html>
 <head>
  <title>Consulta de visitantes</title>
  <style>
	.a{ font-size: 40%;} 
  </style>
 </head>
  <meta charset="UTF-8" />
<body>

<h1>Consulta de visitantes</h1>

<?php
$servidor 	= "";
$usuario 	= "";
$senha 		= "";
$banco 		= "";
$conexao = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco);
$res = mysql_query("select * from cad_ip");
echo "<table><tr><td><b>IP do usuário</b></td><td><b>IP Reverso</b></td><td><b>Data de acesso</b></td><td><b>Local</b></td><td><b>UserAgent</b></td></tr>";
while($escrever=mysql_fetch_array($res)){
	echo "<tr><td>" . $escrever['ip'] . "</td><td>" . $escrever['host'] . "</td><td>" . $escrever['dthr'] . "</td><td>" . $escrever['local'] . "</td><td class=\"a\">" . $escrever['user_agent'] . "</td></tr>";
}
echo "</table>";
mysql_close(conexao);
?>

</body>
</html>