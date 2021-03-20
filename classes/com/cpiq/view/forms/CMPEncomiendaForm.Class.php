<?php

/**
 * Formulario para Encomienda
 *
 * @author marcos
 * @since 04-10-2013
 */
class CMPEncomiendaForm extends CMPForm{

	
	public function getRenderer(){
		return new CMPEncomiendaFormRenderer();
	}
	
	/**
	 * se construye el formulario para editar el encomienda
	 */
	public function __construct($action="", $id="edit_encomienda") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CPIQ_LBL_ENCOMIENDA_NUMERO, "numero", ""  ) );
		
		$findTipoEncomienda = CPIQComponentsFactory::getFindTipoEncomienda(new TipoEncomienda(), CPIQ_LBL_TIPO_ENCOMIENDA, CPIQ_MSG_ENCOMIENDA_TIPO_ENCOMIENDA_REQUIRED, "encomienda_filter_tipoEncomienda_oid", "tipoEncomienda.oid");
		$findTipoEncomienda->getInput()->setFunctionCallback("editEncomienda_tipoEncomiendaCallback");
		$fieldset->addField( $findTipoEncomienda );
		
		/*$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, CPIQ_MSG_TITULO_MATRICULADO_REQUIRED, "titulo_matriculado_oid", "matriculado.oid", "titulo_filter_matriculado_change");
		$fieldset->addField( $findMatriculado );*/
		
		
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_COMITENTE, "comitente", CPIQ_MSG_ENCOMIENDA_COMITENTE_REQUIRED) );
		
		$fieldTipoComitente = FieldBuilder::buildFieldSelect (CPIQ_LBL_ENCOMIENDA_TIPO_COMITENTE, "tipoComitente", TipoComitente::getItems(), CPIQ_MSG_ENCOMIENDA_TIPO_COMITENTE_REQUIRED, null, null, "--seleccionar--" );
		$fieldTipoComitente->getInput()->addProperty( 'onChange', 'seleccionarTipoComitente(this)' );
		$fieldset->addField( $fieldTipoComitente );
		
		$inputRepresentante = FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_REPRESENTANTE, "representante");
		$inputRepresentante->getInput()->setIsVisible(false);
		$fieldset->addField( $inputRepresentante );
		
		
		
		$fieldTipoDocumento = FieldBuilder::buildFieldSelect (CPIQ_LBL_ENCOMIENDA_TIPO_DOCUMENTO, "tipoDocumento.oid", CPIQUtils::getTiposDocumentoItems(), "", null, null, "--seleccionar--", "tipoDocumento_oid" );
		$fieldTipoDocumento->getInput()->setIsVisible(false);
		$fieldset->addField( $fieldTipoDocumento );
		
		$inputDocumento = FieldBuilder::buildFieldNumber ( CPIQ_LBL_ENCOMIENDA_DOCUMENTO, "documento", "", "", 10 ) ;
		$inputDocumento->getInput()->setIsVisible(false);
		$fieldset->addField( $inputDocumento );
		
		
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_ENCOMIENDA_NRO_CUIL, "cuil", CPIQ_MSG_ENCOMIENDA_NRO_CUIL_REQUIRED, "", 12 ) );


		$fieldDomicilio = FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_DOMICILIO, "domicilio", CPIQ_MSG_ENCOMIENDA_DOMICILIO_REQUIRED  );
		//$fieldDomicilio->getInput()->addProperty("maxlength", 255);
		$fieldset->addField( $fieldDomicilio );
		
		$findLocalidad = CPIQComponentsFactory::getFindLocalidad(new Localidad(), CPIQ_LBL_LOCALIDAD, CPIQ_MSG_ENCOMIENDA_LOCALIDAD_REQUIRED, "matriculado_filter_localidad_oid", "localidad.oid", "matriculado_filter_localidad_change");
		$fieldset->addField( $findLocalidad );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_CP, "cp",CPIQ_MSG_ENCOMIENDA_CP_REQUIRED  ) );
		
				

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_TELEFONO, "telefono",CPIQ_MSG_ENCOMIENDA_TELEFONO_REQUIRED ) );
		$this->addFieldset($fieldset);

		
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_encomiendas';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
		$this->setCustomHTML('<script> $(function() {$("#tipoComitente").change();});</script>');
	}

}
?>
