<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "CUR";
$pag = "ap_pg_aluno.php";// Fazer o link brilhar quando a pag estiver ativa
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
						<h1>Cadastrar Aluno</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Aluno</a></li>
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
						<h3 class="card-title">Aluno</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form role="form" id="FormCadAluno">  
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
									  <label for="alu_nome">#Nome:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
											</div>
											<input type="text"  class="form-control"  id="alu_nome" maxlength="50" name="alu_nome"  placeholder="Desc. do Nome"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="form-group">
									  <label for="alu_email">#E-mail:</label>
										<div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text"><i class="fas fa-at"></i></span>
											</div>
											<input type="mail"  class="form-control"  id="alu_email" maxlength="40" name="alu_email"  placeholder="Desc. do E-mail"/>
										</div>
									</div>
									<!-- /.form-group -->
								</div>
							</div>
							<!-- /.row --> 
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label>Data de Nascimento:</label>
										<div class="input-group">
											<div class="input-group date" id="calendario" data-target-input="nearest">
												<div class="input-group-append" data-target="#calendario" data-toggle="datetimepicker">
													<div class="input-group-text" ><i class="far fa-calendar-check"></i></div>
												</div>
												<input type="text" class="form-control data_br" name="alu_data_nasc" id="alu_data_nasc" value=""/>																												
											</div>
										</div>
									</div>
								</div>
							</div>	
							
							<!-- /.row --> 
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
							<!-- Mensagem  -->
								<div id="mens"></div>
							<!-- /.Mensagem -->		
						</form>
						<!-- /.form -->
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
					<?=$idade;?>					
						<button type="button" id="btn_CadAluno" class="btn btn-info btn-sm" type="submit"><i class="fas fa-save"></i> Salvar</button>
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
<!--Chama o java script -->
<script src="<?=$hosted;?>/js/action_system.js"></script>
<!-- Validation --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script>
  $(function () {
  

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

     $("#calendario").datetimepicker({
       format: 'DD/MM/YYYY',
       
        pickTime: false,
        pickSeconds: false,
        pick12HourFormat: false  
    })
	$("#calendario1").datetimepicker({
       format: 'DD/MM/YYYY',
       
        pickTime: false,
        pickSeconds: false,
        pick12HourFormat: false  
    })
   

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

</body>
</html>

