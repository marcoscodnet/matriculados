<?php

/**
 * Formulario para Registro Matriculado
 *
 * @author Marcos
 * @since 19-09-2013
 */
class CMPRegistroMatriculadoForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_registroMatriculado") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findRegistro = CPIQComponentsFactory::getFindRegistro(new Registro(), CPIQ_LBL_REGISTRO, CPIQ_MSG_REGISTRO_MATRICULADO_REGISTRO_REQUIRED, "registroMatriculado_registro_oid", "registro.oid", "registroMatriculado_filter_registro_change");
		$fieldset->addField( $findRegistro );
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, CPIQ_MSG_REGISTRO_MATRICULADO_MATRICULADO_REQUIRED, "cuotaGenerada_matriculado_oid", "matriculado.oid", "cuotaGenerada_filter_matriculado_change");
		$fieldset->addField( $findMatriculado );
				
		
		$fieldset->addField( FieldBuilder::buildFieldDate ( CPIQ_LBL_REGISTRO_MATRICULADO_FECHA, "fecha", CPIQ_MSG_REGISTRO_MATRICULADO_FECHA_REQUIRED) );
		
		
		$this->addFieldset($fieldset);
		
		$fieldNombre = FieldBuilder::buildFieldText ( CPIQ_LBL_REGISTRO_MATRICULADO_NUMERO, "numero", CPIQ_MSG_REGISTRO_MATRICULADO_NUMERO_REQUIRED  );
		$fieldset->addField( $fieldNombre );
		
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
