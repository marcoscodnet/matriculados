<?php

/**
 * Acción para dar de alta un registro matriculado
 *
 * @author Marcos
 * @since 19-09-2013
 *
 */
class AddRegistroMatriculadoAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPRegistroMatriculadoForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oRegistroMatriculado = new RegistroMatriculado();
		$oUser = CdtSecureUtils::getUserLogged();
		$oRegistroMatriculado->setUser($oUser);
		$oRegistroMatriculado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oRegistroMatriculado;
	}

	protected function getEntityManager(){
		return ManagerFactory::getRegistroMatriculadoManager();
	}



	


}
