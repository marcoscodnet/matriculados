<?php

/**
 * Acción para dar de alta una estado matriculado
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */
class AddEstadoMatriculadoAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPEstadoMatriculadoForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new EstadoMatriculado();
	}

	protected function getEntityManager(){
		return ManagerFactory::getEstadoMatriculadoManager();
	}



	


}
