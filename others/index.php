<?php
include("header.php");

$conexao = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco);
$res = mysql_query("SELECT * FROM cad_ip");

echo "<table>\n<tr>\n\t<td><b>IP do usuário</b></td>\n\t<td><b>IP Reverso</b></td>\n\t<td><b>Data de acesso</b></td>\n\t<td><b>Local</b></td>\n\t<td><b>UserAgent</b></td>\n</tr>\n";
while($escrever=mysql_fetch_array($res)){
	$user_agent = between('(', ')', $escrever['user_agent']);
	if (!$user_agent){
		//$user_agent	=	after ('(', $escrever['user_agent']);
		//if (!$user_agent){
			$user_agent	=	$escrever['user_agent'];
		//}
	}
	echo "<tr>\n\t<td>" . $escrever['ip'] . "</td>\n\t<td>" . $escrever['host'] . "</td>\n\t<td>" . $escrever['dthr'] . "</td>\n\t<td>" . $escrever['local'] . "</td>\n\t<td style=\"white-space: initial\" class=\"a\">" . $user_agent . "</td>\n</tr>\n";
}
echo "</table>";

mysql_close();
?>

</body>
</html>