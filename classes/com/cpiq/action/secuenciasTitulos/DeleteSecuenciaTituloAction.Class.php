<?php

/**
 * Acción para eliminar secuencia título.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class DeleteSecuenciaTituloAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getSecuenciaTituloManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess() {
		$this->setDs_forward_params("search=1");
		return 'delete_secuenciaTitulo_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError() {
		$_GET["search"]=1;
		return 'delete_secuenciaTitulo_error';
	}

}
