<?php
include("header.php");

$conexao = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco);
$res = mysql_query("SELECT * FROM error_apache_ip_access");

echo "<table><tr><td><b>IP do usuário</b></td><td><b>IP Reverso</b></td><td><b>Data de acesso</b></td><td><b>Local</b></td></tr>";
while($escrever=mysql_fetch_array($res)){
	echo "<tr><td>" . $escrever['ip'] . "</td><td>" . $escrever['host'] . "</td><td>" . $escrever['dthr'] . "</td><td>" . $escrever['local'] . "</td></tr>";
}
echo "</table>";

mysql_close();
?>

</body>
</html>