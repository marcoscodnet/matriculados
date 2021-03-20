<?php

/**
 * Acción para visualizar una secuencia título.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class ViewSecuenciaTituloAction extends UpdateSecuenciaTituloInitAction {



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
		return CPIQ_MSG_SECUENCIA_TITULO_TITLE_VIEW;
	}

}
