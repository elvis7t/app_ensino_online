<?php
require_once("../../model/recordset.php");
error_reporting(E_ALL & E_NOTICE & E_WARNING);
session_start();
extract($_GET);
?>

<body onload="window.print();">  
		<div class="wrapper">
			<!-- Main content -->
			<section class="invoice">
				<!-- title row -->  
				<div class="row">
				  <div class="col-xs-12">
					
					<img src="<?=$eqid;?>eq.png" />
					
				  </div><!-- /.col -->   
				</div>   
				 
				<div class="row">
				  <div class="col-xs-12">
					
					<img src="<?=$eqid;?>eq.png" />
					
				  </div><!-- /.col -->
				</div>   
				
			</section><!-- /.content -->
		</div><!-- ./wrapper -->

		<!-- AdminLTE App -->
		<script src="<?=$hosted;?>/assets/dist/js/app.min.js"></script>
	</body>
	
</html>  