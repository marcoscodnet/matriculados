<?php

/**
 * Formulario para IncumbenciaTipoTitulo
 *
 * @author Marcos
 * @since 26-09-2013
 */
class CMPIncumbenciaTipoTituloForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_incumbenciaTipoTitulo") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findIncumbencia = CPIQComponentsFactory::getFindIncumbencia(new Incumbencia(), CPIQ_LBL_INCUMBENCIA, CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_INCUMBENCIA_REQUIRED, "incumbenciaTipoTitulo_incumbencia_oid", "incumbencia.oid", "incumbenciaTipoTitulo_filter_incumbencia_change");
		$fieldset->addField( $findIncumbencia );
		
		
		$findTipoTitulo = CPIQComponentsFactory::getFindTipoTituloWithAdd(new TipoTitulo(), CPIQ_LBL_TIPO_TITULO, CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TIPO_TITULO_REQUIRED, "incumbenciaTipoTitulo_tipoTitulo_oid", "tipoTitulo.oid", "incumbenciaTipoTitulo_filter_tipoTitulo_change");
		$fieldset->addField( $findTipoTitulo );
		
		
		$this->addFieldset($fieldset);
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$cancel = 'doAction?action=list_incumbenciasTiposTitulo';	
		
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
