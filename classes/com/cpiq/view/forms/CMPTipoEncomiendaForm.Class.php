<?php

/**
 * Formulario para TipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 */
class CMPTipoEncomiendaForm extends CMPForm{

	
	
	/**
	 * se construye el formulario para editar una tipoEncomienda
	 */
	public function __construct($action="", $id="edit_tipoEncomienda") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_TIPO_ENCOMIENDA_NOMBRE, "nombre", CPIQ_MSG_TIPO_ENCOMIENDA_NOMBRE_REQUIRED  ) );
		
				
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_tiposEncomienda';");
		$this->setUseAjaxSubmit( true );
		
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		
	}
	
	
}
?>
