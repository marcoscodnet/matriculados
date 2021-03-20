<?php

/**
 * Formulario para MovCaja
 *
 * @author Marcos
 * @since 01-11-2013
 */
class CMPMovCajaForm extends CMPForm{

	
	
	/**
	 * se construye el formulario para editar una movCaja
	 */
	public function __construct($action="", $id="edit_movCaja") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
	
		/*$fieldConcepto = FieldBuilder::buildFieldSelect (CPIQ_LBL_CONCEPTO, "concepto.oid", CPIQUtils::getConceptosSinBloquearItems(), CPIQ_MSG_MOVCAJA_CONCEPTO_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldConcepto );*/
		
		$findConcepto = CPIQComponentsFactory::getFindConceptoWithAdd(new Concepto(), CPIQ_LBL_CONCEPTO, CPIQ_MSG_MOVCAJA_CONCEPTO_REQUIRED, "movCaja_filter_concepto_oid", "concepto.oid", "movCaja_filter_concepto_change");
		$fieldset->addField( $findConcepto );
		
		
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_PAGAR_ENCOMIENDA_IMPORTE, "importe",CPIQ_MSG_PAGAR_ENCOMIENDA_IMPORTE_REQUIRED  ) );
		
		$fieldset->addField( FieldBuilder::buildFieldTextArea( CPIQ_LBL_MOVCAJA_OBSERVACIONES, "observaciones"  ) );
		
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_movCajas';");
		$this->setUseAjaxSubmit( true );
		
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		
	}
	
	
}
?>
