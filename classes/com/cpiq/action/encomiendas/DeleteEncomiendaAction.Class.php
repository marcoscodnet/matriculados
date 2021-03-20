<?php

/**
 * Acción para eliminar encomiendas.
 *
 * @author Marcos
 * @since 09-10-2013
 *
 */
class DeleteEncomiendaAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess() {
		$this->setDs_forward_params("search=1");
		return 'delete_matriculado_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError() {
		$_GET["search"]=1;
		return 'delete_matriculado_error';
	}

}
