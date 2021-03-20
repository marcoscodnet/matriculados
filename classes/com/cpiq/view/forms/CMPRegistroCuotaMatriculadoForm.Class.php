<?php

/**
 * Formulario para Registro Matriculado
 *
 * @author Marcos
 * @since 20-03-2017
 */
class CMPRegistroCuotaMatriculadoForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_registroCuotaMatriculado") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findRegistroCuota = CPIQComponentsFactory::getFindRegistroCuota(new RegistroCuota(), CPIQ_LBL_REGISTRO_CUOTA, CPIQ_MSG_REGISTRO_MATRICULADO_REGISTRO_CUOTA_REQUIRED, "registroCuotaMatriculado_registroCuota_oid", "registroCuota.oid", "registroCuotaMatriculado_filter_registroCuota_change");
		$fieldset->addField( $findRegistroCuota );
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, CPIQ_MSG_REGISTRO_MATRICULADO_MATRICULADO_REQUIRED, "cuotaGenerada_matriculado_oid", "matriculado.oid", "cuotaGenerada_filter_matriculado_change");
		$fieldset->addField( $findMatriculado );
				
		
		$fieldset->addField( FieldBuilder::buildFieldDate ( CPIQ_LBL_REGISTRO_MATRICULADO_FECHA, "fecha", CPIQ_MSG_REGISTRO_MATRICULADO_FECHA_REQUIRED) );
		
		
		$this->addFieldset($fieldset);
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_registrosMatriculado';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
