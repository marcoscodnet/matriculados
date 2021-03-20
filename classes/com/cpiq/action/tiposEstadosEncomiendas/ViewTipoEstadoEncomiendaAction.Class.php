<?php

/**
 * Acción para visualizar un tipo de estado de encomienda.
 *
 * @author marcos
 * @since 03-10-2013
 *
 */
class ViewTipoEstadoEncomiendaAction extends UpdateTipoEstadoEncomiendaInitAction {



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
