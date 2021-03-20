<?php

/**
 * Formulario para registro de encomienda
 *  
 * @author Bernardo
 * @since 08-10-2013
 */
class CMPEncomiendaRegistroForm extends CMPForm{


	public function getLegend(){
		return CPIQ_MSG_ENCOMIENDA_REGISTROS_ASIGNAR;
	}
	
	/**
	 * se construye el formulario para editar un registro de encomienda
	 */
	public function __construct($action="add_encomienda_registro_session",$id="edit_encomientaregistro") {

		parent::__construct($id, CPIQ_MSG_ASIGNAR);
		
		$this->setCancelLabel( null );
		
		//properties del form.
    	$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );
		
		$this->setUseAjaxSubmit( true );
		
		$this->getRenderer()->setTemplateName( CDT_CMP_TEMPLATE_FORM_INLINE );
		
		$this->setOnSuccessCallback("add_registro");
		$this->setBeforeSubmit("before_submit_registro");
		

		$fieldset = new FormFieldset( $this->getLegend() );
		
		if (CPIQUtils::isMatriculadoLogged()) {
            //que se muestren sólo las encomiendas del matriculado
            $oMatriculado = CPIQUtils::getMatriculadoLogged();
            
        }
        else  $oMatriculado = new Matriculado();
		$fieldRegistro = FieldBuilder::buildFieldSelect (CPIQ_LBL_REGISTRO, "registroMatriculado.oid", CPIQUtils::getRegistrosItems($oMatriculado->getOid()), CPIQ_MSG_ENCOMIENDA_ESPECIALIDAD_TITULO_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldRegistro );
		
		//$fieldset->addField( FieldBuilder::buildFieldText ( "Registro", "registroMatriculado", "Ingrese el registro") );
		
		$this->addFieldset($fieldset);
		
    }
    
}
?>
