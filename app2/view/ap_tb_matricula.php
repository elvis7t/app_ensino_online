<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql = " SELECT 
			*
		FROM sys_matricula a
			JOIN sys_curso b ON a.mat_curId = b.cur_id
			JOIN sys_aluno c ON a.mat_aluId = c.alu_id
			JOIN sys_usuario d ON a.mat_usuId = d.usu_cod
		
		";
$rs->FreeSql($sql);
if ($rs->linhas == 0) :
	echo "<tr>
			<td> Nenhuma Matricula...</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>		
			<td></td>		
		</tr>";
else :
	while ($rs->GeraDados()) { ?>
		<tr>
			<td><?= $rs->fld("mat_id"); ?></td>
			<td><?= $rs->fld("cur_titulo"); ?></td>
			<td><?= $rs->fld("alu_nome"); ?></td>
			<td><?= $fn->data_br($rs->fld("cur_data_ini")); ?></td>
			<td><?= $fn->data_br($rs->fld("cur_data_fin")); ?></td>
			<td><?= $fn->data_hbr($rs->fld("mat_data")); ?></td>
			<td><?= $rs->fld("usu_nome"); ?></td>
			<td>
				<div class="button-group">
					<a class="btn btn-primary btn-xs" data-toggle='tooltip' data-placement='bottom' title='Editar' a href="ap_edit_matricula.php?token=<?= $_SESSION['token'] ?>&acao=N&matid=<?= $rs->fld('mat_id'); ?>"><i class="fas fa-edit"></i></a>					
				</div>
			</td>

		</tr>
<?php }
endif;
?>