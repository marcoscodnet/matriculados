<?php

/**
 * Formulario para Localidad
 *
 * @author Bernardo
 * @since 27-05-2013
 */
class CMPLocalidadForm extends CMPForm{

	/**
	 * se construye el formulario para editar una localidad
	 */
	public function __construct($action="", $id="edit_localidad") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );

		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_LOCALIDAD_NOMBRE, "nombre", CPIQ_MSG_LOCALIDAD_NOMBRE_REQUIRED  ) );
		
		/*$findPais = CPIQComponentsFactory::getFindPaisWithAdd(new Pais(), CPIQ_LBL_PAIS, CPIQ_MSG_LOCALIDAD_PAIS_REQUIRED, "localidad_pais_oid", "pais.oid", "");
		$fieldset->addField( $findPais );		
		
		$findProvincia = CPIQComponentsFactory::getFindProvinciaWithAdd(new Provincia(), CPIQ_LBL_LOCALIDAD_PROVINCIA, CPIQ_MSG_LOCALIDAD_PROVINCIA_REQUIRED, "localidad_provincia_oid", "provincia.oid", "");
		$fieldset->addField( $findProvincia );*/
		
		$findPais = CPIQComponentsFactory::getFindPais(new Pais(), CPIQ_LBL_PAIS, "", "localidad_pais_oid", "pais.oid", "localidad_pais_change");
		$fieldset->addField( $findPais );
		
		$findProvincia = CPIQComponentsFactory::getFindProvincia(new Provincia(), CPIQ_LBL_PROVINCIA, "","localidad_provincia_oid", "provincia.oid", "localidad_provincia_change");
		$fieldset->addField( $findProvincia );
		
		
		
		$this->addFieldset($fieldset);

		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		$this->setOnCancel("window.location.href = 'doAction?action=list_localidades';");
		$this->setUseAjaxSubmit( true );
		$this->setCustomHTML("<script type=\"text/javascript\">
		function pais_change(data){}
		</script>");
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
