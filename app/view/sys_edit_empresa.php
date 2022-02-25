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

$rs = new recordset();
$sql = "SELECT * FROM sys_usuario a          
          JOIN sys_empresa       c ON a.usu_empId = c.emp_id 
		  JOIN sys_departamento  d ON a.usu_dpId   = d.dp_id
          WHERE usu_cod = ".$_SESSION['usu_cod'];
$rs->FreeSql($sql);
$disable="disabled"; 
$rs->GeraDados();
$usu_cod = $rs->fld("usu_cod");
if(($rs->fld("usu_cod") == $_SESSION['usu_cod']) OR ($_SESSION['classe'])==1){
  $disable = "";
}
?>
   
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				    <div class="col-sm-6">
						<h1>Editar Empresa</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Empresa</a></li>
							<li class="breadcrumb-item active">Editar</li>
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
				<div class="card card-secondary card-outline">
					<div class="card-header">					
					  <h3 class="card-title">Empresa</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body" >
						<form role="form" id="FormEditEmp">  
							<div class="row">
								<div class="col-sm-2">
								<img class="img-fluid img-thumbnail img-responsive " src="<?=$hosted;?><?=$rs->fld('emp_logo');?>" alt="Logo da Empresa">
								</div>
								<div class="col-sm-1">
									<div class="form-group">
									  <label>#ID:</label>
										<div class="input-group">
											<input type="text" DISABLED class="form-control" name="emp_id" id="emp_id" value="<?=$rs->fld("emp_id");?>"/>
											<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token"/>
											<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista"/>
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
											<input type="text" class="form-control" name="emp_nome"  id="emp_nome"  maxlength="50" value="<?=$rs->fld("emp_nome");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								 <!-- /.col -->
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#Apelido:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-suitcase-rolling"></i></span>
											</div>
											<input type="text" class="form-control" name="emp_alias"  id="emp_alias" maxlength="20" value="<?=$rs->fld("emp_alias");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#CNPJ:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input type="text" class="form-control" name="emp_cnpj" id="emp_cnpj"  value="<?=$rs->fld("emp_cnpj");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>            
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#Inscri&ccedil;&atilde;o Estadual:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input type="text" class="form-control iest" id="emp_ie" name="emp_ie"  value="<?=$rs->fld("emp_ie");?>"/>
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
											<input type="text" class="form-control cep" id="cep" name="cep" value="<?=$rs->fld("emp_cep");?>" <?=$disable; ?>/>
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
											<input type="text"  class="form-control input-sm text-uppercase"  id="log" value="<?=$rs->fld("emp_log");?>" <?=$disable; ?>/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#N&uacute;mero:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
											</div>
											<input type="text" class="form-control" id="num" name="num"  value="<?=$rs->fld("emp_num");?>"/>
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
											<input type="text" class="form-control" id="compl" name="compl"  value="<?=$rs->fld("emp_compl");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>             
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Bairro:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
											</div>
											<input type="text" class="form-control input-sm text-uppercase" id="bai" value="<?=$rs->fld("emp_bai");?>"<?=$disable; ?>/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Cidade:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
											</div>
											<input type="text" class="form-control input-sm text-uppercase" id="cid"  value="<?=$rs->fld("emp_cid");?>" <?=$disable; ?>>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#UF:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
											</div>
											<input type="text" class="form-control input-sm text-uppercase" id="uf" value="<?=$rs->fld("emp_uf");?>" <?=$disable; ?>/>
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
											<input type="text" class="form-control" id="emp_contato" name="emp_contato"  maxlength="30" value="<?=$rs->fld("emp_contato");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>						            
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#E-mail:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-at"></i></span>
											</div>
											<input type="text" class="form-control" id="emp_email" name="emp_email" maxlength="30" value="<?=$rs->fld("emp_email");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Telefone:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-phone"></i></span>
											</div>
											<input type="tel" class="form-control tel" id="emp_tel" name="emp_tel"  value="<?=$rs->fld("emp_tel");?>">
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
											<input type="text" class="form-control" id="emp_site" name="emp_site" maxlength="50" value="<?=$rs->fld("emp_site");?>">
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 											            
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
						<button type="button" id="btn_EditEmp" class="btn btn-info btn-sm" type="submit"><i class="fas fa-sync-alt"></i> Alterar</button>
						<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Atribuir imagem'  a href="sys_cad_logo_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$empid;?>"><i class="fas fa-cloud-upload-alt"></i></i> Logo</a>
						<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Nova empresa' href="sys_cad_empresa.php?token=<?=$_SESSION['token']?>"><i class="fas fa-plus"></i> Nova</a>
						<!--<a 	class="btn btn-sm btn-secondary" data-toggle='tooltip' data-placement='bottom' title='Atribuir imagem'  a href="sys_img_trm_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$empid;?>"><i class="fas fa-cloud-upload-alt"></i> Logo Termo</a>-->
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fas fa-hand-point-left"></i> Voltar</a>
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
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- InputMask Mscara java-->
<script src="<?=$hosted;?>/js/maskinput.js"></script>
<script src="<?=$hosted;?>/js/jmask.js"></script>
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!--Chama o java script para mascara e cep -->
<script src="<?=$hosted;?>/js/jcep.js"></script> 
<!--Chama o java script -->
<script src="<?=$hosted;?>/js/action_system.js"></script>
<!-- Validation --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
</body>
</html>
