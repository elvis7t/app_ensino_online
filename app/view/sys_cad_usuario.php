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
$rs = new recordset();
$sql = "SELECT * FROM sys_usuario a         
          JOIN sys_empresa       c ON a.usu_empId = c.emp_id 
		  JOIN sys_departamento  d ON a.usu_dpId   = d.dp_id
          WHERE usu_cod = ".$_SESSION['usu_cod'];
$rs->FreeSql($sql);
$disable="disabled"; 
$rs->GeraDados();
$usu_cod = $rs->fld("usu_cod");
$emp_id = $rs->fld("emp_id");
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
						<h1>Cadastrar Usu&aacute;rio</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Usu&aacute;rio</a></li>
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
						<h3 class="card-title">Usu&aacute;rio</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form role="form" id="FormCadUsu">  
							<div class="row">					    
								<!-- /.col --> 
								<div class="col-sm-6">
									<div class="form-group">
									  <label>#Nome:</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text"  class="form-control" name="usu_nome" id="usu_nome" maxlength="30" value="" placeholder="Desc. do Nome Completo"/>																												
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="form-group">
									  <label>#E-mail:</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-at"></i></span>
											</div>
											<input type="text"  class="form-control" name="usu_email" id="usu_email" maxlength="50" value="" placeholder="Desc. do E-mail"/>																												
										</div>
									</div>
									<!-- /.form-group -->
								</div>
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#senha:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
											</div>
											<input type="password" class="form-control" id="usu_senha" id="sen_nova" name="sen_nova" maxlength="9" value="" placeholder="Senha de Usuario"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-2">
									<div class="form-group">
									  <label for="usu_csenha">#Confirme Senha:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
											</div>
											<input type="password" class="form-control" id="usu_csenha" name="usu_csenha" maxlength="9" value=""  placeholder="Confirme senha"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 
								<div class="col-sm-3">
									<div class="form-group">
									  <label for="emp_nome">#Empresa:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-city"></i></span>
											</div>
											<select class="form-control select2bs4" id="sel_emp" name="sel_emp"/>    
												<option value="">Selecione:</option>
												<?php
												$whr = "emp_Id<>0";
												$rs->Seleciona("*","sys_empresa",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição															 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("emp_id");?>"> <?=$rs->fld("emp_alias");?></option>      
												<?php
												}  
												?> 
											</select>
										</div>										
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-3">
									<div class="form-group">
									  <label for="sel_class">#Departamento:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-building"></i></span>
											</div>
											<select class="form-control select2bs4" id="sel_dp" name="sel_dp"/>    
												<option value="">Selecione:</option>
												
											</select> 
										</div>
									</div>
									<!-- /.form-group -->
								</div>	
							</div>
							<!-- /.row --> 
							
							<div class="row">																
								<div class="col-sm-3">
									<div class="form-group">
									  <label for="sel_class">#Classe:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
											</div>
											<select class="form-control select2bs4" id="sel_class" name="sel_class"/>    
												<option value="">Selecione:</option>
												<?php
												$whr = "classe_id<>0";
												$rs->Seleciona("*","sys_classe",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("classe_id");?>"><?=$rs->fld("classe_desc");?></option>
												<?php
												}  
												?>
											</select> 
										</div>
									</div>	
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#Chapa:</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-passport"></i></span>
											</div>
											<input type="text" class="form-control " id="usu_chapa" name="usu_chapa" maxlength="6" placeholder="Inf. a Chapa" value=""/>																												
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
											<input type="text" class="form-control"   id="usu_ramal" name="usu_ramal"  maxlength="6" placeholder="Inf. Ramal" value=""/>																												
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-2">
									<div class="form-group">
									  <label>#Celular:</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-phone"></i></span>
											</div>
											<input type="text" class="form-control cel"  cel" id="usu_cel" name="usu_cel" maxlength="15" placeholder="Inf. Celular" value=""/>																												
										</div>
									</div>
									<!-- /.form-group -->
								</div>
							</div>
							<!-- /.row -->
							
							<div class="row">
								<div class="form-group col-md-3">
								  <label>#Sexo:</label><br> 
									<input type="radio" class="minimal" value='M'  id="usu_sexo" name="usu_sexo" CHECKED/> Masculino<br>
									<input type="radio" class="minimal" value='F'  id="usu_sexo" name="usu_sexo"/> Feminino<br>
								</div>
								<!-- /.col -->	
								<div class="form-group col-md-2">
								  <label>#Mail:</label><br> 
									<input type="radio" class="minimal" value='1'  id="usu_pmail" name="usu_pmail" /> Sim<br>
									<input type="radio" class="minimal" value='0'  id="usu_pmail" name="usu_pmail" CHECKED/> Não<br>
								</div>
								<!-- /.col -->	
								<div class="form-group col-md-2">
								  <label for="usu_pchat">#Chat:</label><br> 
									<input type="radio" class="minimal" value='1'  id="usu_pchat" name="usu_pchat" /> Sim<br>											
									<input type="radio" class="minimal" value='0'  id="usu_pchat" name="usu_pchat" CHECKED/> Não<br>
								</div>	
								<!-- /.col -->	
								<div class="form-group col-md-2">
								  <label for="usu_pchat">#Calend:</label><br> 
									<input type="radio" class="minimal" value='1'  id="usu_pcalend" name="usu_pcalend" /> Sim<br>											
									<input type="radio" class="minimal" value='0'  id="usu_pcalend" name="usu_pcalend" CHECKED/> Não<br>
								</div>
								<!-- /.col -->	
								<div class="form-group col-md-2">
								  <label for="usu_prel">#Rel:</label><br> 
									<input type="radio" class="minimal" value='1'  id="usu_prel" name="usu_prel" /> Sim<br>											
									<input type="radio" class="minimal" value='0'  id="usu_prel" name="usu_prel" CHECKED/> Não<br>
								</div>	
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
						<button type="button" id="btn_CadUsu" class="btn btn-info btn-sm" type="submit"><i class="fas fa-save"></i> Salvar</button>
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
<!-- Select2 -->
<script src="<?=$hosted;?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })   

  })
</script>
</body>
</html>
