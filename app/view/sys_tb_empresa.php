<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="SELECT * FROM sys_empresa";  
$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "	<tr>
				<td> Nenhuma Empresa...</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>	
			</tr>";
	else:
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("emp_id");?></td>
		<td><?=$rs->fld("emp_nome");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("emp_cnpj");?></td> 
		<td>
			<div class="button-group">
				<a 	class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Editar'  	a href="sys_edit_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs->fld('emp_id');?>"><i class="fas fa-edit"></i></a>				
				<a 	class="btn btn-xs btn-info"    data-toggle='tooltip' data-placement='bottom' title='Visualizar' a href="sys_vis_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs->fld("emp_id");?>"><i class="far fa-eye"></i></a>
			</div>
		</td> 
		  
	</tr>	
<?php  
}   
endif;
?>	
 </tbody>
 <tfoot>
    <tr>
	   
	</tr>
 </tfoot>