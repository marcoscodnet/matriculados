<?php 

/**
 * Acción para quitar un especialidad de encomienda.
 * Es sólo en sesión para ir armando la encomienda.
 * 
 * @author Bernardo
 * @since 08-10-2013
 * 
 */
class DeleteEncomiendaEspecialidadSessionAction extends EditEntityAction{

	protected function edit( $entity ){
		
		$especialidad = CdtUtils::getParam("item_oid");
		
		//el oid representa el dato "especialidad" ya que no hay entity relacionada
		$this->getEntityManager()->delete( $especialidad );

		
		//vamos a retornar por json los especialidades de la encomienda.
		
		//usamos el renderer para reutilizar lo que mostramos de los especialidades.
		$renderer = new CMPEncomiendaFormRenderer();
		$especialidades = array();
		foreach ($this->getEntityManager()->getEntities(new CdtSearchCriteria()) as $especialidad) {
			
			$especialidades[] = $renderer->buildArrayEspecialidad($especialidad);
		}		
		
		return array("especialidades" => $especialidades, 
						"especialidadColumns" => $renderer->getEspecialidadColumns(),
						"especialidadColumnsAlign" => $renderer->getEspecialidadColumnsAlign(),
						"especialidadColumnsLabels" => $renderer->getEspecialidadColumnsLabels());
	}


	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPEncomiendaEspecialidadForm();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new EncomiendaEspecialidad();
	}
	
	protected function getEntityManager(){
		return new EncomiendaEspecialidadSessionManager();
	}

}
