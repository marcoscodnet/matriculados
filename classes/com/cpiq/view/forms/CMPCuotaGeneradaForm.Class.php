<?php

/**
 * Formulario para Cuota Generada
 *
 * @author Marcos
 * @since 02-07-2013
 */
class CMPCuotaGeneradaForm extends CMPForm{

	/**
	 * se construye el formulario para editar el matriculado
	 */
	public function __construct($action="", $id="edit_cuotaGenerada") {

		parent::__construct($id);

		$fieldset = new FormFieldset( "" );
		$fieldset->addField( FieldBuilder::buildFieldReadOnly ( CDT_ENTITIES_LBL_ENTITY_OID, "oid", ""  ) );
		
		$fieldset->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CUOTA_GENERADA_NOMBRE, "nombre", CPIQ_MSG_CUOTA_GENERADA_NOMBRE_REQUIRED  ) );
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, CPIQ_MSG_CUOTA_GENERADA_MATRICULADO_REQUIRED, "cuotaGenerada_matriculado_oid", "matriculado.oid", "cuotaGenerada_filter_matriculado_change");
		$fieldset->addField( $findMatriculado );
		
		$findCuota = CPIQComponentsFactory::getFindCuotaWithAdd(new Cuota(), CPIQ_LBL_CUOTA, CPIQ_MSG_CUOTA_GENERADA_CUOTA_REQUIRED, "cuotaGenerada_cuota_oid", "cuota.oid", "cuotaGenerada_filter_cuota_change");
		$fieldset->addField( $findCuota );
		
		/*$findMovCtaCte = CPIQComponentsFactory::getFindMovCtaCteWithAdd(new MovCtaCte(), CPIQ_LBL_MOV_CTA_CTE, "", "cuotaGenerada_filter_movCtaCte_oid", "movCtaCte.oid", "cuotaGenerada_filter_movCtaCte_change");
		$fieldset->addField( $findMovCtaCte );*/
		
		$fieldset->addField( FieldBuilder::buildFieldDate ( CPIQ_LBL_CUOTA_GENERADA_FECHA_CARGA, "fechaCarga", CPIQ_MSG_CUOTA_GENERADA_FECHA_CARGA_REQUIRED) );
		
		$this->addHidden( FieldBuilder::buildInputHidden ( "oid", "") );

		//properties del form.
		$this->addProperty("method", "POST");
		$this->setAction("doAction?action=$action");
		
		$this->setOnCancel("window.location.href = 'doAction?action=list_cuotasGenerada';");
		$this->setUseAjaxSubmit( true );
		//$this->setOnSuccessCallback("successTest");
		//$this->setUseAjaxCallback( true );
		//$this->setIdAjaxCallback( "content-left" );
	}

}
?>
