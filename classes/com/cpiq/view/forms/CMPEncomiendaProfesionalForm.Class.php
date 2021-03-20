<?php

/**
 * Formulario para profesional de encomienda
 *  
 * @author Bernardo
 * @since 08-10-2013
 */
class CMPEncomiendaProfesionalForm extends CMPForm{


	public function getLegend(){
		return CPIQ_MSG_ENCOMIENDA_PROFESIONALES_ASIGNAR;
	}
	
	/**
	 * se construye el formulario para editar un detalle de venta
	 */
	public function __construct($action="add_encomienda_profesional_session",$id="edit_encomientaprofesional") {

		parent::__construct($id, CPIQ_MSG_ASIGNAR);
		
		$this->setCancelLabel( null );
		
		//properties del form.
    	$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );
		
		$this->setUseAjaxSubmit( true );
		
		$this->getRenderer()->setTemplateName( CDT_CMP_TEMPLATE_FORM_INLINE );
		
		$this->setOnSuccessCallback("add_profesional");
		$this->setBeforeSubmit("before_submit_profesional");
		

		$fieldset = new FormFieldset( $this->getLegend() );
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_PROFESIONALES_CONSEJO, "consejo", CPIQ_MSG_ENCOMIENDA_PROFESIONALES_CONSEJO_REQUIRED) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_PROFESIONALES_PROFESIONAL, "profesional", CPIQ_MSG_ENCOMIENDA_PROFESIONALES_PROFESIONAL_REQUIRED) );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_PROFESIONALES_MATRICULA, "matricula", CPIQ_MSG_ENCOMIENDA_PROFESIONALES_MATRCIULA_REQUIRED) );
		
		$this->addFieldset($fieldset);
		
    }
    
}
?>
