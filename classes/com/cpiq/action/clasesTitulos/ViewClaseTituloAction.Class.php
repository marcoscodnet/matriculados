<?php

/**
 * Acción para visualizar una clase título.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class ViewClaseTituloAction extends UpdateClaseTituloInitAction {



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
		return CPIQ_MSG_CLASE_TITULO_TITLE_VIEW;
	}

}
