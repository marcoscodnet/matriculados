<?php

/**
 * Acción para inicializar el contexto
 * para cambiar el estado de un matriculado
 *
 * @author Marcos
 * @since 25-10-2013
 *
 */

class CambiarEstadoMatriculadoInitAction extends EditEntityInitAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		return new CMPCambiarEstadoMatriculadoForm($action);
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$cambiarEstadoMatriculado = new CambiarEstadoMatriculado();
		
		
		
		/*$encomienda_oid = CdtUtils::getParam('id');
		if (!empty( $encomienda_oid )) {
			$encomienda = new Matriculado();
			$encomienda->setOid($encomienda_oid);
			$cambiarEstadoMatriculado->setMatriculado($encomienda);
		}*/
			
		$filter = new CMPHistoricoEstadoFilter();
		$filter->fillSavedProperties();
		$cambiarEstadoMatriculado->setMatriculado($filter->getMatriculado());
		
		
		return $cambiarEstadoMatriculado;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_HISTORICO_ESTADO_CAMBIAR_ESTADO;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "cambiarEstadoMatriculado";
	}


}
