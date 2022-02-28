<?php
//sujeira embaixo do tapete :( 
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "SYS";
$pag = "sys_pg_usuario.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Carregar Foto do Perfil</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Sistema</a></li>
							<li class="breadcrumb-item active">Usu&aacute;rio</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		
		<!-- Main content -->
		<section class="content">
			<div class="card card-secondary">
			<!-- Default box -->
				<div class="card-header">
					<h3 class="card-title">Foto do Perfil</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
					</div>
				</div>
				<div class="card-body">
					<form action="../controller/sys_upPerfilimg.php" drop-zone="" id="file-dropzone" class="dropzone">
						<input type="hidden" name="perfil" value="<?=$_GET['usucod'];?>" >
						<div class="dz-message" data-dz-message>
							<center class="text-muted">
								<h2>Arraste a nova imagem e solte aqui para fazer Upload</h2>
								<i class="fas fa-cloud-upload-alt text-info fa-10x"></i>
							</center>
						</div>
					</form>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<a href="javascript:history.go(-1);" class="btn btn-md btn-secondary"><i class="fas fa-hand-point-left"></i> Voltar</a>
				</div>
				<!-- /.card-footer-->
			</div>
			<!-- /.card -->
		</section>
		<!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
  <?php require_once("../config/footer.php");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=$hosted;?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- InputMask Mscara java-->
<!-- Dropzone -->
<script src="<?=$hosted;?>/js/dropzone.js"></script>
</body>
</html>
