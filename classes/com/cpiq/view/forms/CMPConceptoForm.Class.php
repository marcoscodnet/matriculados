<?php

/**
 * Formulario para Concepto
 *
 * @author Marcos
 * @since 25-07-2013
 */
class CMPConceptoForm extends CMPForm{

	
	
	/**
	 * se construye el formulario para editar una concepto
	 */
	public function __construct($action="", $id="edit_concepto", $valoresConcepto=null) {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CONCEPTO_NOMBRE, "nombre", CPIQ_MSG_CONCEPTO_NOMBRE_REQUIRED  ) );
		
		$fieldCoeficiente = FieldBuilder::buildFieldSelect (CPIQ_LBL_CONCEPTO_COEFICIENTE, "coeficiente", Coeficiente::getItems(), CPIQ_MSG_CONCEPTO_COEFICIENTE_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldCoeficiente );
		
		
		
		$fieldTipoAsignado = FieldBuilder::buildFieldSelect (CPIQ_LBL_CONCEPTO_ASIGNADO, "tipoAsignado.oid", CPIQUtils::getTiposAsignadoItems(), CPIQ_MSG_CONCEPTO_ASIGNADO_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldTipoAsignado );
		
		
		
		
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_conceptos';");
		$this->setUseAjaxSubmit( true );
		
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		
	}
	
	
}
?>
