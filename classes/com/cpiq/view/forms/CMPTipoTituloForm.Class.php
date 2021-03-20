<?php

/**
 * Formulario para TipoTitulo
 *
 * @author Bernardo
 * @since 17-05-2013
 */
class CMPTipoTituloForm extends CMPForm{

	/**
	 * se construye el formulario para editar el tipo de título
	 */
	public function __construct($action="", $id="edit_tipoTitulo") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_TIPO_TITULO_NOMBRE, "nombre", CPIQ_MSG_TIPO_TITULO_NOMBRE_REQUIRED  ) );

		/*$findClaseTitulo = CPIQComponentsFactory::getFindClaseTitulo(new ClaseTitulo(), CPIQ_LBL_TIPO_TITULO_CLASE_TITULO, CPIQ_MSG_TIPO_TITULO_CLASE_TITULO_REQUIRED, "localidad_filter_claseTitulo_oid", "claseTitulo.oid");
		$fieldset->addField( $findClaseTitulo );*/
		
		$fieldClaseTitulo = FieldBuilder::buildFieldSelect (CPIQ_LBL_TIPO_TITULO_CLASE_TITULO, "claseTitulo.oid", CPIQUtils::getClasesTituloItems(), CPIQ_MSG_TIPO_TITULO_CLASE_TITULO_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldClaseTitulo );
		
		/*$findSecuenciaTitulo = CPIQComponentsFactory::getFindSecuenciaTitulo(new SecuenciaTitulo(), CPIQ_LBL_TIPO_TITULO_SECUENCIA_TITULO, CPIQ_MSG_TIPO_TITULO_SECUENCIA_TITULO_REQUIRED, "localidad_filter_secuenciaTitulo_oid", "secuenciaTitulo.oid");
		$fieldset->addField( $findSecuenciaTitulo );*/
		
		$fieldSecuenciaTitulo = FieldBuilder::buildFieldSelect (CPIQ_LBL_TIPO_TITULO_SECUENCIA_TITULO, "secuenciaTitulo.oid", CPIQUtils::getSecuenciasTituloItems(), CPIQ_MSG_TIPO_TITULO_SECUENCIA_TITULO_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldSecuenciaTitulo );
		
		$fieldset->addField(FieldBuilder::buildFieldCheckbox( CPIQ_LBL_TIPO_TITULO_INGENIERO_LICENCIADO,  "ingenieroLicenciado", "ingenieroLicenciado"));
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_tiposTitulo';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
