<?php

/**
 * Formulario para Provincia
 *
 * @author Marcos
 * @since 28-05-2013
 */
class CMPProvinciaForm extends CMPForm{

	/**
	 * se construye el formulario para editar una provincia
	 */
	public function __construct($action="", $id="edit_provincia") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_PROVINCIA_NOMBRE, "nombre", CPIQ_MSG_PROVINCIA_NOMBRE_REQUIRED  ) );
		
		$findPais = CPIQComponentsFactory::getFindPaisWithAdd(new Pais(), CPIQ_LBL_PROVINCIA_PAIS, CPIQ_MSG_PROVINCIA_PAIS_REQUIRED, "provincia_pais_oid", "pais.oid", "");
		$fieldset->addField( $findPais );
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_provincias';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
