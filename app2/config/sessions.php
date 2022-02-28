<?php
session_start();
require_once("main.php");
require_once("../model/recordset.php"); 

$rs = new recordset();
$rs->Seleciona("*","sys_sistema","sys_nome = 'base-prime'");
$rs->GeraDados(); 
$_SESSION['sistema'] 	= $rs->fld("sys_nome");
$_SESSION['retorno'] 	= $rs->fld("sys_retorno");
$_SESSION['logo'] 		= $rs->fld("sys_logo");
$_SESSION['dominio'] 	= $rs->fld("sys_dominio");
$_SESSION['empresa']	= $rs->fld("sys_empresa");
// $_SESSION['cnpj_emp']	= $rs->fld("sys_cnpj");

/*--------|teste de funcionamento|----------*/
/*echo "<pre>";
print_r($_SESSION);  
echo "</pre>";
*/ 

//echo md5("102030");  teste de senha md5
  
?>