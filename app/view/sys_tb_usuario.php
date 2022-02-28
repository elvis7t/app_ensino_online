<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql =" SELECT 
			a.usu_cod,
			c.emp_alias,
			d.dp_nome,
			a.usu_nome,
			b.classe_desc
		
		FROM sys_usuario a
			JOIN sys_classe b ON a.usu_classeId = b.classe_id
			JOIN sys_empresa c ON a.usu_empId = c.emp_id
			JOIN sys_departamento d ON a.usu_dpId = d.dp_id
		WHERE usu_ativo = '1'";  
$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "	<tr>
				<td> Nenhuma Usuario...</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>				
			</tr>"; 
	else:
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("usu_cod");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$rs->fld("classe_desc");?></td> 
		<td>
			<div class="button-group">
				<a 	class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Alterar'    a href="sys_edit_usuario.php?token=<?=$_SESSION['token']?>&acao=N&usucod=<?=$rs->fld('usu_cod');?>"><i class="fas fa-user-edit"></i></a>				
				<a 	class="btn btn-danger btn-xs"  data-toggle='tooltip' data-placement='bottom' title='Excluir'    a href='javascript:del(<?=$rs->fld("usu_cod");?>,"exc_Usu","o item");'><i class="fa fa-trash"></i></a> 
				<a 	class="btn btn-xs btn-info"    data-toggle='tooltip' data-placement='bottom' title='Visualizar' a href="sys_vis_usuario.php?token=<?=$_SESSION['token']?>&acao=N&usucod=<?=$rs->fld("usu_cod");?>"><i class="far fa-eye"></i></a>
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