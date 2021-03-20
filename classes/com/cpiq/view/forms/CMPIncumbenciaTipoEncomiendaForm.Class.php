<?php

/**
 * Formulario para IncumbenciaTipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 */
class CMPIncumbenciaTipoEncomiendaForm extends CMPForm{

	/**
	 * se construye el formulario para editar el registro
	 */
	public function __construct($action="", $id="edit_incumbenciaTipoEncomienda") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$findIncumbencia = CPIQComponentsFactory::getFindIncumbencia(new Incumbencia(), CPIQ_LBL_INCUMBENCIA, CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_INCUMBENCIA_REQUIRED, "incumbenciaTipoEncomienda_incumbencia_oid", "incumbencia.oid", "incumbenciaTipoEncomienda_filter_incumbencia_change");
		$fieldset->addField( $findIncumbencia );
		
		
		$findTipoEncomienda = CPIQComponentsFactory::getFindTipoEncomienda(new TipoEncomienda(), CPIQ_LBL_TIPO_ENCOMIENDA, CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TIPO_ENCOMIENDA_REQUIRED, "incumbenciaTipoEncomienda_tipoEncomienda_oid", "tipoEncomienda.oid", "incumbenciaTipoEncomienda_filter_tipoEncomienda_change");
		$fieldset->addField( $findTipoEncomienda );
		
		
		$this->addFieldset($fieldset);
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		//$tipoEncomienda_oid = CdtUtils::getParam('tipoEncomienda_oid');
		$cancel = 'doAction?action=list_incumbenciasTiposEncomienda';	
		/*if (!empty( $tipoEncomienda_oid )) {
			$cancel = 'doAction?action=list_incumbenciasTiposEncomienda&id='.$tipoEncomienda_oid;
		}*/
		$this->setOnCancel("window.location.href = '$cancel';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
