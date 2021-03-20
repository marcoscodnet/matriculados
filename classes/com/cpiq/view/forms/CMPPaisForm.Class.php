<?php

/**
 * Formulario para Pais
 *
 * @author Marcos
 * @since 28-05-2013
 */
class CMPPaisForm extends CMPForm{

	/**
	 * se construye el formulario para editar una pais
	 */
	public function __construct($action="", $id="edit_pais") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_PAIS_NOMBRE, "nombre", CPIQ_MSG_PAIS_NOMBRE_REQUIRED  ) );

		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_paises';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
