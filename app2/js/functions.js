function del(codigo, classe, msg){
	$("<span></span>").remove();
    $("<span></span>").html("Deseja excluir "+msg+" "+codigo+"?").appendTo("#msg_conf");
	$("#confSim").attr("data-reg", codigo);
	$("#confSim").addClass(classe);
	$("#confirma").modal("show");
}