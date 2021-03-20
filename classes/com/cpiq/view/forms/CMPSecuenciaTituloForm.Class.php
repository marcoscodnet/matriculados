<?php

/**
 * Formulario para SecuenciaTitulo
 *
 * @author Marcos
 * @since 10-06-2013
 */
class CMPSecuenciaTituloForm extends CMPForm{

	/**
	 * se construye el formulario para editar el tipo de título
	 */
	public function __construct($action="", $id="edit_secuenciaTitulo") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_SECUENCIA_TITULO_NOMBRE, "nombre", CPIQ_MSG_SECUENCIA_TITULO_NOMBRE_REQUIRED  ) );
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_SECUENCIA_TITULO_ULT_MATRICULA, "ultMatricula", CPIQ_MSG_SECUENCIA_TITULO_ULT_MATRICULA_REQUIRED  ) );

		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_secuenciasTitulo';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
