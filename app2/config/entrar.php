<?php
session_start();
/*	ALTERAวรO -14/05/2016 - ELVIS LEITE
	DATA NO PADRรO BR - HORARIO DE SP
*/
date_default_timezone_set('America/Sao_Paulo');

require_once("../model/recordset.php");
require_once("gera_token.php");

//require_once("../sistema/class/class.historico.php");

extract($_POST);
$arr = array();

$rs = new recordset();
//$hist = new historico(); // serแ necessario para o historico
$whr = "usu_email = '".ltrim($usuario)."'";
$rs->Seleciona("log_user","sys_logado","log_user ='".ltrim($usuario)."' AND log_status='1'");
/*if($rs->linhas == 1){//se encontrou logado
		$arr["status"] 		= "NO";  
		$arr["mensagem"]	= $rs->sql;
		$dados = array("log_status"=>0);
		$rs->Altera($dados,"logado","log_user ='".ltrim($usuario)."' AND log_status='1'");
}*/
/*else{*/
	$sql = "SELECT * FROM sys_usuario WHERE ".$whr;  
	$rs->FreeSql($sql);
	if($rs->linhas == 1){//se encontrou o e-mail
		$rs->GeraDados();
		if(trim(md5($senha)) == trim($rs->fld("usu_senha"))){
			//se senha encryptada for igual a senha do banco
			$_SESSION['usuario']			= $usuario;
			$_SESSION['nome_usu']			= $rs->fld("usu_nome");
			$_SESSION['usu_cod']			= $rs->fld("usu_cod");
			$_SESSION['usuario_on']			= 1;
			$_SESSION['usu_foto']			= $rs->fld("usu_foto");
			// $_SESSION['usu_cnpj']			= $rs->fld("usu_emp_cnpj");
			$_SESSION['usu_empresa']		= $rs->fld("usu_empId");
			$_SESSION['usu_departamento']	= $rs->fld("usu_dpId");
			$_SESSION['usu_classe']			= $rs->fld("usu_classeId");
			$_SESSION['usu_pmail']			= $rs->fld("usu_pmail");
			$_SESSION['usu_pchat']			= $rs->fld("usu_pchat");
			$_SESSION['usu_pcalend']	    = $rs->fld("usu_pcalend");
			$_SESSION['usu_prelatorio']	    = $rs->fld("usu_prelatorio");
			$_SESSION['token']				= md5($codigo);
			// Criadas as sessions, vamos incluir numa tabela de Logins Efetuados, para aumentar a seguran็a
			/*
			$altera = array("usu_online"=>1);
			$whr = "usu_nome='".$usuario."'";
			$rs->Altera($altera,"usuarios",$whr);
			*/
			$dados = array(
				"log_user" 		=> $usuario,
				"log_classe"	=> $_SESSION['usu_classe'],
				"log_token"		=> $_SESSION['token'],
				"log_horario"	=> date("Y-m-d H:i:s"),
				"log_expira"	=> date("Y-m-d H:i:s", mktime(date("H"),date("i")+60, date("s"), date("m"), date("d"), date("y"))),
				"log_status"	=> "1"
			);
			$rs->Insere($dados, "sys_logado");
			//$hist->add_hist(4);
			$arr['status']			= "OK";
			$arr['mensagem']		= "Login Efetuado!";
			$arr['token']			= md5($codigo);
			$arr['sql']				= $rs->sql;
		}
		else{
			$arr["status"] 		= "NO";
			$arr["mensagem"]	= "Senha incorreta!";
		}
	}	
		else{//se nใo encontrou o email
			$arr["status"] 		= "NO";
			$arr["mensagem"]	= "E-mail n&atilde;o encontrado!";
		}
	/*}*/

echo json_encode($arr);
?>