<?php

/**
 * Acción para dar de alta un título
 *
 * @author Marcos
 * @since 12-06-2013
 *
 */
class AddTituloAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPTituloForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oTitulo = new Titulo();
		$oUser = CdtSecureUtils::getUserLogged();
		$oTitulo->setUser($oUser);
		$oTitulo->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oTitulo;
	}

	protected function getEntityManager(){
		return ManagerFactory::getTituloManager();
	}



	/*
	 protected function getInfoMessage( $entity, $result ){
		$msg = "El cliente " . $entity->getNombre() . " fue agregado satisfactoriamente";
		CdtUtils::setRequestInfo(1, $msg);
		return $msg;
		}*/


}
