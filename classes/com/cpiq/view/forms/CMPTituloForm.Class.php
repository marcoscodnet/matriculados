<?php

/**
 * Formulario para Título
 *
 * @author Marcos
 * @since 12-06-2013
 */
class CMPTituloForm extends CMPForm{

	/**
	 * se construye el formulario para editar el matriculado
	 */
	public function __construct($action="", $id="edit_titulo") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, CPIQ_MSG_TITULO_MATRICULADO_REQUIRED, "titulo_matriculado_oid", "matriculado.oid", "titulo_filter_matriculado_change");
		$fieldset->addField( $findMatriculado );
		
		$findTipoTitulo = CPIQComponentsFactory::getFindTipoTituloWithAdd(new TipoTitulo(), CPIQ_LBL_TIPO_TITULO, CPIQ_MSG_TITULO_TIPO_TITULO_REQUIRED, "titulo_tipoTitulo_oid", "tipoTitulo.oid", "titulo_filter_tipoTitulo_change");
		$fieldset->addField( $findTipoTitulo );
		
		$findEntidadEmisora = CPIQComponentsFactory::getFindEntidadEmisoraWithAdd(new EntidadEmisora(), CPIQ_LBL_ENTIDAD_EMISORA, CPIQ_MSG_TITULO_ENTIDAD_EMISORA_REQUIRED, "titulo_filter_entidadEmisora_oid", "entidadEmisora.oid", "titulo_filter_entidadEmisora_change");
		$fieldset->addField( $findEntidadEmisora );
		
		$fieldset->addField( FieldBuilder::buildFieldDate ( CPIQ_LBL_TITULO_FECHA_EXPEDICION, "fechaExpedicion", CPIQ_MSG_TITULO_FECHA_EXPEDICION_REQUIRED) );
		$fieldset->addField( FieldBuilder::buildFieldDate ( CPIQ_LBL_TITULO_FECHA_MATRICULACION, "fechaMatriculacion", CPIQ_MSG_TITULO_FECHA_EXPEDICION_REQUIRED) );
		
		//$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_TITULO_MATRICULA, "matricula", CPIQ_MSG_TITULO_MATRICULA_REQUIRED, "", 10 ) );
		
		/*$radios = array();
		foreach (CPIQUtils::getYesNoItems() as $value => $label) {
									 //buildFieldRadio( $label, $id, $name, $isChecked=false, $value="", $requiredMessage="", $size=30 ){
			$radio = FieldBuilder::buildFieldRadio( $label, "tituloPrincipal", "tituloPrincipal", false, $value);
			$radios[] = $radio;
		}
		$fieldset->addField( FieldBuilder::buildFieldRadios(  CPIQ_LBL_TITULO_PRINCIPAL, "tituloPrincipal", $radios) );*/
		$fieldset->addField(FieldBuilder::buildFieldCheckbox( CPIQ_LBL_TITULO_PRINCIPAL,  "tituloPrincipal", "tituloPrincipal"));
		$this->addFieldset($fieldset);
		$this->addHidden( FieldBuilder::buildInputHidden ( "matricula", "matricula") );
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		//$matriculado_oid = CdtUtils::getParam('matriculado_oid');
		$cancel = 'doAction?action=list_titulos';	
		/*if (!empty( $matriculado_oid )) {
			$cancel = 'doAction?action=list_titulos&id='.$matriculado_oid;
		}*/
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
