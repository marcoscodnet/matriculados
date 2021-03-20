<?php

/**
 * Acción para actualizar una observacion
 *
 * @author Marcos
 * @since 11-10-2013
 *
 */
class UpdateEncomiendaObservacionAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPEncomiendaObservacionForm();
	}

	public function getNewEntityInstance(){
		$oEncomiendaObservacion = new EncomiendaObservacion();
		$oUser = CdtSecureUtils::getUserLogged();
		$oEncomiendaObservacion->setUser($oUser);
		$oEncomiendaObservacion->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oEncomiendaObservacion;
	}

	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaObservacionManager();
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
		return 'update_encomiendaObservacion_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_encomiendaObservacion_error';
	}



}
