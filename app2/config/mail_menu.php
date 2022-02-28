<div class="card">
	<div class="card-header">
		<h3 class="card-title">Pastas</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
			</button>
		</div>
	</div>
	
	<div class="card-body p-0">
		<ul class="nav nav-pills flex-column">
			<li class="nav-item active">
				<a href="sys_pg_mailbox.php?token=<?=$_SESSION['token'];?>" class="nav-link">
					<i class="fas fa-inbox"></i> Caixa de entrada					
					<span class="badge bg-primary float-right"></span>					
				</a>
			 </li>
			<li class="nav-item">
				<a href="sys_pg_mail_naolido.php?token=<?=$_SESSION['token'];?>" class="nav-link">
				   <i class="fas fa-envelope"></i> N&atilde;o Lidos
					<?php if($td==1 ): ?>
						<span class="badge bg-primary float-right"><?=$rs->linhas;?></span>
					<?php endif; ?>	
						<span class="badge bg-primary float-right"></span>
				</a>
			</li>
			<li class="nav-item">
				<a href="sys_pg_mail_enviado.php?token=<?=$_SESSION['token'];?>" class="nav-link">
					<i class="fas fa-paper-plane"></i> Enviados
				</a>
			</li>                
		</ul>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->	