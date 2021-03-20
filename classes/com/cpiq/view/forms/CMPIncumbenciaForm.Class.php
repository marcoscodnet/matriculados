<?php

/**
 * Formulario para Incumbencia
 *
 * @author Marcos
 * @since 26-09-2013
 */
class CMPIncumbenciaForm extends CMPForm{

	
	
	/**
	 * se construye el formulario para editar una incumbencia
	 */
	public function __construct($action="", $id="edit_incumbencia") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_INCUMBENCIA_NOMBRE, "nombre", CPIQ_MSG_INCUMBENCIA_NOMBRE_REQUIRED  ) );
		
				
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_incumbencias';");
		$this->setUseAjaxSubmit( true );
		
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		
	}
	
	
}
?>
