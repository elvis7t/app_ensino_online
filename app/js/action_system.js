$(document).ready(function(){	
//-------------------------------------------------------------------------------------------------------------------------
/////////FUNÇÔES DO SISTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

//-------------------------------------------------------------------------------------------------------
//EMPRESA /////////////////////////////////////////////////////////////////////////////////////////////||
//=======================================================================================================

	/*---------------|FUNCAO PARA CADASTRAR A EMPRESA|--------------\
	|																|
	\--------------------------------------------------------------*/

	$(document.body).on("click","#btn_CadEmp", function(){		
	var container = $("#formerros"); 
	$("#FormCadEmp").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			emp_nome    : {required: true, minlength: 5},	
			emp_alias   : {required: true, minlength: 2},	
			emp_cnpj    : {required: true, minlength: 12},				
			cep         : {required: true, minlength: 8},	
			num         : {required: true},	
			emp_contato : {required: true, minlength: 5},
			emp_email   : {required: true, email:true},		
			emp_tel     : {required: true, minlength: 12}	
		},
		messages:{
			emp_nome    : {required:"Informe o nome da Empresa", minlength: "M&iacute;nimo de 5 caracteres."},
			emp_alias   : {required:"Informe o apelido da Empresa", minlength: "M&iacute;nimo de 2 caracteres."},
			emp_cnpj    : {required:"Informe o CNPJ da Empresa", minlength: "M&iacute;nimo de 12 caracteres."},			
			cep         : {required:"Informe Um CEP", minlength: "M&iacute;nimo de 8 caracteres."},
			num         : {required:"Informe Um N&uacute;mero"},
			emp_contato : {required:"Informe Um nome valido", minlength: "M&iacute;nimo de 5 caracteres."},
			emp_email	: {required:"Informe um e-mail valido", email:"Email Invalido"},
			emp_tel     : {required:"Informe o Telefone", minlength: "M&iacute;nimo de 12 caracteres."}
			
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});
	//fim do validate
	if($("#FormCadEmp").valid()==true){		
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{ 
			acao:			"Cadastra_Empresa",
			emp_nome:		$("#emp_nome").val(), 
			emp_alias:		$("#emp_alias").val(), 
			emp_cnpj:		$("#emp_cnpj").val(),
			emp_ie:     	$("#emp_ie").val(), 
			cep:    	    $("#cep").val(),
			log:    	    $("#log").val(),
			num:    	    $("#num").val(),
			compl:    	    $("#compl").val(),
			bai:    	    $("#bai").val(),
			cid:    	    $("#cid").val(),
			uf:    	        $("#uf").val(),						
			emp_contato:	$("#emp_contato").val(), 
			emp_email:		$("#emp_email").val(), 
			emp_tel:		$("#emp_tel").val(),
			emp_site:		$("#emp_site").val()
		
			},function(data){
				if (data.status == "OK") {					
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormCadEmp")[0].reset(); 
					console.log(data.query);
					// $("#Emp_cad").load("../view/sys_tbEmpresas.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-warning"></i> CNPJ j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadEmp").html("<i class='fas fa-plus'></i> Nova");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO |-------------------------------*/		


    /*-----------------|FUNCAO PARA EDITAR A EMPRESA|---------------\
	|																|
	\--------------------------------------------------------------*/ 
			
	$(document.body).on("click","#btn_EditEmp",function(){	
		//Esse This faz o btn ficar processando
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val();
		cod = $("#emp_id").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Empresa",
			emp_id: cod,
			emp_nome: 		$("#emp_nome").val(),
			emp_alias:		$("#emp_alias").val(),
			emp_cnpj: 		$("#emp_cnpj").val(),
			emp_ie:     	$("#emp_ie").val(), 
			cep:    	    $("#cep").val(),
			log:    	    $("#log").val(),
			num:    	    $("#num").val(),
			compl:    	    $("#compl").val(),
			bai:    	    $("#bai").val(),
			cid:    	    $("#cid").val(),
			uf:    	        $("#uf").val(),						
			emp_contato:	$("#emp_contato").val(), 
			emp_email:		$("#emp_email").val(), 
			emp_tel:		$("#emp_tel").val(),
			emp_site:		$("#emp_site").val()
		},
		function(data){
			if(data.status=="OK"){				
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				$("#FormEditEmp")[0].reset(); 
				console.log(data.query);
				//$("#confirma").modal("hide");
				// $("#aguarde").modal("show");					
				//location.reload();
				// $(location).attr('href','sys_edit_empresa.php?token='+token+'&acao=N&empid='+cod);   
			} 
			else{
				alert(data.mensagem);	 
			}
			$("#btn_EditEmp").html("<i class='fas fa-sync-alt'></i> Alterado");				
		},
		"json"
		);		
	});
/*---------------|FIM DE EDITAR |--------------------------------*/	

//|----------------------------------------------------------------\
///////////////// FIM EMPRESA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                       
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//DEPARTAMENTO //////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================

	/*--------|FUNCAO PARA CADASTRO DE DEPARTAMENTO|----------------\
	|																|	
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadDp", function(){		
	var container = $("#formerros"); 
	$("#FormCadDp").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			sel_emp: {required: true }, 
			dp_nome : {required: true, minlength: 2}	 
		}, 
		messages:{
			sel_emp:  {required:"Selecione uma empresa para esse departamento"},
			dp_nome : {required:"Informe o nome do Departamento", minlength: "M&iacute;nimo de 2 caracteres."}
		},
			errorElement: 'span',
			errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
			}
	});
	//fim do validate
	if($("#FormCadDp").valid()==true){ 		
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{
			acao:			"Cadastrar_Departamento",
			sel_emp:	    $("#sel_emp").val(),
			dp_nome:		$("#dp_nome").val() 
		
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormCadDp")[0].reset();
					console.log(data.query);
					// $("#Dp_cad").load("sys_tbDepartamentos.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-warning"></i> Departamento j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadDp").html("<i class='fas fa-plus'></i> Novo");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO |-------------------------------*/

    /*------------|FUNCAO PARA EDITAR O DEPARTAMENTO|---------------\
	|																|
	\--------------------------------------------------------------*/  
			
	$(document.body).on("click","#btn_Editdp",function(){
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val();
		cod = $("#dp_id").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Departamento",
			dp_id: cod,
			dp_nome: $("#dp_nome").val()
		},
		function(data){
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				$("#FormEditdp")[0].reset(); 
				console.log(data.query);
				// $("#confirma").modal("hide");
				// $("#aguarde").modal("show");
				//location.reload(); 
			} 
			else{
				alert(data.mensagem);	
			}
			$("#btn_Editdp").html("<i class='fas fa-sync-alt'></i> Alterado");				
		},
		"json");
	});
/*---------------|FIM DE EDITAR |----------------------------------*/

    /*-------|FUNCAO PARA SELECIONAR O DP REF A EMPRESA|-----------*\
	|																|
	\--------------------------------------------------------------*/ 
	
	$("#sel_emp").on("change", function(){
		$("#aguarde").modal("hide");
		
		$.post("../controller/sys_record_data.php",
		{
			acao: "populaCheckDp",  
			fami: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_dp").html(data);
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheck" |------------------*/
  
//|----------------------------------------------------------------\
///////////////// FIM DEPARTAMENTO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                      
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//USUARIO ///////////////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================
	
	/*---------------|CADASTRAR USUARIO|-----------------------*\
	| 															|	
	\*---------------------------------------------------------*/
	
	$("#btn_CadUsu").on("click",function(){		
		var container = $("#formerros");
		$("#FormCadUsu").validate({
			debug: true, 
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			rules: {
				usu_nome	: {required: true, minlength: 9},
				usu_email	: {required: true, email:true},
				usu_senha	: {required: true, minlength: 6 },
				usu_csenha	: {required: true, equalTo:"#usu_senha"},
				sel_emp  	: {required: true},                
				sel_dp	    : {required: true}, 
				usu_sexo	: {required: true}, 
				usu_pmail	: {required: true}, 
				usu_pchat	: {required: true}, 
				sel_class	: {required: true} 
			},
			messages: {
				usu_nome	: {required: "Digite o Nome Completo do usuario" , minlength: "Mome e sobrenome."},
				usu_email	: {required: "Informe um e-mail valido", email:"Email Invalido"},
				usu_senha	: {required: "Digite uma senha valida (Minimo 6 caracteres )", minlength: "M&iacute;nimo de 6 caracteres."},
				usu_csenha	: {required: "Digite a senha novamente (Confirme a senha)",equalTo:"As senhas não coincidem"},
				sel_emp  	: {required: "Selecione uma Empresa "},
				sel_dp	    : {required: "Selecione um Departamento"},
				usu_sexo	: {required: "Selecione o sexo"},
				usu_pmail	: {required: "Permissão de e-mail"},
				usu_pchat	: {required: "Permissão de Chat"},
				sel_class	: {required: "Selecione uma classe (Selecione uma Classe)"}
			},
			errorElement: 'span',
			errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
		});
		//fim do validate		
		if($("#FormCadUsu").valid()==true){
			$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_record_data.php",
				{
				acao:			"Cadastra_Usuario",
				usu_nome:		$("#usu_nome").val(), 
				usu_email:		$("#usu_email").val(),
				usu_senha:		$("#usu_senha").val(),
				sel_emp:		$("#sel_emp").val(),				
				sel_dp:		    $("#sel_dp").val(),
				sel_class:		$("#sel_class").val(),				
				usu_chapa: 	    $("#usu_chapa").val(),
				usu_ramal:  	$("#usu_ramal").val(),
				usu_cel:    	$("#usu_cel").val(),				
				usu_pmail: 	    $("input[name=usu_pmail]:checked").val(), 
				usu_pchat: 	    $("input[name=usu_pchat]:checked").val(), 
				usu_pcalend:    $("input[name=usu_pcalend]:checked").val(), 
				usu_prel:   	$("input[name=usu_prel]:checked").val(), 
				usu_sexo: 	    $("input[name=usu_sexo]:checked").val() 

				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						 $("#FormCadUsu")[0].reset();// apaga os campos
						// console.log(data.query);
						// $("#usu_cad").load("sys_tbUsuarios.php");// atualiza a pagina com o campo inserido					
					}
					else {
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-exclamation-triangle""></i> Usu&aacute;rio cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_CadUsu").html("<i class='fas fa-plus'></i> Novo");
				}, "json");
		}
	});
/*---------------|FIM CADASTRO |-----------------------------------*/	

	/*-----------|FUNCAO PARA EDITAR USUARIO ATIVO|-----------------\
	|																|
	\--------------------------------------------------------------*/ 
		 	
	$(document.body).on("click","#btn_Edit_Usuario",function(){   
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		console.log("CLICK OK");
		var token = $("#token").val(); 
		var lista = $("#lista").val();
		cod = $("#usu_cod").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Usuario",
			usu_cod: cod,
			usucod:			$("#usu_cod").val(),        
			usu_nome:		$("#usu_nome").val(),
			usu_email:  	$("#usu_email").val(),
			sel_emp:    	$("#sel_emp").val(),        
			sel_dp:  		$("#sel_dp").val(),        
			sel_class:  	$("#sel_class").val(),			
			usu_ramal:  	$("#usu_ramal").val(),
			usu_cel:    	$("#usu_cel").val(),			
			usu_chapa: 		$("#usu_chapa").val(),			
			usu_senha:  	$("#usu_senha").val(),
			usu_ativo: 		($("#usu_ativo").prop("checked") == false?0:1), 
			usu_pmail:  	($("#usu_pmail").prop("checked") == false?0:1), 
			usu_pchat:  	($("#usu_pchat").prop("checked") == false?0:1), 	
			usu_pcalend:	($("#usu_pcalend").prop("checked") == false?0:1), 	
			usu_prelatorio:	($("#usu_prelatorio").prop("checked") == false?0:1), 	
			usu_sexo: 		$("input[name=usu_sexo]:checked").val()   
			  
		},
		function(data){ 
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensperfil");
				$("#FormEditUsuario")[0].reset(); 
				console.log(data.query);
			} 
			else{
				alert(data.mensagem);	 
			}
			$("#btn_Edit_Usuario").html("<i class='fas fa-sync-alt'></i> Alterado");				
		},
		"json");
	});
/*---------------|FIM DO EDITAR -----------------------------------*/	

	/*---------------|EDITAR DE SENHAS DOS USUÁRIOS |--------------*\
	| 										                         |
	\*-------------------------------------------------------------*/
	$("#bt_edit_senha").on("click", function(){
		var container = $("#formerros");	
		$("#FormEditSenha").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			rules: {			  
				sen_nova	: {required:true, minlength: 6 },
				rsen_nova	: {equalTo:"#sen_nova"}
			},
			messages: {				
				sen_nova  : {required: "Digite uma senha valida (Minimo 6 caracteres )", minlength: "M&iacute;nimo de 6 caracteres."},
				rsen_nova : {required: "Digite a senha novamente (Confirme a senha)", equalTo:"As senhas não coincidem"}
			},
			errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
		});
		
		if($("#FormEditSenha").valid()==true){
			$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			cod = $("#usu_cod").val();
			$.post("../controller/sys_record_data.php",{
				acao	: "Edita_Senha",
				usu_cod: cod,			
				usucod  : $("#usu_cod").val(),			
				nsenha	: $("#sen_nova").val() 
				},
				function(data){
					if(data.status=="OK"){
						//altera o status tal qual url
						$("#bt_edit_senha").html("<i class='fas fa-save'></i> Salva");
						$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fa fa-check"></i> Senha alterada - ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						console.log(data.query);						
					} 
					else{
						alert(data.mensagem);
					}
				},
				"json"
			);
		}
	});
/*---------------|FIM EDITAR|------------------------------------*\


//|----------------------------------------------------------------\
///////////////// FIM USUARIO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                    
//|----------------------------------------------------------------/


//-------------------------------------------------------------------------------------------------------
//PERFIL DE USUARIO//////////////////////////////////////////////////////////////////////////////////////
//=======================================================================================================

	/*------------------|EDITAR DO PERFIL|-------------------------*\
	| 																|
	\*-------------------------------------------------------------*/

	$("#btn_EditPerfil").on("click", function(){
		$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",{
			acao		: "Edita_Perfil",				
			usu_cod:    $("#usu_cod").val(),
			usu_nome:	$("#usu_nome").val(),
			usu_ramal:  $("#usu_ramal").val(),
			usu_cel:    $("#usu_cel").val(),			
			usu_chapa: 	$("#usu_chapa").val(),			
			cor: 	    $("#sel_cor_dashboard").val(),			
			corpag:	    $("#sel_cor_pag").val(),			
			cormenu:    $("#sel_cor_menu").val()			
			},
			function(data){
				if(data.status=="OK"){					
					$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> Alterado OK - ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensperfil");	
					$("#FormEditPerfil")[0].reset(); 
					console.log(data.query);
				} 
				else{
					$("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fa fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mensperfil");	
				}				
				$("#btn_EditPerfil").html("<i class='fas fa-sync-alt'></i> Alterado");				
			},
			"json"
		);
	});
/*---------------|FIM ALTERAÇÃO DE PERFIL|------------------------*\
		
	/*---------------|EDITAR DE SENHAS DOS USUÁRIOS DO PERFIL|-----*\
	| 																|
	\*-------------------------------------------------------------*/
	$("#bt_edit_senha_perfil").on("click", function(){		
		var container = $("#formerros");
		$("#FormSenhaPerfil").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			rules: {			  
				sen_nova	: {required:true, minlength: 6 },
				rsen_nova	: {equalTo:"#sen_nova"}
			},
			messages: {				
				sen_nova : {required: "Digite uma senha valida (Minimo 6 caracteres )", minlength: "M&iacute;nimo de 6 caracteres."},
				rsen_nova	: {required: "Digite a senha novamente (Confirme a senha)", equalTo:"As senhas não coincidem"}
			}
		});		
		if($("#FormSenhaPerfil").valid()==true){
			$(this).html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_record_data.php",{
				acao	: "Altera_Senha",					
				nsenha	: $("#sen_nova").val() 
				},
				function(data){
					if(data.status=="OK"){
						//altera o status tal qual url
						$("#bt_edit_senha_perfil").html("<i class='fas fa-save'></i> Salvada");
						$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						console.log(data.query);
					} 
					else{
						alert(data.mensagem);
					}
					
				},
				"json"
			);
		}
	});
/*---------------|FIM EDITAR|------------------------------------*\

//|----------------------------------------------------------------\
///////////////// FIM PERFIL USUARIO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\|                                  
//|----------------------------------------------------------------/


//---------------------------------------------------------------------------------------------------------------------------------
/////////FIM DAS FUNÇÔES DO SYSTEMA /////////////////////////////////////////////////////////////////////////////////////////////||
//=================================================================================================================================


//-------------------------------------------------------------------------------------------------------------------------
///////// FUNÇÔES  //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

//-------------------------------------------------------------------------------------------------------------------------
///////// FUNÇÔES DO CURSO  //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================

//------------------------------------------------------------------------------------------------------------
//CURSO//////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*--------|FUNCAO PARA CADASTRO DE CURSO|-----------------------\
	|												   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadCurso", function(){
	var container = $("#formerros"); 
	$("#FormCadCurso").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			cur_titulo   : {required: true, minlength: 3, maxlength: 20},	 
			cur_data_ini : {required: true},	 
			cur_data_fin : {required: true}	 
		}, 
		messages:{		
			cur_titulo   : {required:"Informe o Titulo ", minlength: "M&iacute;nimo de 2 caracteres."},
			cur_data_ini : {required:"Informe a Data de Inicio "},
			cur_data_fin : {required:"Informe a Data de termino "}
		},
			errorElement: 'span',
			errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
			}
	});
	//fim do validate
	if($("#FormCadCurso").valid()==true){ 
		$("#btn_CadCurso").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{
			acao:			"Cadastrar_Curso",
			cur_titulo:		$("#cur_titulo").val(), 
			cur_desc:		$("#cur_desc").val(), 
			cur_data_ini:	$("#cur_data_ini").val(), 
			cur_data_fin:	$("#cur_data_fin").val()
		
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormCadCurso")[0].reset();
					console.log(data.query);					
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-exclamation-triangle""></i> Tipo de equipamento j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadCurso").html("<i class='fas fa-plus'></i> Novo");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO DE CURSO |------------------*/

	/*------------|FUNCAO PARA EDITAR CURSO|------------------------\
	|										   						|
	\--------------------------------------------------------------*/  
			
	$(document.body).on("click","#btn_Edit_Curso",function(){   
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val();
		cod = $("#cur_id").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Curso",
			cur_id: cod,
			cur_titulo: $("#cur_titulo").val(),
			cur_desc: $("#cur_desc").val(),
			cur_data_ini: $("#cur_data_ini").val(),
			cur_data_fin: $("#cur_data_fin").val()
		},
		function(data){
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				$("#FormEditaCurso")[0].reset(); 
				console.log(data.query);
				// $("#confirma").modal("hide");
				// $("#aguarde").modal("show");
				//location.reload(); 
			} 
			else{
				alert(data.mensagem);	
			}
			$("#btn_Edit_Curso").html("<i class='fas fa-sync-alt'></i> Alterado");				
		},
		"json");
	});
/*---------------|FIM DE EDITAR CURSO|------------------*/


//|----------------------------------------------------------------\
/////////////////////////// FIM CURSO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/


//------------------------------------------------------------------------------------------------------------
//ALUNO//////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================

	/*---------------|FUNCAO PARA CADASTRO DE ALUNO|----------------\
	|												   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadAluno", function(){
	var container = $("#formerros"); 
	$("#FormCadAluno").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			alu_nome : {required: true, minlength: 5}, 
			alu_email: {required: true, email:true},
			alu_data_nasc: {required: true}
		}, 
		messages:{
			alu_nome  : {required:"Informe o nome do Aluno", minlength: "M&iacute;nimo de 5 caracteres."},
			alu_email : {required:"Informe um e-mail valido", email:"Email Invalido"},
			alu_data_nasc : {required:"Informe a data de nascimento"}
		},
			errorElement: 'span',
			errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
			},
			highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
			},
			unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
			}
	});
	//fim do validate
	if($("#FormCadAluno").valid()==true){ 
		$("#btn_CadAluno").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_record_data.php",
			{
			acao:			"Cadastrar_Aluno",
			alu_nome:		$("#alu_nome").val(),
			alu_email:		$("#alu_email").val(), 
			alu_data_nasc:	$("#alu_data_nasc").val() 
		
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormCadAluno")[0].reset();
					console.log(data.query);
					// $("#Dp_cad").load("sys_tbDepartamentos.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-warning"></i> Aluno menor de 16 anos <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_CadAluno").html("<i class='fas fa-plus'></i> Nova");
			}, "json");
		}
	});
/*-----------------------|FIM DO CADASTRO DE ALUNO |------------------*/

    /*-------------|FUNCAO PARA EDITAR ALUNO|----------------------\
	|	 											   				|
	\--------------------------------------------------------------*/  
			
	$(document.body).on("click","#btn_EditAluno",function(){   
		console.log("CLICK OK");
		var token = $("#token").val();
		var lista = $("#lista").val();
		cod = $("#alu_id").val();
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Edita_Aluno",
			alu_id: cod,
			alu_nome: $("#alu_nome").val(),
			alu_email: $("#alu_email").val(),
			alu_data_nasc: $("#alu_data_nasc").val(),
			alu_status:	($("#alu_status").prop("checked") == false?0:1)
		},
		function(data){
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				$("#FormEditAluno")[0].reset(); 
				console.log(data.query);
				// $("#confirma").modal("hide");
				// $("#aguarde").modal("show");
				//location.reload(); 
			} 
			else{
				alert(data.mensagem);	
			}
			$("#btn_EditAluno").html("<i class='fas fa-sync-alt'></i> Alterado");
		},
		"json");
	});
/*---------------|FIM DE EDITAR Aluno|------------------*/

//|----------------------------------------------------------------\
///////////////////// FIM DE ALUNO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|----------------------------------------------------------------/	

//------------------------------------------------------------------------------------------------------------
//MATRICULA//////////////////////////////////////////////////////////////////////////////////////////////////
//============================================================================================================
 
	/*---------|FUNCAO PARA CADASTRO DE MATRICULAS|---------------\
	|												   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_CadMatricula", function(){
        var container = $("#formerros"); 
		$("#FormCadMatricula").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				sel_curso  : {required: true},
                sel_aluno : {required: true}
                
			}, 
			messages:{
				sel_curso   : {required: "Selecione uma Curso"}, 
                sel_aluno   : {required: "Selecione um Aluno"}
            				
			},
	            errorElement: 'span',
				errorPlacement: function (error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
				},
				highlight: function (element, errorClass, validClass) {
				$(element).addClass('is-invalid');
				},
				unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
				}
			});
		if($("#FormCadMatricula").valid()==true){ 
			$("#btn_CadMatricula").html("<i class='fas fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_record_data.php",
				{  
				acao:			"Cadastrar_Matricula",  
				sel_curso:		$("#sel_curso").val(), 
			    sel_aluno:	   	$("#sel_aluno").val()
							 
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#FormCadMatricula")[0].reset();
						console.log(data.query);
						// $("#eq_cad").load("at_tbEquipamentos.php");// atualiza a pagina com o campo inserido 
		 			}
					else { 
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fas fa-exclamation-triangle""></i> Esse curso já esta com 10 alunos <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_CadMatricula").html("<i class='fas fa-plus'></i> Novo");
				}, "json");
			}
	}); 
/*---------------|FIM DO CADASTRO DE MATRICULAS |------------------*/	

    /*---------------|ALTERAR  EQUIPAMENTOS|-----------------------*\
	|	                     						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_EditMatricula", function(){        
		console.log("CLICK OK");
		var token = $("#token").val(); 
		var lista = $("#lista").val();
		cod = $("#mat_id").val(); 
		
		$.post("../controller/sys_record_data.php",{ 
			acao: "Editar_Matricula", 
			mat_id: cod,
			sel_curso:		$("#sel_curso").val(), 
			sel_aluno:	   	$("#sel_aluno").val()
			
		},
		function(data){
				if(data.status=="OK"){
					$("#btn_EditMatricula").html("<i class='fas fa-sync-alt'></i> Alterado");		
					$("<div></div>").addClass("alert alert-info alert-dismissable").html('<i class="fas fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#FormEditMatricula")[0].reset(); 
					console.log(data.query);
					// $("#confirma").modal("hide");
					// $("#aguarde").modal("show");
					//location.reload(); 
				} 
				else{
					alert(data.mensagem);	
				}
			},	"json");
			
	}); 
/*---------------|FIM DE ALTERAR MATRICULA|------------------*/	



//-------------------------------------------------------------------------------------------------------------------------
///////// FIM FUNÇÔES DE ENSINO //////////////////////////////////////////////////////////////////////////////////////////////////////||
//=========================================================================================================================


//---------------------------------------------------------------------------------------------------------------------------------
/////////FIN DAS FUNÇÔES  /////////////////////////////////////////////////////////////////////////////////////////////||
//=================================================================================================================================
});	