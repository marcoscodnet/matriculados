<?php 

/**
 * Acción para quitar un profesional de encomienda.
 * Es sólo en sesión para ir armando la encomienda.
 * 
 * @author Bernardo
 * @since 08-10-2013
 * 
 */
class DeleteEncomiendaProfesionalSessionAction extends EditEntityAction{

	protected function edit( $entity ){
		
		$profesional = CdtUtils::getParam("item_oid");
		
		//el oid representa el dato "profesional" ya que no hay entity relacionada
		$this->getEntityManager()->delete( $profesional );

		
		//vamos a retornar por json los profesionales de la encomienda.
		
		//usamos el renderer para reutilizar lo que mostramos de los profesionales.
		$renderer = new CMPEncomiendaFormRenderer();
		$profesionales = array();
		foreach ($this->getEntityManager()->getEntities(new CdtSearchCriteria()) as $profesional) {
			
			$profesionales[] = $renderer->buildArrayProfesional($profesional);
		}		
		
		return array("profesionales" => $profesionales, 
						"profesionalColumns" => $renderer->getProfesionalColumns(),
						"profesionalColumnsAlign" => $renderer->getProfesionalColumnsAlign(),
						"profesionalColumnsLabels" => $renderer->getProfesionalColumnsLabels());
	}


	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPEncomiendaProfesionalForm();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new EncomiendaProfesional();
	}
	
	protected function getEntityManager(){
		return new EncomiendaProfesionalSessionManager();
	}

}
