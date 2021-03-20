<?php

/**
 * Acción para eliminar localidad.
 *
 * @author Marcos
 * @since 30-05-2013
 *
 */
class DeleteLocalidadAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getLocalidadManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess() {
		$this->setDs_forward_params("search=1");
		return 'delete_localidad_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError() {
		$_GET["search"]=1;
		return 'delete_localidad_error';
	}

}
