<?php

/**
 * Formulario para PagarEncomienda
 *
 * @author Marcos
 * @since 17-10-2013
 */
class CMPPagarEncomiendaForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_pagarEncomienda") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		//$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
			
		$findEncomienda = CPIQComponentsFactory::getFindEncomienda(new Encomienda(), CPIQ_LBL_ENCOMIENDA, CPIQ_MSG_ENCOMIENDA_OBSERVACION_ENCOMIENDA_REQUIRED, "pagarEncomienda_encomienda_oid", "encomienda.oid", "pagarEncomienda_filter_encomienda_change");
		$fieldset->addField( $findEncomienda );
		
		$fieldTipoPago = FieldBuilder::buildFieldSelect (CPIQ_LBL_TIPO_PAGO, "tipoPago.oid", CPIQUtils::getTiposPagoItems(), CPIQ_MSG_PAGAR_ENCOMIENDA_TIPO_PAGO_REQUIRED, null, null, "--seleccionar--" );
		$fieldTipoPago->getInput()->addProperty( 'onChange', 'seleccionarTipoPago(this)' );
		$fieldset->addField( $fieldTipoPago );
		
		
		$inputEntidad =  FieldBuilder::buildFieldText ( CPIQ_LBL_PAGAR_ENCOMIENDA_ENTIDAD, "entidad"  );
		$inputEntidad->getInput()->setIsVisible(false);
		$fieldset->addField( $inputEntidad );
		
		$inputNroCheque =  FieldBuilder::buildFieldText ( CPIQ_LBL_PAGAR_ENCOMIENDA_CHEQUE, "nroCheque"  );
		$inputNroCheque->getInput()->setIsVisible(false);
		$fieldset->addField( $inputNroCheque );
		
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_PAGAR_ENCOMIENDA_IMPORTE, "importe",CPIQ_MSG_PAGAR_ENCOMIENDA_IMPORTE_REQUIRED  ) );
		
		
		
		$this->addFieldset($fieldset);
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_encomiendas';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
