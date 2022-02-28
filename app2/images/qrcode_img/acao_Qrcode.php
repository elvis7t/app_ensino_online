<?php
require_once('../../assets/plugins/phpqrcode/qrlib.php');
require_once("../../model/recordset.php");
//session_start();
date_default_timezone_set("America/Sao_Paulo");
$rs = new recordset();
extract($_POST);
$resul = array(); 
$res = array();
$dados = array();

//-------------------------------------------------------------------------------------------------------------------------
/////////FUNÇÔES DO SYSTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================


/*---------------|FUNÇÂO GERAR QRCODE  DE  EQUIPAMENTOS|--------------\
	|	Author: 	Elvis Leite da Silva							| 
	|	E-mail: 	elvis7t@gmail.com					|
	|	Version:	1.0												|
	|	Date:       14/09/2017						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Gerar_qrcodeEq"){
				
$sql ="SELECT * FROM at_equipamento a
		JOIN sys_empresa  b ON a.eq_empId  = b.emp_id 
		JOIN eq_marca     c ON a.eq_marcId = c.marc_id
		JOIN sys_usuario  d ON a.eq_usucad = d.usu_cod
		JOIN eq_tipo      e ON a.eq_tipoId = e.tipo_id
		JOIN at_status    f ON a.eq_statusId = f.status_id		
		WHERE eq_id = ".$eq_id; 
$rs->FreeSql($sql);
$rs->GeraDados();
$cod            = $rs->fld("eq_id");
$usu            = $rs->fld("usu_nome");
$emp			= $rs->fld("emp_alias");	  
$tipo			= $rs->fld("tipo_desc");	  
$marca			= $rs->fld("marc_nome");	  
$modelo			= $rs->fld("eq_modelo");	  
$nserie			= $rs->fld("eq_serial");	  
$cad			= $rs->fld("eq_datacad");	  
$desc			= $rs->fld("eq_desc");	  
								
//Montando os dados para o QR Code 
$cartao  = 'BEGIN:VCARD'."\n"; 
$cartao .= 'N: ID: '.$cod."\n"; 
$cartao .= 'N: Empresa: '.$emp."\n"; 
$cartao .= 'N: Tipo: '.$tipo."\n"; 
$cartao .= 'N: Marca: '.$marca."\n"; 
$cartao .= 'N: Modelo: '.$modelo."\n"; 
$cartao .= 'N: Nº Serie: '.$nserie."\n"; 
$cartao .= 'N: Data cadastro: '.$cad."\n"; 
$cartao .= 'N: Equipamento: '.$desc."\n"; 
$cartao .= 'N: Cadastrado por: '.$usu."\n"; 
$cartao .= 'END:VCARD'; 

//Gerando a imagem com a classe QRcode 
if(!QRCode::png($cartao, $eq_id.'eq.png', QR_ECLEVEL_L, 1)){ 
	$resul['status'] = "OK";
	$resul['mensagem'] = "Atualizado!"; 
	$resul['sql'] = $rs->sql;
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul); 
    exit;
}	
/*---------------|FIM DO GERAR QRCODE  DE  EQUIPAMENTOS |------------------*/	 

    /*-------------|FUNÇÂO GERAR QRCODE  DE  MAQUINAS|--------------\
	|	Author: 	Elvis Leite da Silva							| 
	|	E-mail: 	elvis7t@gmail.com			            		|
	|	Version:	1.0												|
	|	Date:       14/09/2017						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Gerar_qrcodeMq"){
				
 				$sql ="	SELECT * FROM at_maquinas a
				JOIN at_empresas    b ON a.mq_empId  	= b.emp_id 
				JOIN mq_fabricante  c ON a.mq_fabId  	= c.fab_id
				JOIN sys_usuarios   d ON a.mq_usucad 	= d.usu_cod
				JOIN eq_tipo        e ON a.mq_tipoId 	= e.tipo_id
				JOIN mq_memoria     f ON a.mq_memId  	= f.mem_id
				JOIN mq_hd   	    g ON a.mq_hdId   	= g.hd_id
				JOIN mq_os  	    h ON a.mq_osId   	= h.os_id
				JOIN mq_office 	    i ON a.mq_officeId  = i.office_id
				WHERE mq_id = ".$mq_id;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				$cod            = $rs->fld("mq_id");  
				$emp			= $rs->fld("emp_alias"); 
				$tipo			= $rs->fld("tipo_desc");
				$fab			= $rs->fld("fab_nome");
				$modelo			= $rs->fld("mq_modelo");	  
				$tag			= $rs->fld("mq_tag");	  
				$cad			= $rs->fld("mq_datacad");	  
				$proc			= $rs->fld("mq_proc");	   
				$mq_memTp       = $rs->fld("mem_tipo");  
				$mq_memCap      = $rs->fld("mem_cap");  
				$mq_hdTp        = $rs->fld("hd_tipo");  
				$mq_hdCap       = $rs->fld("hd_cap");  
				$mq_os          = $rs->fld("os_desc");  
				$mq_osver       = $rs->fld("os_versao");  
				$mq_office      = $rs->fld("office_desc");  
				$mq_datagar     = $rs->fld("mq_datagar");
				$desc			= $rs->fld("mq_nome");
				$usu            = $rs->fld("usu_nome");
								
//Montando os dados para o QR Code 
$cartao  = 'BEGIN:VCARD'."\n"; 
$cartao .= 'N: ID:'.$cod."\n"; 
$cartao .= 'N: Empresa:'.$emp."\n"; 
$cartao .= 'N: Tipo: '.$tipo."\n"; 
$cartao .= 'N: Fabricante: '.$fab."\n"; 
$cartao .= 'N: Modelo: '.$modelo."\n"; 
$cartao .= 'N: Service Tag: '.$tag."\n"; 
$cartao .= 'N: Data Fab: '.$cad."\n"; 
$cartao .= 'N: Proc: '.$proc."\n"; 
$cartao .= 'N: Memória: '.$mq_memTp.' '.$mq_memCap."\n"; 
$cartao .= 'N: HD: '.$mq_hdTp.' '.$mq_hdCap."\n"; 
$cartao .= 'N: Sistema: '.$mq_os.' '.$mq_osver."\n"; 
$cartao .= 'N: Office: '.$mq_office."\n"; 
$cartao .= 'N: Garantia: '.$mq_datagar."\n"; 
$cartao .= 'N: Nome: '.$desc."\n"; 
$cartao .= 'N: Cadastrado por: '.$usu."\n"; 
$cartao .= 'END:VCARD'; 

//Gerando a imagem com a classe QRcode 
if(!QRCode::png($cartao, $mq_id.'mq.png', QR_ECLEVEL_L, 1)){ 
	$resul['status'] = "OK";
	$resul['mensagem'] = "Atualizado!"; 
	$resul['sql'] = $rs->sql;
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul); 
    exit;
}	
/*---------------|FIM DO GERAR QRCODE  DE  MAQUINAS |------------------*/	 
//---------------------------------------------------------------------------------------------------------------------------------
/////////FIN DAS FUNÇÔES  /////////////////////////////////////////////////////////////////////////////////////////////||
//=================================================================================================================================

?>



