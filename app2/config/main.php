<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    date_default_timezone_set('America/Sao_Paulo');
    error_reporting(E_ALL & E_NOTICE & E_WARNING);
    $hosted = "http://192.168.5.248:86";
    session_start();
    ?>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos | Online</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= $hosted; ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/fullcalendar/dist/fullcalendar.min.css">	    
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/summernote/summernote-bs4.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= $hosted; ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">    
    <!-- Dropzone -->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/dist/css/dropzone.css">     
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Tempusdominus Bbootstrap 4  Calendario de form-->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- uPlot -->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/uplot/uPlot.min.css">  
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=$hosted;?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $hosted; ?>/assets/dist/css/adminlte.min.css">
</head>