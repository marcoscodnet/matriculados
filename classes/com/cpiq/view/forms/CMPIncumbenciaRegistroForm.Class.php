<?php

/**
 * Formulario para IncumbenciaRegistro
 *
 * @author Marcos
 * @since 26-09-2013
 */
class CMPIncumbenciaRegistroForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_incumbenciaRegistro") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findIncumbencia = CPIQComponentsFactory::getFindIncumbencia(new Incumbencia(), CPIQ_LBL_INCUMBENCIA, CPIQ_MSG_INCUMBENCIA_REGISTRO_INCUMBENCIA_REQUIRED, "incumbenciaRegistro_incumbencia_oid", "incumbencia.oid", "incumbenciaRegistro_filter_incumbencia_change");
		$fieldset->addField( $findIncumbencia );
		
		
		$findRegistro = CPIQComponentsFactory::getFindRegistroWithAdd(new Registro(), CPIQ_LBL_REGISTRO, CPIQ_MSG_INCUMBENCIA_REGISTRO_REGISTRO_REQUIRED, "incumbenciaRegistro_registro_oid", "registro.oid", "incumbenciaRegistro_filter_registro_change");
		$fieldset->addField( $findRegistro );
		
		
		$this->addFieldset($fieldset);
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_incumbenciasRegistro';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
