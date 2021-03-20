<?php

/**
 * Acción para visualizar un pais.
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class ViewPaisAction extends UpdatePaisInitAction {



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
		return CPIQ_MSG_PAIS_TITLE_VIEW;
	}

}
