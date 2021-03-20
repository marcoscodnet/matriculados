<?php

/**
 * Acción para eliminar conceptos.
 *
 * @author Marcos
 * @since 25-07-2013
 *
 */
class DeleteConceptoAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getConceptoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess() {
		$this->setDs_forward_params("search=1");
		return 'delete_concepto_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError() {
		$_GET["search"]=1;
		return 'delete_concepto_error';
	}

}
