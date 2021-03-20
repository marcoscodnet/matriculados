<?php

/**
 * Formulario para Cuota
 *
 * @author Marcos
 * @since 27-06-2013
 */
class CMPCuotaForm extends CMPForm{

	private $valoresHelper;
	
	/**
	 * se construye el formulario para editar una cuota
	 */
	public function __construct($action="", $id="edit_cuota", $valoresCuota=null) {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CUOTA_NOMBRE, "nombre", CPIQ_MSG_CUOTA_NOMBRE_REQUIRED  ) );
		
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_CUOTA_YEAR, "year", CPIQ_MSG_CUOTA_YEAR_REQUIRED  ) );
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_cuotas';");
		$this->setUseAjaxSubmit( true );
		
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		$this->valoresHelper = new CMPCuotaFormHelper($valoresCuota);
	}
	
	public function getRenderer(){
		
		return new CMPCuotaFormRenderer($this->valoresHelper);
	}
	
	public function fillInputValues( $entity ){
		
		parent::fillInputValues( $entity );
		
		$this->valoresHelper->fillInputValues();
		
	}
	
	public function fillEntityValues( $entity ){

		parent::fillEntityValues( $entity );
		
		$this->valoresHelper->fillEntityValues();
		
	}
	
	public function setIsEditable($isEditable){
		
		parent::setIsEditable($isEditable);
		
		if($this->valoresHelper!=null)
			$this->valoresHelper->setIsEditable($isEditable);
	}
}
?>
