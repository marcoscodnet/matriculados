<?php

/**
 * Acción para cambiar el estado del matriculado
 *
 * @author Marcos
 * @since 25-10-2013
 *
 */
class CambiarEstadoMatriculadoAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		
		$this->getEntityManager()->cambiarEstado($entity->getMatriculado(),$entity->getEstadoMatriculado(),$entity->getMotivo() );
		$result["oid"] = $entity->getOid();		
		return $result;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPCambiarEstadoMatriculadoForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		
		return new CambiarEstadoMatriculado();
	}

	protected function getEntityManager(){
		return ManagerFactory::getMatriculadoManager();
	}



	


}
