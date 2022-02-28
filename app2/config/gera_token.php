<?php
$prefixo = "eroirp";
$tamanho = 20;
$qtd = 1;
$c = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
 
for($i = 0; $i<$qtd; $i++)
{
 $codigo = $prefixo;
 for( $j = 0; $j< ( $tamanho - strlen($prefixo) ); $j++)
 {
 $codigo .= $c[mt_rand(0,35)];
 }

}
?>