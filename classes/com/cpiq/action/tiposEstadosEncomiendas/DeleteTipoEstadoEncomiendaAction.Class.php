<?php

/**
 * Acción para eliminar tipo de estado de encomienda.
 *
 * @author Marcos
 * @since 03-10-2013
 *
 */
class DeleteTipoEstadoEncomiendaAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getTipoEstadoEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess() {
		$this->setDs_forward_params("search=1");
		return 'delete_tipoEstadoEncomienda_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError() {
		$_GET["search"]=1;
		return 'delete_tipoEstadoEncomienda_error';
	}

}
