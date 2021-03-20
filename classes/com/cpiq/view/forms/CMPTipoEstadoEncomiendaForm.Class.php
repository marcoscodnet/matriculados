<?php

/**
 * Formulario para TipoEstadoEncomienda
 *
 * @author marcos
 * @since 03-10-2013
 */
class CMPTipoEstadoEncomiendaForm extends CMPForm{

	/**
	 * se construye el formulario para editar el tipo de título
	 */
	public function __construct($action="", $id="edit_tipoEstadoEncomienda") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA_NOMBRE, "nombre", CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_NOMBRE_REQUIRED  ) );

		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_tiposEstadoEncomienda';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
