<?php

/**
 * Acción para dar de alta una encomienda
 *
 * @author Bernardo
 * @since 09-10-2013
 *
 */
class AddEncomiendaAction extends AddEntityAction{

	
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
	
	
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		$form = new CMPEncomiendaForm();
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
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

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_encomienda_success';
	
	}

}
