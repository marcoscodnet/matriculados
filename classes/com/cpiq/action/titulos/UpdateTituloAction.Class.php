<?php

/**
 * Acción para actualizar un título
 *
 * @author Marcos
 * @since 12-06-2013
 *
 */
class UpdateTituloAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPTituloForm();
	}

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
		$msg = "El cliente " . $entity->getNombre() . " fue actualizado satisfactoriamente";
		CdtUtils::setRequestInfo(1, $msg);
		return $msg;
		}*/

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'update_titulo_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_titulo_error';
	}



}
