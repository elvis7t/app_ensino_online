<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "EQ";
$pag = "eq_pg_marca.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
?>
 	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Visualisar Marca</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Marca</a></li>
							<li class="breadcrumb-item active">Visulizar</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<?php		
		extract($_GET); 
		$rs = new recordset();
		$sql ="SELECT * FROM eq_marca a
		JOIN eq_tipo b ON b.tipo_id = a.marc_tipoId 	
		WHERE marc_id = ".$marcaid;        
		$rs->FreeSql($sql);
		$rs->GeraDados(); 
		?>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- SELECT2 EXAMPLE -->
				<div class="card card-secondary card-outline">
					<div class="card-header">					
						<h3 class="card-title">Marca</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">					    
							<div class="col-sm-1">
								<div class="form-group">
								  <label>#ID:</label>
									<div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fas fa-key"></i></span>
										</div>
										<input type="text" DISABLED class="form-control" value="<?=$rs->fld("marc_id");?>"/>
									 </div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col --> 
							<div class="col-sm-5">
								<div class="form-group">
								  <label>#Tipo:</label>
									<div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fas fa-server"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("tipo_desc");?>">
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							 <!-- /.col -->
							<div class="col-sm-3">
								<div class="form-group">
								  <label>#Marca:</label>
									<div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="fas fa-apple-alt"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("marc_nome");?>">
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							 <!-- /.col -->						           
						</div>					
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fas fa-hand-point-left"></i> Voltar</a>
						<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Nova Marca' href="eq_cad_marca.php?token=<?=$_SESSION['token']?>"><i class="fa fa-plus"></i> Novo</a>
						<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Alterar Marca'  href="eq_edit_marca.php?token=<?=$_SESSION['token']?>&acao=N&marcaid=<?=$rs->fld('marc_id');?>"><i class="fas fa-edit"></i> Editar</a>
					</div>
				  <!-- /.col (right) -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
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
</body>
</html>
