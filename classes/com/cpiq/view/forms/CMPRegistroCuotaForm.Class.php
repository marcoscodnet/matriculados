<?php

/**
 * Formulario para Registro Cuota
 *
 * @author Marcos
 * @since 04-07-2013
 */
class CMPRegistroCuotaForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_registroCuota") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findRegistro = CPIQComponentsFactory::getFindRegistro(new Registro(), CPIQ_LBL_REGISTRO, CPIQ_MSG_REGISTRO_CUOTA_REGISTRO_REQUIRED, "registroCuota_registro_oid", "registro.oid", "registroCuota_filter_registro_change");
		$fieldset->addField( $findRegistro );
		
		
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_REGISTRO_CUOTA_YEAR, "year", CPIQ_MSG_REGISTRO_CUOTA_YEAR_REQUIRED  ) );
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_REGISTRO_CUOTA_IMPORTE, "importe", CPIQ_MSG_REGISTRO_CUOTA_IMPORTE_REQUIRED  ) );
		
		
		$this->addFieldset($fieldset);
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_registrosCuota';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
