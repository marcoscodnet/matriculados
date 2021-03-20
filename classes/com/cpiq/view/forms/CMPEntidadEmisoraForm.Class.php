<?php

/**
 * Formulario para EntidadEmisora
 *
 * @author Marcos
 * @since 06-06-2013
 */
class CMPEntidadEmisoraForm extends CMPForm{

	/**
	 * se construye el formulario para editar el tipo de título
	 */
	public function __construct($action="", $id="edit_entidadEmisora") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_ENTIDAD_EMISORA_NOMBRE, "nombre", CPIQ_MSG_ENTIDAD_EMISORA_NOMBRE_REQUIRED  ) );

		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_entidadesEmisora';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
