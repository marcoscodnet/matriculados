<?php

/**
 * Formulario para Pagar Cuota/s
 *
 * @author Marcos
 * @since 02-12-2016
 */
class CMPPagarCuotaForm extends CMPForm{

	
	
	public function getRenderer(){
		return new CMPPagarCuotaFormRenderer();
	}
	
	/**
	 * se construye el formulario para editar el encomienda
	 */
	public function __construct($action="", $id="edit_pagarCuota") {

		parent::__construct($id);

		$this->setSubmitLabel( CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA);
		
		$fieldset = new FormFieldset( "" );
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, CPIQ_MSG_TITULO_MATRICULADO_REQUIRED, "pagarCuota_matriculado_oid", "matriculado.oid", "pagarCuota_filter_matriculado_change");
		$findMatriculado->getInput()->setIsEditable(false);
		$findMatriculado->getInput()->setInputSize(5,50);
		$fieldset->addField( $findMatriculado );
		

		
		
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( "", "ds_contenido", ""  ) );
		
		
		
		
		$this->addFieldset($fieldset);
	
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );
		
		
		

		//properties del form.
		$this->addProperty("method", "POST");
		$this->addProperty("enctype", "multipart/form-data");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_cuotasGenerada';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		
	}


}
?>
