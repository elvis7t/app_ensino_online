<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "CUR";
$pag = "ap_pg_curso.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
$fn = new functions();
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Editar Curso</h1>
					</div>
					<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Curso</a></li>
						<li class="breadcrumb-item active">Visualizar</li>
					</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<?php		
		extract($_GET); 
		$rs = new recordset();
		$sql ="SELECT * FROM sys_curso 	
		WHERE cur_id = ".$cursoid;        
		$rs->FreeSql($sql);
		$rs->GeraDados(); 
		?>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">				
				<div class="card card-secondary card-outline">
					<div class="card-header">					
						<h3 class="card-title">Cursos</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body" >
						<form role="form" id="FormEditaCurso">  
							<div class="row">							
								<div class="col-sm-1">
									<div class="form-group">
									  <label>#ID:</label>
										<div class="input-group">
											<input type="text" DISABLED  class="form-control" value="<?=$rs->fld("cur_id");?>"/>											
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 								
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Titulo:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-server"></i></span>
											</div>
											<input type="text" DISABLED class="form-control" value="<?=$rs->fld("cur_titulo");?>"/>
										</div>
									</div>
								    <!-- /.form-group -->
								</div>							            
							</div>
							<!-- /.row --> 
							
							<div class="form-group row">									
								<div class="col-sm-2">
									<div class="form-group">
										<label>Data Inicial:</label>
										<div class="input-group">
											<div class="input-group date" id="calendario" data-target-input="nearest">
												<div class="input-group-append" data-target="#calendario" data-toggle="datetimepicker">
													<div class="input-group-text" ><i class="far fa-calendar-check"></i></div>
												</div>
												<input type="text" DISABLED class="form-control data_br" value="<?=$fn->data_br($rs->fld("cur_data_ini"));?>"/>																												
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group col-sm-2">
									<div class="form-group">
										<label for="rel_df">Data Final:</label>
										<div class="input-group">
											<div class="input-group date" id="calendario1" data-target-input="nearest">
												<div class="input-group-append" data-target="#calendario1" data-toggle="datetimepicker">
													<div class="input-group-text" ><i class="far fa-calendar-check"></i></div>
												</div>
												<input type="text" DISABLED class="form-control  data_br" value="<?=$fn->data_br($rs->fld("cur_data_fin"));?>" />																
											</div>									
										</div>		  
									</div>	
								</div>
							</div>
							<!-- /.row -->

							<div class="row">
								<div class="form-group">
									<label for="cur_desc">Descrição:</label>
									<div class="form-group">
										<textarea class="textarea" id="cur_desc" name="cur_desc"  style="height: 500px;" placeholder="Place some text here">									
										<?=$rs->fld("cur_desc");?>
										</textarea>
									</div>		
								</div>
								<!-- /.form-group -->
							</div>							
							<!-- /.row -->				

							<!-- Mensagem  -->
								<div id="mens"></div>
							<!-- /.Mensagem -->	
						</form>
						<!-- /.form -->	
					</div>
					<!-- /.card-body -->
					
					<div class="card-footer">													
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fas fa-hand-point-left"></i> Voltar</a>
                        <a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Editar Curso' a href="ap_edit_curso.php?token=<?=$_SESSION['token']?>&acao=N&cursoid=<?=$cursoid;?>"><i class="fas fa-edit"></i>Editar</a> 															
                        <a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Novo Curso' href="ap_cad_curso.php?token=<?=$_SESSION['token']?>"><i class="fa fa-plus"></i> Novo</a>			  					
					</div>				  					
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
<!-- Summernote -->
<script src="<?=$hosted;?>/assets/plugins/summernote/summernote-bs4.min.js"></script><!-- AdminLTE App -->
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- InputMask -->
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?=$hosted;?>/js/maskinput.js"></script>
<script src="<?=$hosted;?>/js/jmask.js"></script>
<!-- date-range-picker -->
<script src="<?=$hosted;?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  });
  </script>
</body>
</html>
