<?php

/**
 * Formulario para CambiarEstadoMatriculado
 *
 * @author Marcos
 * @since 25-10-2013
 */
class CMPCambiarEstadoMatriculadoForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_cambiarEstadoMatriculado") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		//$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
			
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_HISTORICO_ESTADO_MATRICULADO, CPIQ_MSG_REGISTRO_MATRICULADO_MATRICULADO_REQUIRED, "cambiarEstadoMatriculado_matriculado_oid", "matriculado.oid", "cambiarEstadoMatriculado_filter_matriculado_change");
		$fieldset->addField( $findMatriculado );
		
		$fieldMatriculadoEstado = FieldBuilder::buildFieldSelect (CPIQ_LBL_HISTORICO_ESTADO_ESTADO, "estadoMatriculado.oid", CPIQUtils::getEstadosMatriculadoItems(), CPIQ_MSG_HISTORICO_ESTADO_CAMBIAR_ESTADO_ESTADO_REQUIRED, null, null, "--seleccionar--" );
		$fieldset->addField( $fieldMatriculadoEstado );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_HISTORICO_ESTADO_MOTIVO, "motivo"  ) );
		
		
		$this->addFieldset($fieldset);
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_historicosEstado';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
