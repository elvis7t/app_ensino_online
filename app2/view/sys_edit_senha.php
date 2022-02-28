<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
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
						<h1>Trocar senha</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Trocar senha</li>	
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->				
		<section class="content">
			<div class="row">
				<div class="col-sm-4"></div>	
				<div class="col-sm-4">
					<div class="col-md-">
						<div class="card card-danger">
							<div class="card-header">
							  <h3 class="card-title">Altere sua senha</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fas fa-minus"></i></button>
								</div>
							</div>
							<div class="card-body">
								<form role="form" id="FormSenhaPerfil"> 	
									<div class="row">
										<div class="form-group">
										  <label>#Nova senha:</label>
											<div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
												</div>
												<input type="password" class="form-control" id="sen_nova" name="sen_nova"  value="" placeholder="Senha de Usuario"/>
											</div>
										</div>
										<!-- /.form-group -->
									</div>
									<!-- /.col -->
									<div class="row">
										<div class="form-group">
										  <label for="rsen_nova">#Confirme Senha:</label>
											<div class="input-group">
												<div class="input-group-prepend">
												  <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
												</div>
												<input type="password" class="form-control" id="rsen_nova" name="rsen_nova" value=""  placeholder="Confirme senha"/>
											</div>
										</div>
										<!-- /.form-group -->
									</div>
									<!-- /.col -->
									<div class="row">
										<div id="formerros" class="clearfix" style="display:none;"> 
											<div class="alert alert-danger alert-dismissible">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<h5><i class="icon fas fa-ban"></i> Alerta!</h5>
												<h4>Erros no preenchimento do formul&aacute;rio.</h4>
												<p>Verifique os erros no preenchimento acima:</p>
												<ol>
													<!-- Erros são colocados aqui pelo validade --> 
												</ol>
											</div>
										</div>
										<!-- /.formerros -->
									</div>
									<!-- /.row -->
									<!-- Mensagem  -->
									<div id="mens"></div>
									<!-- /.Mensagem -->							
								</form>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button id="bt_edit_senha_perfil" class="btn btn-sm btn-danger"><i class="far fa-save"></i> Salvar </button>
							</div>
							<!-- /.card-footer-->
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
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
<!-- jQuery UI 1.11.4 -->
<script src="<?=$hosted;?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=$hosted;?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=$hosted;?>/assets/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=$hosted;?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.js"></script>
<!--Chama o java script para mascara -->
<script src="<?=$hosted;?>/js/action_system.js"></script>  
<!-- Validation --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
</body>
</html>


