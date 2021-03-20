<?php

/**
 * Acción para dar de alta un tipo de documento
 *
 * @author Marcos
 * @since 30-05-2013
 *
 */
class AddTipoDocumentoAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPTipoDocumentoForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new TipoDocumento();
	}

	protected function getEntityManager(){
		return ManagerFactory::getTipoDocumentoManager();
	}



	


}
