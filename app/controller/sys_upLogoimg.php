<?php
session_start();
require_once("../model/recordset.php");
$rs_imagem = new recordset();
$ds= DIRECTORY_SEPARATOR;  //1   
$path = "/images/logo_emp/"; // ALTERAR
//$path = "http://gigafox.890m.com/ecommerce/images/upload/"; ALTERAR
$storeFolder = '../images/logo_emp';   //2
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
    if(move_uploaded_file($tempFile,$targetFile)){
		$dados['emp_logo']	= $path.$_FILES['file']['name'];
		$whr = "emp_id =".$_REQUEST['logo'];  
		$rs_imagem->Altera($dados,"sys_empresa",$whr);    
	} 
}  
?>