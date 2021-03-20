<?php

/**
 * Acción para inicializar el contexto
 * para editar un registro matriculado.
 *
 * @author Marcos
 * @since 19-09-2013
 *
 */

class AddRegistroMatriculadoInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPRegistroMatriculadoForm($action);
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		/*$registroCuota = new RegistroCuota();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addOrder('year','DESC');
		$oCriteria->setPage(1);
		$oCriteria->setRowPerPage(1);
		$managerRegistroCuota =  ManagerFactory::getRegistroCuotaManager();
        $oRegistroCuota = $managerRegistroCuota->getEntity($oCriteria);*/
        
        $registroMatriculado = new RegistroMatriculado();
       /* if ($oRegistroCuota) {
        	$registroMatriculado->setRegistroCuota($oRegistroCuota);
        }*/
        
        
		
       
		$filter = new CMPRegistroMatriculadoFilter();
		$filter->fillSavedProperties();
		$registroMatriculado->setMatriculado($filter->getMatriculado());
		
       
		
		
		$registroMatriculado->setFecha(date(CPIQ_DATE_FORMAT));
		return $registroMatriculado;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_ADD;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "add_registroMatriculado";
	}


}
