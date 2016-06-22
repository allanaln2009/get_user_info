<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
//Mozilla/5.0 (Linux; Android 5.1; XT1058 Build/LPA23.12-21.7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.95 Mobile Safari/537.36

$navegador	=	after_last (') ', $user_agent); // Navegador - Chrome/48.0.2564.95 Mobile Safari/537.36
$info1		=	between('(', ')', $user_agent); // SO Based; SO; Model - (Linux; Android 5.1; XT1058 Build/LPA23.12-21.7)
$navBase	=	before(' (', $user_agent); //navegador baseado - (Mozilla)

$separador1	=	substr_count($info1, ';');
if ($separador1 >= 2){
	echo "<br>separador: $separador1<br>";
	$so		=	between('; ', '; ', $info1); // Android 5.1
	$modelo =	after_last('; ', $info1); // XT1058 Build/LPA23.12-21.7
}elseif ($separador1 == 1){
	echo "<br>separador: $separador1<br>";
	$modelo	=	between('; ', ';', $info1); // SO
	$so 	=	$modelo;
}
// Quebrando $ext2
$soBase =	before(';', $info1); // Linux
//$ext5	=	between('; ', ';', $info1); // SO

echo "<br>$user_agent<br><br>$navegador<br>$info1<br>$navBase<br><br>EXT2 Split<br>$soBase<br>$so<br>$modelo<br>";

$navInfo	= explode(' ', $navegador);
$deviceInfo = explode('; ', $info1);

echo "<br>****************************************************<br>Informações do dispositivo:<br>";
foreach ($deviceInfo as $word ) {
	echo "* $word<br>";
}
echo "<br>Informações do navegador:<br>";
foreach ($navInfo as $word ) {
	echo "* $word<br>";
}


function after ($this, $inthat){
    if (!is_bool(strpos($inthat, $this)))
    return substr($inthat, strpos($inthat,$this)+strlen($this));
};

function after_last ($this, $inthat){
    if (!is_bool(strrevpos($inthat, $this)))
    return substr($inthat, strrevpos($inthat, $this)+strlen($this));
};

function before ($this, $inthat){
    return substr($inthat, 0, strpos($inthat, $this));
};

function before_last ($this, $inthat){
    return substr($inthat, 0, strrevpos($inthat, $this));
};

function between ($this, $that, $inthat){
    return before ($that, after($this, $inthat));
};

function between_last ($this, $that, $inthat){
 return after_last($this, before_last($that, $inthat));
};

// use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle){
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
};
?>