<footer class="main-footer">
    <?php
  $rs = new recordset();
  $sql = "SELECT * FROM sys_empresa
			   WHERE emp_id=" . $_SESSION['usu_empresa'];
  $rs->FreeSql($sql);
  while ($rs->GeraDados()) {
    $empresas  = $rs->fld("emp_nome");
    $site  = $rs->fld("emp_site");
  }
  ?>
    <strong>Licenciado para <a href="<?= $site; ?>"> <?= $empresas; ?></a></strong> <?= date("Y"); ?> Todos os Direitos
    Reservados.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2 | <img src="http://www.niff.com.br/infraprime/dashboard/images/logoCREone.png" width="100" />
    </div>
</footer>
<script src="<?= $hosted; ?>/js/jquery.cookie.js"></script>
<script type="text/javascript">
setInterval(function() {

    $("#chatContent").load(location.href + " #msgs");
    $("#chatContent").scrollTop($("#msgs").height());

    if ($.cookie('msg_lido') == 0) {
        notify($.cookie("mensagem"), $.cookie("pag"), "NOVA MENSAGEM (" + $.cookie("user") + ")");
        $.cookie("msgant");
        $.cookie('msg_lido', 1);
    }

}, 3500);
</script>