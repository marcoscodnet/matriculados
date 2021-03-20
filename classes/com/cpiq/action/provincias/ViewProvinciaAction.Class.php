<?php

/**
 * Acción para visualizar un provincia.
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class ViewProvinciaAction extends UpdateProvinciaInitAction {



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
		return CPIQ_MSG_PROVINCIA_TITLE_VIEW;
	}

}
