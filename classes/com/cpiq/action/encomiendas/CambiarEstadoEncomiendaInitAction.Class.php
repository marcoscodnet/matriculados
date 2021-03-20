<?php

/**
 * Acción para inicializar el contexto
 * para cambiar el estado de una encomienda
 *
 * @author Marcos
 * @since 11-10-2013
 *
 */

class CambiarEstadoEncomiendaInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPCambiarEstadoEncomiendaForm($action);
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$cambiarEstadoEncomienda = new CambiarEstadoEncomienda();
		
		
		
		$encomienda_oid = CdtUtils::getParam('id');
		if (!empty( $encomienda_oid )) {
			$encomienda = new Encomienda();
			$encomienda->setOid($encomienda_oid);
			$cambiarEstadoEncomienda->setEncomienda($encomienda);
		}
			
	
		
		
		return $cambiarEstadoEncomienda;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_ENCOMIENDA_CAMBIAR_ESTADO;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "cambiarEstadoEncomienda";
	}


}
