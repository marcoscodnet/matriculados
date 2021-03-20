function startLoading( id ){
		$( id ).fadeTo("fast", 0.33);

		right = ($(window).width() / 2) - (32);		
		htmlSearching = "<div style='position:absolute; right:" + right + "px;top:0px;'><img src='{WEB_PATH}css/grid/loading.gif' /></div>";
		$( id ).html($( id ).html() + htmlSearching);
	}

function endLoading( id ){
	$( id ).fadeTo("fast", 1);
	
	
	
}

function matriculado_filter_pais_change(attr){
	
	var oid = attr["entity"]["oid"];
	
	findentity_setParent_matriculado_filter_provincia_oid( oid );
}

function matriculado_filter_provincia_change(attr){
	
	
	var oid = attr["entity"]["oid"];
	var pais_oid = attr["entity"]["pais_oid"];
	
	findentity_setParent_matriculado_filter_localidad_oid( oid );
}

function matriculado_filter_localidad_change(attr){
	
}

function localidad_filter_pais_change(attr){
	
	var oid = attr["entity"]["oid"];
	
	findentity_setParent_localidad_filter_provincia_oid( oid );
}

function claseTitulo_change(attr){
	
}

function matriculado_change(attr){
	
}

function secuenciaTitulo_change(attr){
	
}

function titulo_filter_matriculado_change(attr){
	
}

function titulo_filter_tipoTitulo_change(attr){
	
}

function titulo_filter_entidadEmisora_change(attr){
	
}

function tipoTitulo_change(attr){
	
}

function entidadEmisora_change(attr){
	
}

function localidad_change(attr){
	
}

function localidad_pais_change(attr){
	
}

function localidad_provincia_change(attr){
	
}

function registroCuota_filter_registro_change(attr){
	
}

function miSuccess(data){

	try {
		
		 jsondata = $.parseJSON(data);

		 if( jsondata != null && jsondata["error"]!=null){
				showMessageError( jsondata["error"], false );
			}

		 if( jsondata != null && jsondata["info"]!=null){
			 if( jsondata["action"]=='list_cuotasGenerada'){
				 jConfirm(jsondata["cartel"], jsondata["confirmacion"], function(r) {
						if (r) {
							window.location.href = 'doAction?action=add_matriculado_add_titulo_init&matriculado_oid='+jsondata["matriculado_oid"];
						} else {
							window.location.href = 'doAction?action='+jsondata["action"]+'&id='+jsondata["matriculado_oid"];
						}
						return true;
					});
			 }
			 else
				 window.location.href = 'doAction?action='+jsondata["action"]+'&matriculado_oid='+jsondata["oid"];
				
			}
					
	} catch (e) {
	   return;
	}
	  
}

function mostrarPDFCuotaPaga(selected){
	  
	  var ventanaNueva = window.open('doAction?action=pagar_cuotaGenerada&id='+selected);
	  ventanaNueva.focus();
	  window.location.href = 'doAction?action=list_matriculados';
}

function registroMatriculado_filter_registroCuota_change(attr){
	
}

function cuotaGenerada_filter_matriculado_change(attr){
	
}

function incumbenciaTipoTitulo_filter_tipoTitulo_change(attr){
	
}

function  incumbenciaTipoTitulo_filter_incumbencia_change(attr){
	
}

function  incumbenciaTipoEncomienda_filter_incumbencia_change(attr){
	
}

function  incumbenciaTipoEncomienda_filter_tipoEncomienda_change(attr){
	
}


function editEncomienda_tipoEncomiendaCallback(attr){
	
	var cd_tipo_encomienda = attr["entity"]["oid"];
	
	jQuery.ajax({
	      url:"doAction?action=add_encomienda_chequear&cd_tipo_encomienda=" + cd_tipo_encomienda,
	      dataType:"json",
	      success: function(data){
	      	
	      	if( data != null && data["error"]!=null){
	      		showMessageError( data["error"], true );
	      		//inhabilitar el submit.
	      		$("#edit_encomienda_input_submit_ajax").hide();
	      	}
	      	
	      	if( data != null && data["valido"] ){
	      		//habilitar el submit.
	      		$("#edit_encomienda_input_submit_ajax").show();
	      	}else{
	      		var mensajes = "";
	      		//mostramos los mensajes de error.
	      		for ( var indice = 0; indice < data["mensajes"].length; indice++) {
	      			mensajes = mensajes+data["mensajes"][indice] + " <br />";
				}
	      		showMessageError( mensajes, true );
	      		//inhabilitar el submit.
	      		$("#edit_encomienda_input_submit_ajax").hide();
	      	} 	
	      }
	});
		
}
function  cambiarEstadoEncomienda_filter_encomienda_change(attr){
	
}

function  pagarEncomienda_filter_encomienda_change(attr){
	
}	



function  seleccionarTipoComitente(tipoComitente_oid){
	
	
	 $("#item-div-tipoComitente").append("<span id='iconoLoading' style='position:absolute;'><img src='css/grid/loading.gif' /></span>")
	 
	jQuery.ajax({
	      url:"doAction?action=add_encomienda_chequear_tipo_comitente&tipoComitente_oid=" + tipoComitente_oid.value,
	      dataType:"json",
	      success: function(data){
	      	
	      	if( data != null && data["error"]!=null){
	      		showMessageError( data["error"], true );
	      		//inhabilitar el submit.
	      		$("#edit_encomienda_input_submit_ajax").hide();
	      	}
	      	
	      	else{
	      		
	      		//ocultamos los div.
	      		for ( var indice = 0; indice < data["hide"].length; indice++) {
	      			//mensajes = mensajes+data["mensajes"][indice] + " <br />";
	      			$("#item-div-"+data["hide"][indice]).hide();
				}
	      		for ( var indice = 0; indice < data["show"].length; indice++) {
	      			//mensajes = mensajes+data["mensajes"][indice] + " <br />";
	      			$("#item-div-"+data["show"][indice]).show();
				}
	      		
	      	} 	
	      	 $("#iconoLoading").remove();
	      }
	});
	
	
	
}

function  seleccionarTipoPago(tipoPago_oid){
	 $("#item-div-tipoPago").append("<span id='iconoLoading' style='position:absolute;'><img src='css/grid/loading.gif' /></span>")
	
	jQuery.ajax({
	      url:"doAction?action=pagarEncomienda_chequear_tipo_pago&tipoPago_oid=" + tipoPago_oid.value,
	      dataType:"json",
	      success: function(data){
	      	
	      	if( data != null && data["error"]!=null){
	      		showMessageError( data["error"], true );
	      		//inhabilitar el submit.
	      		$("#edit_encomienda_input_submit_ajax").hide();
	      	}
	      	
	      	else{
	      		
	      		//ocultamos los div.
	      		for ( var indice = 0; indice < data["hide"].length; indice++) {
	      			//mensajes = mensajes+data["mensajes"][indice] + " <br />";
	      			$("#item-div-"+data["hide"][indice]).hide();
				}
	      		for ( var indice = 0; indice < data["show"].length; indice++) {
	      			//mensajes = mensajes+data["mensajes"][indice] + " <br />";
	      			$("#item-div-"+data["show"][indice]).show();
				}
	      		
	      	} 	
	      	$("#iconoLoading").remove();
	      }
	});
	
	
	
}

function  cambiarEstadoMatriculado_filter_matriculado_change(attr){
	
}


