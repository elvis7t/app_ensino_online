<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$rs = new recordset();
$fn = new functions(); 
$sql ="SELECT * FROM sys_curso";
		$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr>
			<td> Nenhuma Curso...</td>
			<td></td>
			<td></td>
			<td></td>			
			<td></td>			
		</tr>"; 
	else:

$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("cur_id");?></td>		
		<td><?=$rs->fld("cur_titulo");?></td>		
		<td><?=$fn->data_br($rs->fld("cur_data_ini"));?></td>
		<td><?=$fn->data_br($rs->fld("cur_data_fin"));?></td>		
		<td>
			<div class="button-group">
				<a 	class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Editar'  a href="ap_edit_curso.php?token=<?=$_SESSION['token']?>&acao=N&cursoid=<?=$rs->fld('cur_id');?>"><i class="fas fa-edit"></i></a>								
				<a 	class="btn btn-danger btn-xs"  data-toggle='tooltip' data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("cur_id");?>,"exc_Curso","o item");'><i class="fa fa-trash"></i></a> 
				<a 	class="btn btn-xs btn-info"    data-toggle='tooltip' data-placement='bottom' title='Visualizar' a href="ap_vis_curso.php?token=<?=$_SESSION['token']?>&acao=N&cursoid=<?=$rs->fld('cur_id');?>"><i class="far fa-eye"></i></a>
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