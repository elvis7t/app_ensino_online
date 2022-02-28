<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclus�o dos principais itens da p�gina */
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
						<h1>Empresa</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Sistema</a></li>
							<li class="breadcrumb-item active">Empresa</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-12">
					 <!-- /.card -->
					<div class="card card-secondary">
						<div class="card-header">
						  <h3 class="card-title">Empresas Cadastradas</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="tabela" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>C&oacute;d:</th>
										<th>Descri&ccedil;&atilde;o</th> 
										<th>Apelido</th> 
										<th>CNPJ</th> 
										<th>A&ccedil;&otilde;es</th>
									</tr>
								</thead>
								<tbody>
									<?php require_once("sys_tb_empresa.php");?>               
							</table>			  
						</div>
						<!-- /.card-body -->
						<div class="card-footer">					
							<a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='bottom' title='Nova Empresa' href="sys_cad_empresa.php?token=<?=$_SESSION['token']?>"><i class="fa fa-plus"></i> Nova</a>
							<a href="javascript:history.go(-1);" class="btn btn-sm btn-secondary"><i class="fas fa-hand-point-left"></i> Voltar</a>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
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
<!-- DataTables -->
<script src="<?=$hosted;?>/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=$hosted;?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/assets/dist/js/adminlte.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#tabela").DataTable({
		"columnDefs": [{
		"defaultContent": "-",
		"targets": "_all"
	}],
	language :{
	    "sEmptyTable": "Nenhum registro encontrado",
	    "sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",  
	    "sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
	    "sInfoPostFix": "",
	    "sInfoThousands": ".",
	    "sLengthMenu": "_MENU_ resultados por p&aacute;gina",
	    "sLoadingRecords": "Carregando...",
	    "sProcessing": "Processando...",
	    "sZeroRecords": "Nenhum registro encontrado",
	    "sSearch": "Pesquisar",
	    "oPaginate": {
	        "sNext": "Pr&oacute;ximo",
	        "sPrevious": "Anterior", 
	        "sFirst": "Primeiro",
	        "sLast": "&Uacute;ltimo"   
	    },
	    "oAria": {
	        "sSortAscending": ": Ordenar colunas de forma ascendente",
	        "sSortDescending": ": Ordenar colunas de forma descendente"
	    }
	}
	});
		});
</script>
</body>
</html>
