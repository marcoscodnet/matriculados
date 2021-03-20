<?php

/**
 * Formulario para Registro
 *
 * @author Marcos
 * @since 04-07-2013
 */
class CMPRegistroForm extends CMPForm{

	
	
	/**
	 * se construye el formulario para editar una registro
	 */
	public function __construct($action="", $id="edit_registro") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_REGISTRO_NOMBRE, "nombre", CPIQ_MSG_REGISTRO_NOMBRE_REQUIRED  ) );
		
		$fieldSigla = FieldBuilder::buildFieldText ( CPIQ_LBL_REGISTRO_SIGLA, "sigla", CPIQ_MSG_REGISTRO_SIGLA_REQUIRED,"",10  ) ;
		$fieldSigla->getInput()->addProperty("maxlength", 10);
		$fieldset->addField($fieldSigla);
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_registros';");
		$this->setUseAjaxSubmit( true );
		
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		
	}
	
	
}
?>
