<?php

/**
 * Acción para eliminar incumbencia tipoEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class DeleteIncumbenciaTipoEncomiendaAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getIncumbenciaTipoEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess() {
		$this->setDs_forward_params("search=1");
		return 'delete_registroCuota_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError() {
		$_GET["search"]=1;
		return 'delete_registroCuota_error';
	}

}
