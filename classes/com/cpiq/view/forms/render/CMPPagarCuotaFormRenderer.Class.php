<?php

/**
 * Implementación para renderizar un formulario de pagar cuotas 
 *
 * @author Marcos
 * @since 02-12-2016
 *
 */
class CMPPagarCuotaFormRenderer extends DefaultFormRenderer {

	 protected function getXTemplate() {
    	return new XTemplate( CPIQ_TEMPLATE_PAGAR_CUOTA_FORM );
    }
	
	
	protected function renderFieldset(CMPForm $form, XTemplate $xtpl){
		
		
		
		foreach ($form->getFieldsets() as $fieldset) {
			
			//legend
			$legend = $fieldset->getLegend();
			if(!empty($legend)){
				$xtpl->assign("value", $legend);
				$xtpl->parse("main.fieldset.legend");
			}
			
			
			$fields = $fieldset->getFields();
			
			$field = $fields['pagarCuota_matriculado_oid'];		
			$input = $field->getInput();
			$label = $field->getLabel();	
			$this->renderLabel( $label, $input, $xtpl );
			$this->renderInput( $input, $xtpl );
			$xtpl->assign("minWidth", $field->getMinWidth());
			
			if( $input->getIsVisible() ){
				$xtpl->assign("display", 'block');
				
			}
			else $xtpl->assign("display", 'none');
			
			$xtpl->parse("main.fieldset.pagarCuota_matriculado_oid");
			
			
			
			$field = $fields['ds_contenido'];		
			
			
			
			$xtpl->assign("ds_contenido", $field->getInput()->getProperty("value") );
			
			$xtpl->parse("main.fieldset.ds_contenido");
			
			
			
			
			
			$xtpl->parse("main.fieldset");
			
			
			//$xtpl->parse("main");
		} 
		
		
		
	}

	protected function renderLabel( $label, CMPFormInput $input, XTemplate $xtpl ){
		
		$xtpl->assign("value", $label );
		
		if( $input->getIsRequired() && $input->getIsEditable() ){
			$xtpl->assign("required", $input->getRequiredLabel() );
		}else{
			$xtpl->assign("required", "" );
		}
		
		$xtpl->assign("input_name", $input->getId() );
		$xtpl->parse("main.fieldset.".$input->getId().".label");
	}
	
	protected function renderInput( CMPFormInput $input, XTemplate $xtpl ){
		
		$xtpl->assign("input", $input->show() );
		
		$xtpl->parse("main.fieldset.".$input->getId().".input");
		
	}
	
	
	
	
	
	
	
	
	
}