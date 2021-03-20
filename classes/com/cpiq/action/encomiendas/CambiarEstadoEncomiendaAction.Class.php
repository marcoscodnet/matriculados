<?php

/**
 * Acción para cambiar el estado de la encomienda
 *
 * @author Marcos
 * @since 11-10-2013
 *
 */
class CambiarEstadoEncomiendaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		
		$this->getEntityManager()->cambiarEstado($entity->getEncomienda(),$entity->getTipoEstadoEncomienda() );
		$result["oid"] = $entity->getOid();		
		return $result;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPCambiarEstadoEncomiendaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		
		return new CambiarEstadoEncomienda();
	}

	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaManager();
	}



	


}
