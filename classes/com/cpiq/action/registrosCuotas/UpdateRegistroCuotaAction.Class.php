<?php

/**
 * Acción para actualizar un registro cuota
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class UpdateRegistroCuotaAction extends UpdateEntityAction{

	public function getNewFormInstance(){
		return new CMPRegistroCuotaForm();
	}

	public function getNewEntityInstance(){
		$oRegistroCuota = new RegistroCuota();
		$oUser = CdtSecureUtils::getUserLogged();
		$oRegistroCuota->setUser($oUser);
		$oRegistroCuota->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oRegistroCuota;
	}

	protected function getEntityManager(){
		return ManagerFactory::getRegistroCuotaManager();
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
		return 'update_registroCuota_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_registroCuota_error';
	}



}
