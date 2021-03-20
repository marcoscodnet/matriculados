<?php

/**
 * Acción para pagar encomienda
 *
 * @author Marcos
 * @since 17-10-2013
 *
 */
class PagarEncomiendaAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		
		$this->getEntityManager()->pagar($entity );
		$result["oid"] = $entity->getOid();		
		return $result;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPPagarEncomiendaForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		
		return new PagarEncomienda();
	}

	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaManager();
	}



	


}
