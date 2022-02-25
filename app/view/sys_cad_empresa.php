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
require_once("../class/class.functions.php");
$fn = new functions();
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
						<h1>Cadastrar Empresa</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Empresa</a></li>
							<li class="breadcrumb-item active">Cadastro</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		
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
					<div class="card-body">
						<form role="form" id="FormCadEmp">  
							<div class="row">					    
								<!-- /.col --> 
								<div class="col-sm-5">
									<div class="form-group">
									  <label for="emp_nome">#Raz&atilde;o social:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
											</div>
											<input type="text"  class="form-control" name="emp_nome" id="emp_nome" maxlength="50" value="" placeholder="Desc. da Empresa"/>
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
											<input type="text"  class="form-control"  id="emp_alias" name="emp_alias" maxlength="20" value="" placeholder="Desc. do Apelido Empresa"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#CNPJ:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input type="text"  class="form-control cnpj" id="emp_cnpj" name="emp_cnpj"   value="" placeholder="CNPJ da Empresa"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>								             
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Inscri&ccedil;&atilde;o Estadual:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-key"></i></span>
											</div>
											<input type="text"  class="form-control iest" value="" id="emp_ie" name="emp_ie" placeholder="Desc. Inscri&ccedil;&atilde;o Estadual"/>
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
											<input type="text" class="form-control cep" id="cep" name="cep"  placeholder="Desc. o CEP" value="" <?=$disable; ?>/>
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
											<input class="form-control input-sm text-uppercase" id="log" placeholder="Logradouro" value="" <?=$disable; ?>/>
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
											<input class="form-control input-sm" id="num" name="num"  placeholder="Num.:" value="" <?=$disable; ?>/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->								             
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#Complemento:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
											</div>
											<input class="form-control input-sm text-uppercase" id="compl" name="compl" placeholder="Compl.:" value="" <?=$disable; ?>/>
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
											<input class="form-control input-sm text-uppercase" id="bai" placeholder="Bairro" value="" <?=$disable;?>/>
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
											<input class="form-control input-sm text-uppercase" id="cid" placeholder="Cidade" value="" <?=$disable;?>/>
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
											<input class="form-control input-sm text-uppercase" id="uf" placeholder="UF" value="" <?=$disable;?>/>
										</div>
									</div>
									<!-- /.form-group -->
								</div> 														            
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
									  <label>#Contato:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="far fa-id-badge"></i></span>
											</div>
											<input type="text" class="form-control" id="emp_contato" name="emp_contato"  placeholder="Dec. Um contato"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="form-group">
									  <label for="emp_email">#E-mail:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-at"></i></span>
											</div>
											<input type="email" class="form-control" id="emp_email" name="emp_email"  placeholder="Dec. Um Email"/>
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
											<input type="tel" class="form-control tel" id="emp_tel" name="emp_tel"  placeholder="Desc. Telefone"/>
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
											<input type="text" class="form-control" id="emp_site" name="emp_site"  placeholder="Desc. Site"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row --> 
							
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
						<!-- /.form -->
					</div>
					<!-- /.card-body -->
					
					<div class="card-footer">					
						<button type="button" id="btn_CadEmp" class="btn btn-info btn-sm" type="submit"><i class="fas fa-save"></i> Salvar</button>
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
<!-- <script src="<?=$hosted;?>/assets/plugins/jquery/jquery.min.js"></script> -->
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
<!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
</body>
</html>
