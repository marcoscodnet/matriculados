<?php

/**
 * Formulario para EncomiendaObservacion
 *
 * @author Marcos
 * @since 27-09-2013
 */
class CMPEncomiendaObservacionForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_encomiendaObservacion") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
			
		$findEncomienda = CPIQComponentsFactory::getFindEncomienda(new Encomienda(), CPIQ_LBL_ENCOMIENDA, CPIQ_MSG_ENCOMIENDA_OBSERVACION_ENCOMIENDA_REQUIRED, "encomiendaObservacion_encomienda_oid", "encomienda.oid", "encomiendaObservacion_filter_encomienda_change");
		$fieldset->addField( $findEncomienda );
		
		$fieldObservacion = FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_OBSERVACION_OBSERVACION, "observacion", CPIQ_MSG_ENCOMIENDA_OBSERVACION_OBSERVACION_REQUIRED  );
		$fieldset->addField( $fieldObservacion );
		$this->addFieldset($fieldset);
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		//$encomienda_oid = CdtUtils::getParam('encomienda_oid');
		$cancel = 'doAction?action=list_encomiendasObservacion';	
		/*if (!empty( $encomienda_oid )) {
			$cancel = 'doAction?action=list_encomiendasObservacion&id='.$encomienda_oid;
		}*/
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
