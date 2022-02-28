<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "EQ";
$pag = "at_pg_equipamento.php";// Fazer o link brilhar quando a pag estiver ativa
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
						<h1>Editar Equipamento</h1>
					</div>
					<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Equipamento</a></li>
						<li class="breadcrumb-item active">Editar</li>
					</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<?php		
		extract($_GET); 
		$rs = new recordset();
		$sql =" SELECT 
				a.eq_id,
				b.emp_nome,
				e.tipo_desc,
				c.marc_nome,
				a.eq_datacad,
				d.usu_nome,
				a.eq_modelo,
				a.eq_serial,
				a.eq_desc,
				f.status_id,
				a.eq_valor,
				f.status_color,
				f.status_classe,
				f.status_desc
				
				FROM at_equipamento a
					JOIN sys_empresa  b ON a.eq_empId  = b.emp_id 
					JOIN eq_marca     c ON a.eq_marcId = c.marc_id
					JOIN sys_usuario  d ON a.eq_usucad = d.usu_cod
					JOIN eq_tipo      e ON a.eq_tipoId = e.tipo_id
					JOIN at_status    f ON a.eq_statusId = f.status_id		
				WHERE eq_id = ".$eqid;        
		$rs->FreeSql($sql);
		$rs->GeraDados(); 
		$status_id  = $rs->fld("status_id");
		$eq_valor   = $rs->fld("eq_valor");  
		?>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">				
				<div class="card card-secondary card-outline">
					<div class="card-header">					
						<h3 class="card-title">Equipamento</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body" >
						<form role="form" id="FormEditEq">  
							<div class="row">							
								<div class="col-sm-1">
									<div class="form-group">
									  <label>#ID:</label>
										<div class="input-group">
											<input type="text" DISABLED  class="form-control" name="eq_id" id="eq_id" value="<?=$rs->fld("eq_id");?>"/>
											<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token"/>										
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 
								<div class="col-sm-5">
									<div class="form-group">
									  <label>#Empresa:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-city"></i></span>
											</div>
											<input type="text" DISABLED  class="form-control"  value="<?=$rs->fld("emp_nome");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col --> 
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Tipo:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-server"></i></span>
											</div>
											<input type="text" DISABLED  class="form-control"  value="<?=$rs->fld("tipo_desc");?>"/>
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
											<input type="text" DISABLED  class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("marc_nome");?>"/>
										</div>
									</div>
								    <!-- /.form-group -->
								</div>							            
							</div>
							
							<!-- /.row -->
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Cadastrado em:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
											</div>
											<input DISABLED class="form-control input-sm text-uppercase" value="<?=$fn->data_hbr($rs->fld("eq_datacad"));?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Cadastrado Por:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input DISABLED class="form-control input-sm text-uppercase" value="<?=$rs->fld("usu_nome")?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Modelo:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input type="text"  class="form-control" id="eq_modelo" name="eq_modelo" maxlength="20" value="<?=$rs->fld("eq_modelo");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>						 
								<!-- /.col -->								
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#N&ordm; Serial:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input type="text" class="form-control" id="eq_serial" name="eq_serial" maxlength="20" value="<?=$rs->fld("eq_serial");?>" >
										</div>
									</div>
									<!-- /.form-group -->
								</div>
							</div>
							
							<div class="row">								
								<div class="col-sm-3">
									<div class="form-group">
									  <label>#Equipamento:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-mobile"></i></span>
											</div>
											<input class="form-control input-sm text-uppercase" id="eq_desc" name="eq_desc" maxlength="20" value="<?=$rs->fld("eq_desc");?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-2">
									<div class="form-group">
									  <label for="sel_class">Selecione A Status:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text <?=$rs->fld("status_color");?>"><i class="<?=$rs->fld("status_classe");?>"></i></span>
											</div>
											<select class="form-control select2bs4" id="sel_eqstatus" name="sel_eqstatus"/>    
												<option value="">Selecione:</option>
												<?php
													$whr = "status_id<>0";
													$rs->Seleciona("*","at_status",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
													while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
													?>
													<option value="<?=$rs->fld("status_id");?>"<?=($rs->fld("status_id")==$status_id?"SELECTED":"");?>><?=$rs->fld("status_desc");?></option>
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
									  <label>#Valor:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
											</div>
											<input class="form-control" id="eq_valor" name="eq_valor" maxlength="8" value="<?=$eq_valor;?>"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="form-group">
									  <label>#QRCODE:</label>
										<div class="input-group">											
											<a  title='Baixar Arquivo'  href="../images/qrcode_img/download.php?arquivo=<?=$eqid;?>eq.png"><img src="../images/qrcode_img/<?=$eqid;?>eq.png" /></a>
											<a 	class="btn btn-sm" data-toggle='tooltip' data-placement='bottom' title='Imprimir o QRCODE'  a href="../images/qrcode_img/imprimir_qrcodeEq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-print"></i> Imprimir qrcode</a>
										</div>
									</div>
									<!-- /.form-group -->
								</div>	
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
						<button type="button" id="btn_EditEq" class="btn btn-sm btn-info" type="submit"><i class="fas fa-sync-alt"></i> Alterar</button>
						<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Nova Empresa' href="at_cad_equipamento.php?token=<?=$_SESSION['token']?>"><i class="fa fa-plus"></i> Novo</a>
						<button type="button" id="btn_qrcodeEq" class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Gerar QRCODE' type="submit"><i class="fas fa-qrcode"></i> QRCODE</button>						
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
<!-- Select2 -->
<script src="<?=$hosted;?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=$hosted;?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- InputMask Mscara java-->
<script src="<?=$hosted;?>/js/maskinput.js"></script>
<script src="<?=$hosted;?>/js/jmask.js"></script>
<script src="<?=$hosted;?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?=$hosted;?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
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
