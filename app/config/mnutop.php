<?php
session_start();
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fna = new functions();
$rsa = new recordset();
$cua = $_SESSION["usu_cod"];
//marcando mensagens como lidas com o ID do PARA
$para = (isset($_GET["para"]) ? $_GET["para"] : 0);
$msg = (isset($_COOKIE["msgant"]) ? $_COOKIE["msgant"] : 0);
setcookie("msg_lido", 1);
//Verificando novas mensagens não lidas
$sql ="SELECT * FROM sys_usuario a
JOIN sys_dashboard b ON a.usu_pagId = b.dash_id 
WHERE usu_ativo ='1' AND usu_cod = ".$_SESSION['usu_cod'] ;
$rsa->FreeSql($sql);
$rsa->GeraDados();	
$corpagina = $rsa->fld("dash_collor");

$sql ="SELECT * FROM sys_usuario a
JOIN sys_dashboard b ON a.usu_mnutopId = b.dash_id 
WHERE usu_ativo ='1' AND usu_cod = ".$_SESSION['usu_cod'] ;
$rsa->FreeSql($sql);
$rsa->GeraDados();	
$cormenutop = $rsa->fld("dash_collor");
///==================================\\\
?>
<!--Modo Dark da Pagina -->
<body class="hold-transition <?=$corpagina;?>-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= $hosted; ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar --> <!-- Mudar a cor -->
        <nav class="main-header navbar navbar-expand navbar-<?=$cormenutop;?>">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= $hosted; ?>/view/index.php?token=<?= $_SESSION['token']; ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item dropdown user-menu">
                    <!-- /.E-mail -->

                    <!-- User Menu -->
                    <?php
                    $sql = "SELECT usu_datacad, usu_nome, usu_foto, dp_nome   FROM sys_usuario a
                    JOIN sys_classe b ON a.usu_classeId = b.classe_id 
                    JOIN sys_empresa c ON a.usu_empId = c.emp_id
                    JOIN sys_departamento d ON a.usu_dpId = d.dp_id 					
                    WHERE usu_cod = " . $_SESSION['usu_cod'];
                    $rsa->FreeSql($sql);
                    $rsa->GeraDados();

                    $data1 = $rsa->fld("usu_datacad");
                    $data2 = date("Y-m-d H:i:s");
                    $diferenca = strtotime($data2) - strtotime($data1);
                    $dias = floor($diferenca / (60 * 60 * 24));
                    ?>
                    <a href="<?= $hosted; ?>/view/sys_edit_perfil_usuario.php?token=<?= $_SESSION['token']; ?>&acao=N&usucod=<?= $_SESSION["usu_cod"]; ?>"
                        class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $hosted; ?>/<?= $_SESSION['usu_foto']; ?>"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"><?= $_SESSION['nome_usu']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="<?= $hosted; ?>/<?= $_SESSION['usu_foto']; ?>" class="img-circle elevation-2"
                                alt="User Image">
                            <p>
                                <?= $_SESSION['nome_usu']; ?> - <?= $rsa->fld("dp_nome"); ?>
                                <small>Ativo h&aacute; <?= $dias; ?> Dias</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="<?= $hosted; ?>/view/sys_edit_perfil_usuario.php?token=<?= $_SESSION['token']; ?>&acao=N&usucod=<?= $_SESSION["usu_cod"]; ?>"
                                class="btn btn-default btn-flat">Perfil</a>
                            <a href="<?= $hosted; ?>/view/logout.php" class="btn btn-default btn-flat float-right">Sign
                                out</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->