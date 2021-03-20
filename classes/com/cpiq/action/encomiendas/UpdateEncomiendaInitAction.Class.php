<?php

/**
 * Acción para inicializar el contexto
 * para editar una encomienda.
 *
 * @author Marcos
 * @since 10-10-2013
 *
 */

class UpdateEncomiendaInitAction extends UpdateEntityInitAction {

	
	protected function getEntity(){

		$entity = parent::getEntity();

		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('encomienda_oid', $entity->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerEncomiendaEstado =  ManagerFactory::getEncomiendaEstadoManager();
		$oEncomiendaEstado = $managerEncomiendaEstado->getEntity($oCriteria);
		if (($oEncomiendaEstado->getTipoEstadoEncomienda()->getOid()!=CPIQ_ESTADO_ENCOMIENDA_SOLICITADA)) {
			
			throw new GenericException( CPIQ_MSG_ENCOMIENDA_MODIFICAR_PROHIBIDO );
		}
			
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('encomienda_oid', $entity->getOid(), '=');
		//profesionales.
		$profesionalesManager = new EncomiendaProfesionalManager();
		$entity->setProfesionales( $profesionalesManager->getEntities($oCriteria) );
		
		//especialidades.
		$especialidadesManager = new EncomiendaEspecialidadManager();
		$entity->setEspecialidades( $especialidadesManager->getEntities($oCriteria) );
		
		//registros.
		$registrosManager = new EncomiendaRegistroManager();
		$entity->setRegistros( $registrosManager->getEntities($oCriteria) );
			
		
		return $entity;
	}
	
	protected function parseEntity($entity, XTemplate $xtpl) {

		$manager = new EncomiendaEspecialidadSessionManager();
		$manager->setEntities( $entity->getEspecialidades() );
		
		$manager = new EncomiendaProfesionalSessionManager();
		$manager->setEntities( $entity->getProfesionales() );
		
		$manager = new EncomiendaRegistroSessionManager();
		$manager->setEntities( $entity->getRegistros() );
		
		parent::parseEntity($entity, $xtpl);
		
	}
	
	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPEncomiendaForm($action);
		$findTipEncomienda = $form->getInput("tipoEncomienda.oid");
		$findTipEncomienda->setIsEditable(false);
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new Encomienda();
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_ENCOMIENDA_TITLE_UPDATE;
	}

	/**
	 * retorna el action para el submit.
	 * @return string
	 */
	protected function getSubmitAction(){
		return "update_encomienda";
	}


}