<?php

/**
 * Acción para inicializar el contexto
 * para pagar una encomienda
 *
 * @author Marcos
 * @since 17-10-2013
 *
 */

class PagarEncomiendaInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPPagarEncomiendaForm($action);
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$pagarEncomienda = new PagarEncomienda();
		
		
		
		$encomienda_oid = CdtUtils::getParam('id');
		if (!empty( $encomienda_oid )) {
			$encomienda = new Encomienda();
			$encomienda->setOid($encomienda_oid);
			$pagarEncomienda->setEncomienda($encomienda);
		}
			
	
		
		
		return $pagarEncomienda;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_ENCOMIENDA_PAGAR;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "pagarEncomienda";
	}


}
