<?php

/**
 * Acción para inicializar el contexto
 * para editar una cuota.
 *
 * @author Marcos
 * @since 27-06-2013
 *
 */

class UpdateCuotaInitAction extends UpdateEntityInitAction {

	protected function getEntityManager(){
		return ManagerFactory::getCuotaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		//TODO recuperar los valores de la cuota actual.
		
		$oid = CdtUtils::getParam('id');
		$valoresCuota = ManagerFactory::getCuotaManager()->getValoresCuota($oid);
		
		return new CMPCuotaForm($action, "edit_cuotas" ,$valoresCuota);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Cuota();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_CUOTA_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_cuota";
	}

}