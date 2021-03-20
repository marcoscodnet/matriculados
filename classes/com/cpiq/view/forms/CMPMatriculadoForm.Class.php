<?php

/**
 * Formulario para Matriculado
 *
 * @author Bernardo
 * @since 23-05-2013
 */
class CMPMatriculadoForm extends CMPForm{

	/**
	 * se construye el formulario para editar el matriculado
	 */
	public function __construct($action="", $id="edit_matriculado") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$fieldNombre = FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_NOMBRE, "nombre", CPIQ_MSG_MATRICULADO_NOMBRE_REQUIRED  );
		$fieldNombre->getInput()->addProperty("maxlength", 100);
		$fieldset->addField( $fieldNombre );
		
		$fieldApellido = FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_APELLIDO, "apellido", CPIQ_MSG_MATRICULADO_APELLIDO_REQUIRED  );
		$fieldApellido->getInput()->addProperty("maxlength", 100);
		$fieldset->addField( $fieldApellido );
		
		$fieldTipoDocumento = FieldBuilder::buildFieldSelect (CPIQ_LBL_MATRICULADO_TIPO_DOCUMENTO, "tipoDocumento.oid", CPIQUtils::getTiposDocumentoItems(), CPIQ_MSG_MATRICULADO_TIPO_DOCUMENTO_REQUIRED, null, null, "--seleccionar--" );
		
		$fieldset->addField( $fieldTipoDocumento );
		
		$fieldset->addField( FieldBuilder::buildFieldNumber ( CPIQ_LBL_MATRICULADO_NRO_DOCUMENTO, "nroDocumento", CPIQ_MSG_MATRICULADO_NRO_DOCUMENTO_REQUIRED, "", 10 ) );
		
		//$fieldSexo = FieldBuilder::buildFieldSelect (CPIQ_LBL_MATRICULADO_SEXO, "sexo", CPIQUtils::getSexoItems() );
		//$fieldset->addField( $fieldSexo );
		
		$radios = array();
		foreach (Sexo::getItems() as $value => $label) {
									 //buildFieldRadio( $label, $id, $name, $isChecked=false, $value="", $requiredMessage="", $size=30 ){
			$radioSexo = FieldBuilder::buildFieldRadio( $label, "sexo", "sexo", false, $value);
			$radios[] = $radioSexo;
		}
		$fieldset->addField( FieldBuilder::buildFieldRadios(  CPIQ_LBL_SEXO, "sexo", $radios) );
		

		$fieldset->addField( FieldBuilder::buildFieldDate ( CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO, "fechaNacimiento") );


		$fieldDomicilio = FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_DOMICILIO, "domicilio", CPIQ_MSG_MATRICULADO_DOMICILIO_REQUIRED  );
		$fieldDomicilio->getInput()->addProperty("maxlength", 255);
		$fieldset->addField( $fieldDomicilio );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_CP, "codigoPostal"  ) );
		
		/**
		 * testeando find entity
		 */
		/*$findEntityInput = FieldBuilder::buildFieldFindEntity (new Localidad(), CPIQ_LBL_MATRICULADO_LOCALIDAD, "localidad_oid", "localidad.oid", CPIQComponentsFactory::getAutocompleteLocalidad(), get_class(ManagerFactory::getLocalidadManager()), "CMPLocalidadPopupGrid" , $requiredMessage );
		$findEntityInput->getInput()->setAddEntityAction("add_localidad_findobject_init");
		//$findEntityInput->getInput()->setParent(6);
		$fieldset->addField( $findEntityInput );*/
		
		//$findLocalidad = CPIQComponentsFactory::getFindLocalidadWithAdd( new Localidad(), CPIQ_MSG_MATRICULADO_LOCALIDAD_REQUIRED, "localidad_oid", "localidad.oid" );
		//$fieldset->addField( FieldBuilder::buildFieldFindObject( CPIQ_LBL_MATRICULADO_LOCALIDAD, $findLocalidad ) );
		
		$findLocalidad = CPIQComponentsFactory::getFindLocalidadWithAdd(new Localidad(), CPIQ_LBL_LOCALIDAD, CPIQ_MSG_MATRICULADO_LOCALIDAD_REQUIRED, "matriculado_filter_localidad_oid", "localidad.oid", "matriculado_filter_localidad_change");
		$fieldset->addField( $findLocalidad );
		
		$fieldset->addField( FieldBuilder::buildFieldEmail ( CPIQ_LBL_MATRICULADO_EMAIL, "email",CPIQ_MSG_MATRICULADO_EMAIL_REQUIRED) );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_TE_PARTICULAR, "teParticular" ) );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_TE_LABORAL, "teLaboral" ) );
		

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_TE_MOVIL, "teMovil" ) );
		$this->addFieldset($fieldset);

		
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_matriculados';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
