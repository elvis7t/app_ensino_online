<?php
session_start();
/* incluir em todas as p�ginas que necessitarem de login para serem visualizadas */

require_once("../model/recordset.php");

$rsvld = new recordset();
$whr = "log_user = '".$_SESSION['usuario']."' AND log_token = '".addslashes($_GET['token'])."' AND log_status= '1'";
$rsvld->Seleciona("*","sys_logado",$whr);

$arr = array();
if($rsvld->linhas <> 1){ // Se n�o houverem credenciais
	$arr["status"] 		= "NO";
	$arr["titulo"]		= "Infra Prime - AVISO";
	$arr["mensagem"]	= "Fa�a Login para acessar esse Conte�do";
	header("location: http://localhost:85/view/login.php");
}

unset($rsvld);
?>