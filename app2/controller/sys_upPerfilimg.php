<?php
session_start();
require_once("../model/recordset.php");
$rs_imagem = new recordset();
$nome = substr($_POST['nome'], 0, 3); //Pega os 3 caracteres
$ds= DIRECTORY_SEPARATOR;  //1
$path = "/images/perfil/"; // ALTERAR
//$path = "http://gigafox.890m.com/ecommerce/images/upload/"; ALTERAR
$storeFolder = '../images/perfil';   //2
$rename = $nome . '_' . $_POST['perfil']. '.png';
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];   
	rename($_FILES['file']['name'], $rename);	//Remoneia a foto           
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $rename;  //5
    if(move_uploaded_file($tempFile,$targetFile)){
		$dados['usu_foto']	= $path.$rename;
		$whr = "usu_cod =".$_REQUEST['perfil'];  
		$rs_imagem->Altera($dados,"sys_usuario",$whr);   

	}

}

?>