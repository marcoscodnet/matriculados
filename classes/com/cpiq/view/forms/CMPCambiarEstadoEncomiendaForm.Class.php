<?php

/**
 * Formulario para CambiarEstadoEncomienda
 *
 * @author Marcos
 * @since 11-10-2013
 */
class CMPCambiarEstadoEncomiendaForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_cambiarEstadoEncomienda") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		//$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
			
		$findEncomienda = CPIQComponentsFactory::getFindEncomienda(new Encomienda(), CPIQ_LBL_ENCOMIENDA, CPIQ_MSG_ENCOMIENDA_OBSERVACION_ENCOMIENDA_REQUIRED, "cambiarEstadoEncomienda_encomienda_oid", "encomienda.oid", "cambiarEstadoEncomienda_filter_encomienda_change");
		$fieldset->addField( $findEncomienda );
		
		$fieldEncomiendaEstado = FieldBuilder::buildFieldSelect (CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA, "tipoEstadoEncomienda.oid", CPIQUtils::getTiposEstadoEncomiendaItems(), CPIQ_MSG_CAMBIAR_ESTADO_ENCOMIENDA_ESTADO_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldEncomiendaEstado );
		$this->addFieldset($fieldset);
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_encomiendas';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
