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
$fn = new functions();
$rs = new recordset();

extract($_GET);
$sql ="SELECT * FROM sys_usuario a
JOIN sys_classe b ON a.usu_classeId = b.classe_id 
JOIN sys_empresa c ON a.usu_empId = c.emp_id
JOIN sys_departamento d ON a.usu_dpId = d.dp_id 
WHERE usu_cod = ".$usucod;
$rs->FreeSql($sql);
$disable="disabled"; 
$rs->GeraDados();
$usu_cod = $rs->fld("usu_cod");
if(($rs->fld("usu_cod") == $_SESSION['usu_cod']) OR ($_SESSION['classe'])==1){
  $disable = "";
}
$data1 = $rs->fld("usu_datacad");
$data2 = date("Y-m-d H:i:s");
$diferenca = strtotime($data2) - strtotime($data1);
$dias = floor($diferenca / (60 * 60 * 24));

$var = $rs->fld("emp_id");
$usu_nome = $rs->fld("usu_nome"); 
$dp_id = $rs->fld("dp_id");
$emp_id = $rs->fld("emp_id");
$usu_classe = $rs->fld("usu_classeId");
$emp_tel = $rs->fld("emp_tel");

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Visualisar Usu&aacute;rio</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Usu&aacute;rio</a></li>
							<li class="breadcrumb-item active">Visualizar</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		
		 <!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<!-- Profile Image -->
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<img class="profile-user-img img-responsive img-circle" src="<?=$hosted;?>/<?=$rs->fld('usu_foto');?>" alt="User profile picture">
									<h3 class="profile-username text-center"><?=$rs->fld('usu_nome');?></h3>
									<p class="text-muted text-center"><?=$rs->fld('dp_nome');?></p>
								</div>
								<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
								<b>Ativo a</b> <a><?=$dias;?> Dias</a>
								</li>								
							</div>
						<!-- /.card-body -->
						</div>
						<!-- /.card -->

						<!-- About Me Box -->
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">Sobre</h3>
							</div>
							
							<!-- /.card-header -->
							<div class="card-body">
								<strong><i class="fa fa-address-card margin-r-5"></i> Contato</strong>
									<p class="text-muted">
										<adress>
										<?php
										echo $emp_tel.", Ramal ".$rs->fld('usu_ramal')."<br>";
										echo $rs->fld('usu_cel')."<br>";									 
										?>
										<a href="mailto:<?=$rs->fld('usu_email')?>"><?=$rs->fld('usu_email')?></a><br>
										</adress>  
									</p>
								<hr>					  
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->					
					</div>
				    <!-- /.col -->
					
					<div class="col-md-9">
						<div class="card card-primary card-outline">
							<div class="card-header p-2">
								<ul class="nav nav-pills">
									<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Dados do Usu&aacute;rio</a></li>																		
								</ul>
							</div>
							<!-- /.card-header -->
							
							<div class="card-body">
								<div class="tab-content">
									<div class="active tab-pane" id="activity">
										<form role="form" id="FormAltUsuario"> 									  
											<div class="row">
												<div class="col-sm-2">
													<div class="form-group">
													  <label>#ID:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-key"></i></span>
															</div>
															<input type="text" DISABLED class="form-control" name="usu_cod" id="usu_cod" value="<?=$rs->fld("usu_cod");?>"/>
															<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">														
														</div>
													</div>
													<!-- /.form-group -->
												</div>
												<!-- /.col --> 												
												<div class="col-sm-5">
													<div class="form-group">
													  <label>#Nome:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-user"></i></span>
															</div>
															<input type="text" DISABLED   class="form-control" name="usu_nome" id="usu_nome" value="<?=$rs->fld("usu_nome");?>"/>																												
														</div>
													</div>
													<!-- /.form-group -->
												</div>
												<!-- /.col -->												
												<div class="col-sm-5">
													<div class="form-group">
													  <label>#E-mail:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-at"></i></span>
															</div>
															<input type="text" DISABLED  class="form-control" name="usu_email" id="usu_email" value="<?=$rs->fld("usu_email");?>"/>																												
														</div>
													</div>
													<!-- /.form-group -->
												</div>
											</div>
											<!-- /.row -->
											
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group">
													  <label for="emp_nome">#Empresa:</label>
														<div class="input-group">
															<div class="input-group-prepend">
															  <span class="input-group-text"><i class="fas fa-city"></i></span>
															</div>
															<select DISABLED  class="form-control select2bs4" id="sel_emp" name="sel_emp" >    
																<option value="">Selecione:</option>
																<?php
																$whr = "emp_Id<>0";
																$rs->Seleciona("*","sys_empresa",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição															 
																while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
																?>
																<option value="<?=$rs->fld("emp_id");?>"<?=($rs->fld("emp_id")==$var?"SELECTED":"");?>> <?=$rs->fld("emp_alias");?></option>      
																<?php
																}  
																?> 
															</select>
														</div>
													</div>
													<!-- /.form-group -->
												</div>
												<!-- /.col --> 	
												<div class="col-sm-4">
													<div class="form-group">
													  <label for="sel_class">#Departamento:</label>
														<div class="input-group">
															<div class="input-group-prepend">
															  <span class="input-group-text"><i class="fas fa-building"></i></span>
															</div>
															<select DISABLED  class="form-control select2bs4" id="sel_dp" name="sel_dp" >    
																<option value="">Selecione:</option>
																<?php
																$whr = "dp_empId=".$var;
																$rs->Seleciona("*","sys_departamento",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
																while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
																?>
																<option value="<?=$rs->fld("dp_id");?>"<?=($rs->fld("dp_id")==$dp_id?"SELECTED":"");?>> <?=$rs->fld("dp_nome");?></option>      
																<?php
																}  
																?>
															</select> 
														</div>
													</div>
													<!-- /.form-group -->
												</div>
												<!-- /.col --> 
												<div class="col-md-4">
													<div class="form-group">
													  <label for="sel_class">#Classe:</label>
														<div class="input-group">
															<div class="input-group-prepend">
															  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
															</div>
															<select DISABLED  class="form-control select2bs4" id="sel_class" name="sel_class" >    
																<option value="">Selecione:</option>
																<?php
																$whr = "classe_id<>0";
																$rs->Seleciona("*","sys_classe",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
																while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
																?>
																<option value="<?=$rs->fld("classe_id");?>"<?=($rs->fld("classe_id")==$usu_classe?"SELECTED":"");?>><?=$rs->fld("classe_desc");?></option>
																<?php
																}  
																?>
															</select> 
														</div>
													</div>									
												</div>
											</div>
											<!-- /.row -->
											
											<div class="row">
												<?php
												$rs = new recordset();
												$sql ="SELECT * FROM sys_usuario 												
												WHERE usu_cod = ".$usucod;
												$rs->FreeSql($sql);
												$rs->GeraDados();											
												?>											
												<div class="col-sm-4">
													<div class="form-group">
													  <label>#Cadastrado em:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="far fa-calendar-check"></i></span>
															</div>
															<input type="text" DISABLED class="form-control" value="<?=$fn->data_Hbr($rs->fld('usu_datacad'));?>"/>																												
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
															<input type="text" DISABLED  class="form-control"  value="<?=$emp_tel;?>"/>																												
														</div>
													</div>
													<!-- /.form-group -->
												</div>
												<!-- /.col -->
												<div class="col-sm-2">
													<div class="form-group">
													  <label>#Ramal:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-phone"></i></span>
															</div>
															<input type="text" DISABLED class="form-control"   id="usu_ramal"  value="<?=$rs->fld("usu_ramal");?>">
														</div>
													</div>
													<!-- /.form-group -->
												</div>
												<!-- /.col -->
												<div class="col-sm-3">
													<div class="form-group">
													  <label>#Celular:</label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fas fa-phone"></i></span>
															</div>
															<input type="text" DISABLED class="form-control cel"  cel" id="usu_cel" name="usu_cel" value="<?=$rs->fld("usu_cel");?>">
														</div>
													</div>
													<!-- /.form-group -->
												</div>														
											</div>
											<!-- /.row -->
											
											<div class="row">																							
												<div class="form-group col-md-3">
												  <label for="usu_ativo">#Sexo:</label><br> 
												  	<input DISABLED type="radio" class="minimal" value=M <?=($rs->fld("usu_sexo")=='M'?"CHECKED":"");?> id="usu_sexo" name="usu_sexo"> Masculino<br>
													<input  DISABLED type="radio" class="minimal" value=F <?=($rs->fld("usu_sexo")=='F'?"CHECKED":"");?> id="usu_sexo" name="usu_sexo"> Feminino<br>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.row -->	
										</form>
										<!-- /.form -->
									</div>
									<!-- /.tab-pane -->
									
									<div class="boody-footer">
										<a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fas fa-hand-point-left"></i> Voltar</a>
										<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Novo Usu&aacute;rio' href="sys_cad_usuario.php?token=<?=$_SESSION['token']?>"><i class="fa fa-plus"></i> Novo</a>
										<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Editar Usu&aacute;rio' a href="sys_edit_usuario.php?token=<?=$_SESSION['token']?>&acao=N&usucod=<?=$usucod;?>"><i class="fas fa-edit"></i>Editar</a> 															
									</div>
									<!-- /.tab-content -->
								</div>
								<!-- /.tab-cotent -->								
							</div>
							<!-- /.card-body -->							
						</div>
						<!-- /.nav-tabs-custom -->
					</div>
				    <!-- /.col -->
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
<!-- Select2 -->
<script src="<?=$hosted;?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?=$hosted;?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
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
<!--Chama o java script para mascara -->
<script src="<?=$hosted;?>/js/action_system.js"></script>  
<!-- Validation --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
</body>
</html>