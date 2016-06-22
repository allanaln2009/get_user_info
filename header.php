<html>
 <head>
  <title>Consulta de visitantes</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <!-- <meta charset="UTF-8" /> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
      $("td.local").click(function(){
        $("td.local").toggle();
        $("td.oculto").toggle();
      });
      $("td.oculto").click(function(){
        $("td.oculto").toggle();
        $("td.local").toggle();
      });
    });
  </script>
  <style>
	.a{ font-size: 45%;}
  .oculto{ display: none;}
  </style>
 </head>
<body>
<h1>Consulta de visitantes</h1>
<?php
$servidor = '';
$senha = "";
//db1
$usuario = "";
$banco = "";
//bd2
$usuario0 = "";
$banco0 = "";

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
function strrevpos($instr, $needle){
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
};
?>