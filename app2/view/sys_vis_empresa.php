<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "SYS";
$pag = "sys_pg_empresa.php";// Fazer o link brilhar quando a pag estiver ativa
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
						<h1>Visualisar Empresa</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Empresa</a></li>
							<li class="breadcrumb-item active">Visualizar</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<?php		
		extract($_GET); 
		$rs = new recordset();
		$sql ="SELECT * FROM sys_empresa
		WHERE emp_id = ".$empid;      
		$rs->FreeSql($sql);
		$rs->GeraDados(); 
		?>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<!-- SELECT2 EXAMPLE -->
				<div class="card card-secondary card-outline">
					<div class="card-header">					
						<h3 class="card-title">Empresa</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-sm-2">
								<img class="img-fluid img-thumbnail img-responsive " src="<?=$hosted;?><?=$rs->fld('emp_logo');?>" alt="Logo da Empresa">
							</div>
							<div class="col-sm-1">
								<div class="form-group">
								  <label>#ID:</label>
									<div class="input-group">
										<input type="text" DISABLED class="form-control" value="<?=$rs->fld("emp_id");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col --> 
							<div class="col-sm-5">
								<div class="form-group">
								  <label>#Raz&atilde;o social:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-briefcase"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("emp_nome");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-sm-3">
								<div class="form-group">
								  <label>#Apelido:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-suitcase-rolling"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("emp_alias");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div> 							             
						</div>
						<!-- /.row -->
						
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
								  <label>#CNPJ:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-key"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"   value="<?=$rs->fld("emp_cnpj");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-sm-2">
								<div class="form-group">
								  <label>#Inscri&ccedil;&atilde;o Estadual:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-key"></i></span>
										</div>
										<input type="text" DISABLED class="form-control" value="<?=$rs->fld("emp_ie");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col --> 
							<div class="col-sm-2">
								<div class="form-group">
								  <label>#CEP:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("emp_cep");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-sm-4">
								<div class="form-group">
								  <label>#Logradouro:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-signs"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("emp_log");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>														            
						</div>
						<!-- /.row -->
						
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
								  <label>#N&uacute;mero:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"   value="<?=$rs->fld("emp_num");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-sm-2">
								<div class="form-group">
								  <label>#Complemento:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"   value="<?=$rs->fld("emp_comp1");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col --> 
							<div class="col-sm-3">
								<div class="form-group">
								  <label>#Bairro:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
										<input type="text" DISABLED class="form-control" value="<?=$rs->fld("emp_bai");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col --> 
							<div class="col-sm-4">
								<div class="form-group">
								  <label>#Cidade:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("emp_cid");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>														
						</div>
						<!-- /.row -->
						
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
								  <label>#UF:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("emp_uf");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col --> 
							<div class="col-sm-4">
								<div class="form-group">
								  <label>#Contato:</label>
									<div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="far fa-id-badge"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"   value="<?=$rs->fld("emp_contato");?>">
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->						            
							<div class="col-sm-3">
								<div class="form-group">
								  <label>#E-mail:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-at"></i></span>
										</div>
										<input type="email" DISABLED class="form-control" value="<?=$rs->fld("emp_email");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>											 											            
						</div>
						<!-- /.row -->
						
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
								  <label>#Telefone:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-phone"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("emp_tel");?>">
									</div>
								</div>
								<!-- /.form-group -->
							</div>
							<!-- /.col -->
							<div class="col-sm-4">
								<div class="form-group">
								  <label>#Site:</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fab fa-chrome"></i></span>
										</div>
										<input type="text" DISABLED class="form-control"  value="<?=$rs->fld("emp_site");?>"/>
									</div>
								</div>
								<!-- /.form-group -->
							</div>
						</div>
						<!-- /.row -->           
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fas fa-hand-point-left"></i> Voltar</a>
						<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Nova empresa' href="sys_cad_empresa.php?token=<?=$_SESSION['token']?>"><i class="fas fa-plus"></i> Nova</a>
						<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Editar Empresa' a href="sys_edit_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs->fld('emp_id');?>"><i class="fas fa-edit"></i>Editar</a> 					
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
