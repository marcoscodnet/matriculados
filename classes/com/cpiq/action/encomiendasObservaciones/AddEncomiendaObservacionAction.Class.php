<?php

/**
 * Acción para dar de alta una observacion
 *
 * @author Marcos
 * @since 11-10-2013
 *
 */
class AddEncomiendaObservacionAction extends AddEntityAction{

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPEncomiendaObservacionForm();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
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



	


}
