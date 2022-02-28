<?php
date_default_timezone_set('America/Sao_paulo');
session_start();
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
date_default_timezone_set("America/Sao_Paulo");
$fn = new functions(); 
$rs = new recordset();
extract($_POST);
$resul = array(); 
$res = array();
$dados = array();
//-------------------------------------------------------------------------------------------------------------------------
/////////FUNÇÔES DO SYSTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

//-------------------------------------------------------------------------------------------------------
//EMPRESA /////////////////////////////////////////////////////////////////////////////////////////////||
//=======================================================================================================

	/*---------------|FUNCAO PARA CADASTRAR A EMPRESA|--------------\
	|												   				|
	\--------------------------------------------------------------*/

	if($acao == "Cadastra_Empresa"){
		$logo ="/images/logo_emp/default-logo.png";
		//Busca informação no bando se o nome já exixte
			$rs->seleciona("emp_cnpj","sys_empresa","emp_cnpj='{$emp_cnpj}'");
			if($rs->linhas<>0){
				$resul['status'] = "Erro";
				$resul['status'] = "CNPJ j&aacute; cadastrado";
				$resul['mensagem'] = $rs->sql;  
			}
			ELSE{	
				$cod = $rs->autocod("emp_id","sys_empresa");
				$dados['emp_id']        = $cod;
				$dados["emp_nome"]	    = $emp_nome; 
				$dados["emp_alias"] 	= $emp_alias; 
				$dados["emp_cnpj"]   	= $emp_cnpj;
				$dados["emp_ie"]	    = $emp_ie; 
				$dados["emp_cep"]	    = $cep;   
				$dados["emp_log"]	    = $log;
				$dados["emp_num"]	    = $num;   
				$dados["emp_compl"]	    = $compl;   
				$dados["emp_bai"]	    = $bai;   
				$dados["emp_cid"]	    = $cid;   
				$dados["emp_uf"]	    = $uf;   
				$dados["emp_contato"]	= $emp_contato; 
				$dados["emp_email"]	    = $emp_email; 
				$dados["emp_tel"]		= $emp_tel; 
				$dados["emp_site"]		= $emp_site;   
				$dados["emp_logo"]		= $logo;   
														
				if(!$rs->Insere($dados,"sys_empresa")){
					$resul['status'] = "OK";
					$resul['mensagem'] = "Empresa cadastrada com sucesso!";
				}
				else{
					$resul['status'] = "Erro";
					$resul['mensagem'] = $rs->sql;
					}
				}
		
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO CADASTRO|--------------------------------*/	

    /*-----------------|FUNCAO PARA EDITAR A EMPRESA|---------------\
	|												   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Empresa"){
		$dados['emp_nome']		= $emp_nome; 	
		$dados['emp_alias']		= $emp_alias;	
		$dados['emp_cnpj']		= $emp_cnpj;
		$dados['emp_ie']	    = $emp_ie; 
		$dados['emp_cep']	    = $cep;   
		$dados['emp_log']	    = $log;
		$dados['emp_num']	    = $num;   
		$dados['emp_compl']	    = $compl;   
		$dados['emp_bai']	    = $bai;   
		$dados['emp_cid']	    = $cid;   
		$dados['emp_uf']	    = $uf;   
		$dados['emp_contato']	= $emp_contato; 
		$dados['emp_email']	    = $emp_email; 
		$dados['emp_tel']		= $emp_tel; 
		$dados['emp_site']		= $emp_site; 
		$whr = "emp_id=".$emp_id; 
		
		if(!$rs->Altera($dados, "sys_empresa",$whr)){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Empresa atualizada!"; 		  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
			}	
		echo json_encode($resul);
		exit;
	}	
/*---------------|FIM DO EDITAR|---------------------------------*/	

//|----------------------------------------------------------------\
///////////////// FIM EMPRESA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//DEPARTAMENTO //////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================
	
	/*-----|FUNCAO PARA CADASTRO DE DEPARTAMENTO|---------------\
	| 														    |	
	\*---------------------------------------------------------*/
	
	if($acao == "Cadastrar_Departamento"){  
		$sql ="SELECT dp_nome FROM sys_departamento a
			JOIN sys_empresa b ON b.emp_id = a.dp_empId
			WHERE dp_nome = '".$dp_nome."'And dp_empId=".$sel_emp;	
			$rs->FreeSql($sql);
			if($rs->linhas <>0){
				$resul['status'] = "Erro";
				$resul['status'] = "Nome j&aacute; cadastrado";
				$resul['mensagem'] = $rs->sql;  
			}ELSE{
			$cod = $rs->autocod("dp_id","sys_departamento");
			$dados['dp_id']     = $cod;
			$dados["dp_empId"]	= $sel_emp; 
			$dados["dp_nome"]	= $dp_nome;
		
		if(!$rs->Insere($dados,"sys_departamento")){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Departamento cadastrado com sucesso!";
		}
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;
			
			}
		}		
		echo json_encode($resul); 
		exit;
	}
/*---------------|FIM DO CADASTRO |--------------------------------*/	

    /*------------|FUNCAO PARA EDITARR A DEPARTAMENTO|--------------\
	|												   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Departamento"){
		$dados['dp_nome']	= $dp_nome;	 
		$whr = "dp_id=".$dp_id; 
		
		if(!$rs->Altera($dados, "sys_departamento",$whr)){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Departamento atualizado!"; 
			$resul['sql'] = $rs->sql;
			  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
		}	
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO EDITAR |-----------------------------*/	

    /*---|FUNCA PARA SELECIONAR O DP REF A EMPRESA|------------*\
	| 														    |	
	\*---------------------------------------------------------*/	 
	
	if($acao == "populaCheckDp"){
		$sql = "SELECT * FROM sys_departamento WHERE dp_empId=".$fami;
		$rs->FreeSql($sql); 
		$opt = "<option value=''>Selecione...</option>";
		while($rs->GeraDados()){
			$opt .= "<option value='".$rs->fld('dp_id')."'>".$rs->fld('dp_nome')."</option>";
		}
		echo $opt;
	}
/*---------------|FIM DA FUNCAO "populaCheckDp |------------------*/

//|----------------------------------------------------------------\
///////////////// FIM DEPARTAMENTO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//USUARIO ///////////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================
	
    /*---------------|AÇÂO PARA CADASTRAR USUARIO|-------------*\
	| 														    |	
	\*---------------------------------------------------------*/
	if($acao == "Cadastra_Usuario"){
		//Define imagem por genero
		if($usu_sexo == 'M'){
			$foto ="/images/perfil/masc.jpg";
		}
		ELSE{
			$foto ="/images/perfil/fem.jpg";
			}
			//Busca informação no bando se o nome já exixte
			$rs->seleciona("usu_email","sys_usuario","usu_email='{$usu_email}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Nome j&aacute; cadastrado";
			$resul['mensagem'] = $rs->sql;  
		}ELSE{	
				$cod = $rs->autocod("usu_cod","sys_usuario");
				$dados['usu_cod']       = $cod;
				$dados["usu_nome"] 		= $usu_nome;
				$dados["usu_email"]	    = $usu_email; 
				$dados["usu_senha"] 	= trim(md5($usu_senha));
				$dados["usu_empId"] 	= $sel_emp ; 
				$dados["usu_dpId"] 	    = $sel_dp ;
				$dados["usu_classeId"] 	= $sel_class;				
				$dados["usu_chapa"]    	= $usu_chapa;
				$dados["usu_ramal"] 	= $usu_ramal;
				$dados["usu_cel"] 	   	= $usu_cel;		
				$dados['usu_foto']	    = $foto ;  
				$dados["usu_ativo"] 	= "1";
				$dados["usu_pmail"]	    = $usu_pmail;
				$dados["usu_pchat"]	    = $usu_pchat;
				$dados["usu_prelatorio"]= $usu_prel;
				$dados["usu_sexo"] 	    = $usu_sexo;
				$dados["usu_online"] 	= "0";
				$dados["usu_dashId"]	= "1"; 
				$dados["usu_mnutopId"]	= "7"; 
				$dados["usu_pagId"]		= "10"; 
				$dados["usu_datacad"]   = date("Y-m-d H:i:s");
				$dados["usu_usucadId"] 	= $_SESSION['usu_cod']; 
				
				if(!$rs->Insere($dados,"sys_usuario")){
					$resul['status'] = "OK";
					$resul['mensagem'] = "Usuario cadastrado com sucesso!";
				}
				else{ 
					$resul['status'] = "Erro";
					$resul['mensagem'] = $rs->sql;
				}
			}
		echo json_encode($resul);
		exit; 
	}
/*---------------|FIM CADASTRO|------------------------------------*/	

	/*-----------|FUNCAO PARA EDITAR USUARIO ATIVO|-----------------\
	|												   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Usuario"){
		$dados["usu_nome"]	    = $usu_nome;  
		$dados["usu_email"]	    = $usu_email; 
		$dados["usu_empId"]	    = $sel_emp;
		$dados["usu_dpId"]	    = $sel_dp;	   
		$dados["usu_classeId"]	= $sel_class; 			
		$dados["usu_ramal"] 	= $usu_ramal;	
		$dados["usu_cel"] 	    = $usu_cel;			
		$dados["usu_chapa"]    	= $usu_chapa;		
		$dados["usu_ativo"]	    = $usu_ativo; 
		$dados["usu_pmail"]	    = $usu_pmail; 
		$dados["usu_pchat"]	    = $usu_pchat; 
		$dados["usu_pcalend"]   = $usu_pcalend; 
		$dados["usu_prelatorio"]= $usu_prelatorio; 
		$dados["usu_sexo"]	    = $usu_sexo; 	
		$whr = "usu_cod=".$usucod; 
		
		if(!$rs->Altera($dados, "sys_usuario",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = "Dados Alterados!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql; 
			}	
		echo json_encode($resul); 
		exit; 
	}
/*---------------|FIM DO EDITAR|-----------------------------------*/	

    /*---------------|EDITAR DE SENHA DO USUÁRIO ------------------*\
	| 																|
	\*-------------------------------------------------------------*/

	if($acao == "Edita_Senha"){
			$dados["usu_senha"] = md5($nsenha);
			$whr = "usu_cod=".$usucod; 
			
			if(!$rs->Altera($dados, "sys_usuario",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = " OK!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql; 
			}			
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM EDITAR|------------------------------------*\


//|----------------------------------------------------------------\
///////////////// FIM USUARIO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//PERFIL DE USUARIO//////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================

	/*---------------|EDITAR  PERFIL|------------------------------*\
	| 																|
	\*-------------------------------------------------------------*/

	if($acao == "Edita_Perfil"){
		$dados["usu_nome"]	    = $usu_nome;
		$dados["usu_ramal"] 	= $usu_ramal;	
		$dados["usu_cel"] 	    = $usu_cel;			
		$dados["usu_chapa"]    	= $usu_chapa;			
		$dados["usu_dashId"]	= $cor;	
		$dados["usu_pagId"] 	= $corpag;	
		$dados["usu_mnutopId"]	= $cormenu;	
		
		$whr = "usu_cod=".$usu_cod; 
		if(!$rs->Altera($dados, "sys_usuario",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = "Dados Alterados!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql; 
			}
		 echo json_encode($resul);
		exit;
	}
/*---------------|FIM EDITAR|-------------------------------------*\

    /*---------------|EDITAR DE SENHA DO USUÁRIO ------------------*\
	| 																|
	\*-------------------------------------------------------------*/

	if($acao == "Altera_Senha"){
			$dados["usu_senha"] = md5($nsenha);
			$whr = "usu_cod =".$_SESSION['usu_cod'];
			
			if(!$rs->Altera($dados, "sys_usuario",$whr)){
				$resul["status"] = "OK";
				$resul["mensagem"] = "Senha Alterada!";
				$resul["sql"] = $rs->sql;
			} else {
				$resul["status"] = "ERRO";
				$resul["mensagem"] = "Falha no envio";
				$resul["sql"] = $rs->sql; 
			}			
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM EDITAR|------------------------------------*\

//|----------------------------------------------------------------\
///////////////// FIM PERFIL USUARIO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//---------------------------------------------------------------------------------------------------------------------------------
/////////FIN DAS FUNÇÔES DO SYSTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
//=================================================================================================================================


//-------------------------------------------------------------------------------------------------------------------------
///////// FUNÇÔES  //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================


//------------------------------------------------------------------------------------------------------------
//CURSO//////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*-----|FUNCAO PARA CADASTRO DE CURSO|---------------------\
	| 								                    	    |	
	\*---------------------------------------------------------*/
	
	if($acao == "Cadastrar_Curso"){  
			$cod = $rs->autocod("cur_id","sys_curso");
			$dados['cur_id']   	= $cod;		
			$dados["cur_titulo"]	= $cur_titulo;
			$dados["cur_desc"]	    = $cur_desc;
			$dados["cur_data_ini"]	= $fn->data_usa($cur_data_ini);
			$dados["cur_data_fin"]	= $fn->data_usa($cur_data_fin);
		
		if(!$rs->Insere($dados,"sys_curso")){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Curso cadastrado com sucesso!";
		}
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;
		}
		
		
		echo json_encode($resul); 
		exit;
	}
/*---------------|FIM DO CADASTRO DE CURSO |------------------*/	

    /*------------|FUNCAO PARA EDITARR O CURSO|---------------------\
	|												   				|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Curso"){
		$dados['cur_titulo']	= $cur_titulo;	 
		$dados['cur_desc']		= $cur_desc;	 
		$dados["cur_data_ini"]	= $fn->data_usa($cur_data_ini);
		$dados["cur_data_fin"]	= $fn->data_usa($cur_data_fin);	 
		$whr = "cur_id=".$cur_id; 
		
		if(!$rs->Altera($dados, "sys_curso",$whr)){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Dados atualizados!"; 
			$resul['sql'] = $rs->sql;

		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
		}	
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DE EDITAR CURSO|------------------*/


//|----------------------------------------------------------------\
/////////////////////////// FIM CURSO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/


//------------------------------------------------------------------------------------------------------------
//ALUNO//////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*---------------|FUNCAO PARA CADASTRO DE Aluno|----------------\
	|												   				|
	\--------------------------------------------------------------*/ 	
	
	if($acao == "Cadastrar_Aluno"){  
		$datadonascimento = $alu_data_nasc;
		list($dia, $mes, $ano) = explode('/', $datadonascimento);
		$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
		$diadonascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
		$idade = floor((((($hoje - $diadonascimento) / 60) / 60) / 24) / 365.25);	
		
		if($idade < 16){
				$resul['status'] = "Erro";
				$resul['status'] = "Aluno menor de 16 anos";
				$resul['mensagem'] = $rs->sql;  
			}ELSE{
				$cod = $rs->autocod("alu_id","sys_aluno");
				$dados['alu_id']   		= $cod;
				$dados["alu_nome"]		= $alu_nome; 
				$dados["alu_email"]		= $alu_email;
				$dados["alu_data_nasc"]	= $fn->data_usa($alu_data_nasc);	 
				$dados["alu_status"]	= '1';
			
			if(!$rs->Insere($dados,"sys_aluno")){ 
				$resul['status'] = "OK";
				$resul['mensagem'] = "Aluno cadastrado com sucesso!";
		}
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;
			
			}
		}
		
		echo json_encode($resul); 
		exit;
	}
/*---------------|FIM DO CADASTRO ALUNO |------------------*/	

    /*------------|FUNCAO PARA EDITAR ALUNO|-----------------------\
	|										   						|
	\--------------------------------------------------------------*/ 

	if($acao == "Edita_Aluno"){
		$dados["alu_nome"]		= $alu_nome; 
		$dados["alu_email"]		= $alu_email;
		$dados["alu_data_nasc"]	= $fn->data_usa($alu_data_nasc);	  
		$dados["alu_status"]	= $alu_status;
		$whr = "alu_id=".$alu_id; 
		
		if(!$rs->Altera($dados, "sys_aluno",$whr)){ 
			$resul['status'] = "OK";
			$resul['mensagem'] = "Dados atualizados!"; 
			$resul['sql'] = $rs->sql;
			  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
		}	
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DE EDITAR Aluno|------------------*/

//|----------------------------------------------------------------\
//////////////// FIM TIPO DE ALUNO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/	

//------------------------------------------------------------------------------------------------------------
//MATRICULA//////////////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================
 
	/*----------|FUNCAO PARA CADASTRO DE MATRICULAS|---------------\
	|												   				|
	\--------------------------------------------------------------*/ 
	
	if($acao == "Cadastrar_Matricula"){ 			
		$sql ="SELECT 	*	FROM sys_matricula a
				JOIN sys_curso b ON a.mat_curId = b.cur_id
				JOIN sys_aluno c ON a.mat_aluId = c.alu_id
				WHERE mat_curId =".$sel_curso;				
			$rs->FreeSql($sql);
			 if($rs->linhas>=10){
			 	$resul['status'] = "Erro";
			 	$resul['status'] = "Esse curso já esta com 10 alunos";  
			 	$resul['mensagem'] = $rs->sql;  
			 }ELSE{
			$cod = $rs->autocod("mat_id","sys_matricula");
			$dados["mat_id"]       	= $cod;		
			$dados["mat_curId"]    	= $sel_curso; 		
			$dados["mat_aluId"] 	= $sel_aluno; 							
			$dados["mat_data"]  	= date('Y-m-d H:i:s');		
			$dados["mat_usuId"]   	= $_SESSION['usu_cod']; 
			
			 
		if(!$rs->Insere($dados,"sys_matricula")){
			$resul['status'] = "OK";
			$resul['mensagem'] = "Matricula efetuada com sucesso!";
		} 
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;        
			  
		}
		}
		
		echo json_encode($resul);
		exit;
	}
/*---------------|FIM DO CADASTRO DE MATRICULA |------------------*/	

	/*--------------|FUNCAO PARA ALTERAR MATRICULA|--------------\
	|										   					  |
	\------------------------------------------------------------*/ 

	if($acao == "Editar_Matricula"){
		$dados["mat_curId"]    	= $sel_curso; 		
		$dados["mat_aluId"] 	= $sel_aluno;	 	
		$whr = "mat_id=".$mat_id; 
		
		if(!$rs->Altera($dados, "sys_matricula",$whr)){ 

		$resul['status'] = "OK";

		$resul['mensagem'] = "Dados atualizado!"; 

		 $resul['sql'] = $rs->sql;
			  
		}
		else{
			$resul['mensagem']	= "Ocorreu um erro..."; 
			$resul['sql']		= $rs->sql;  
		}	
		echo json_encode($resul);
		exit;
	}	
/*---------------|FIM DE ALTERAR MATRICULA|------------------*/	



//-------------------------------------------------------------------------------------------------------------------------
///////// FIM FUNÇÔES DE ENSINO //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================
	
//---------------------------------------------------------------------------------------------------------------------------------
/////////FIN DAS FUNÇÔES  /////////////////////////////////////////////////////////////////////////////////////////////||||||||||||
//=================================================================================================================================
?>	