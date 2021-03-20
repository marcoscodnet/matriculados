<?php

/**
 * Acción para inicializar el contexto
 * para editar un registro cuota.
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */

class AddRegistroCuotaInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPRegistroCuotaForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$registroCuota = new RegistroCuota();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addOrder('year','DESC');
		$oCriteria->setPage(1);
		$oCriteria->setRowPerPage(1);
		$managerRegistroCuota =  ManagerFactory::getRegistroCuotaManager();
        $oRegistroCuota = $managerRegistroCuota->getEntity($oCriteria);
        if (empty($oRegistroCuota)) {
			$registroCuota->setYear(date('Y'));
        }
        else $registroCuota->setYear($oRegistroCuota->getYear()+1);
		
		
		$filter = new CMPRegistroCuotaFilter();
		$filter->fillSavedProperties();
		$registroCuota->setRegistro($filter->getRegistro());
		
		return $registroCuota;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_REGISTRO_CUOTA_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_registroCuota";
	}


}
