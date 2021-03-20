<?php

/**
 * Acción para visualizar un tipo de documento.
 *
 * @author marcos
 * @since 30-05-2013
 *
 */
class ViewTipoDocumentoAction extends UpdateTipoDocumentoInitAction {



	protected function parseEntity($entity, XTemplate $xtpl) {

		$this->getForm()->setIsEditable( false );

		parent::parseEntity($entity, $xtpl);


	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout() {
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle() {
		return CPIQ_MSG_TIPO_TITULO_TITLE_VIEW;
	}

}
