<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");

$fn =  new functions();
$rs = new recordset();

$sql ="SELECT 
			* 
		FROM sys_aluno";
		$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr>
			<td> Nenhuma Aluno...</td>
			<td></td>
			<td></td>
			<td></td>								
			<td></td>			
		</tr>";  
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("alu_id");?></td>
		<td><?=$rs->fld("alu_nome");?></td>
		<td><?=$rs->fld("alu_email");?></td>		
		<?php  if($rs->fld("alu_status")==1):;?>
		<td>Ativo</td>
		<?php else:?>
		<td>Desativado</td>
		<?php endif; ?>	
		<td>
			<div class="button-group">
				<a 	class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Editar' a href="ap_edit_aluno.php?token=<?=$_SESSION['token']?>&acao=N&alunoid=<?=$rs->fld('alu_id');?>"><i class="fas fa-edit"></i></a>								
				<a 	class="btn btn-danger btn-xs"  data-toggle='tooltip' data-placement='bottom' title='Excluir'a href='javascript:del(<?=$rs->fld("alu_cod");?>,"exc_Alu","o item");'><i class="fa fa-trash"></i></a> 
				<a 	class="btn btn-xs btn-info"    data-toggle='tooltip' data-placement='bottom' title='Visualizar' a href="ap_vis_aluno.php?token=<?=$_SESSION['token']?>&acao=N&alunoid=<?=$rs->fld('alu_id');?>"><i class="far fa-eye"></i></a>
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