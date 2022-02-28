<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
ob_start();
$user = $_SESSION['usuario'];
$token = $_SESSION['token'];
// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Finally, destroy the session.
session_destroy();
//antes de voltar à pagina de LOGIN, altera o status da conexao para OFF
require_once("../model/recordset.php");
$rslogout = new recordset();
$rslogout->FreeSql("UPDATE sys_logado SET log_status='0' WHERE log_user = '" . $user . "' AND log_token='" . $token . "'");
header("location:http://192.168.5.248:86/view/login.php");
exit;
