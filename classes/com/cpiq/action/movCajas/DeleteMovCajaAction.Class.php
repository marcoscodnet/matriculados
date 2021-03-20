<?php

/**
 * Acción para anular movimeinto.
 *
 * @author Marcos
 * @since 01-11-2013
 *
 */
class DeleteMovCajaAction extends DeleteEntityAction {

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/DeleteEntityAction::getEntityManager()
	 */
	protected function getEntityManager(){
		return ManagerFactory::getMovCajaManager();
	}
	
/**
     * (non-PHPdoc)
     * @see CdtEditAsyncAction::edit();
     */
    protected function edit($entity) {
        $id = CdtUtils::getParam('id');
        
        $this->getEntityManager()->anular($id);
    }

	

}
