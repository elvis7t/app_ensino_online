<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql =" SELECT 
			a.dp_id,
			b.emp_nome,
			a.dp_nome
		FROM sys_departamento a
			JOIN sys_empresa b ON b.emp_id = a.dp_empId";
		$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "	<tr>
				<td> Nenhuma DP...</td>
				<td></td>
				<td></td>
				<td></td>		
			</tr>"; 
	else:

$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("dp_id");?></td>
		<td><?=$rs->fld("emp_nome");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td>
			<div class="button-group">
				<a 	class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Editar' a href="sys_edit_departamento.php?token=<?=$_SESSION['token']?>&acao=N&dpid=<?=$rs->fld('dp_id');?>"><i class="fas fa-edit"></i></a>				
				<a 	class="btn btn-xs btn-info"    data-toggle='tooltip' data-placement='bottom' title='Visualizar' a href="sys_vis_departamento.php?token=<?=$_SESSION['token']?>&acao=N&dpid=<?=$rs->fld("dp_id");?>"><i class="far fa-eye"></i></a>
			</div>
		</td> 
		  
	</tr>
<?php  
}
endif;
?>	

 