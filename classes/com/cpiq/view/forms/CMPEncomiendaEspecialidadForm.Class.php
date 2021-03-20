<?php

/**
 * Formulario para especialidad de encomienda
 *  
 * @author Bernardo
 * @since 08-10-2013
 */
class CMPEncomiendaEspecialidadForm extends CMPForm{


	public function getLegend(){
		return CPIQ_MSG_ENCOMIENDA_ESPECIALIDADES_ASIGNAR;
	}
	
	/**
	 * se construye el formulario para editar un especialidad de encomienda
	 */
	public function __construct($action="add_encomienda_especialidad_session",$id="edit_encomientaespecialidad") {

		parent::__construct($id, CPIQ_MSG_ASIGNAR);
		
		$this->setCancelLabel( null );
		
		//properties del form.
    	$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );
		
		$this->setUseAjaxSubmit( true );
		
		$this->getRenderer()->setTemplateName( CDT_CMP_TEMPLATE_FORM_INLINE );
		
		$this->setOnSuccessCallback("add_especialidad");
		$this->setBeforeSubmit("before_submit_especialidad");
		

		$fieldset = new FormFieldset( $this->getLegend() );
		//$fieldset->addField( FieldBuilder::buildFieldText ( "Titulo", "titulo", "Ingrese el titulo") );
		if (CPIQUtils::isMatriculadoLogged()) {
            //que se muestren sólo las encomiendas del matriculado
            $oMatriculado = CPIQUtils::getMatriculadoLogged();
            
        }	
		$fieldTitulo = FieldBuilder::buildFieldSelect (CPIQ_LBL_TITULO, "titulo.oid", CPIQUtils::getTitulosItems($oMatriculado->getOid()), CPIQ_MSG_ENCOMIENDA_ESPECIALIDAD_TITULO_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldTitulo );
		
		$this->addFieldset($fieldset);
		
    }
    
}
?>
