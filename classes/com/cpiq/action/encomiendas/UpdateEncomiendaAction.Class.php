<?php

/**
 * Acción para actualizar una encomienda
 *
 * @author Marcos
 * @since 10-10-2013
 *
 */
class UpdateEncomiendaAction extends UpdateEntityAction{

	protected function getEntity() {
	
		$entity =  parent::getEntity();
	
		//agregamos las entidades relacionadas a la encomienda.
		
		//profesionales.
		$profesionalesManager = new EncomiendaProfesionalSessionManager();
		$entity->setProfesionales( $profesionalesManager->getEntities(new CdtSearchCriteria()) );
		
		//especialidades.
		$especialidadesManager = new EncomiendaEspecialidadSessionManager();
		$entity->setEspecialidades( $especialidadesManager->getEntities(new CdtSearchCriteria()) );
		
		//registros.
		$registrosManager = new EncomiendaRegistroSessionManager();
		$entity->setRegistros( $registrosManager->getEntities(new CdtSearchCriteria()) );
	
		return $entity;
	}
	
	public function getNewFormInstance(){
		return new CMPEncomiendaForm();
	}

	public function getNewEntityInstance(){
		$oEncomienda = new Encomienda();
		$oUser = CdtSecureUtils::getUserLogged();
		$oEncomienda->setUser($oUser);
		$oEncomienda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		return $oEncomienda;
	}

	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaManager();
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
		return 'update_encomienda_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'update_encomienda_error';
	}



}
