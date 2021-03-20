<?php 

/**
 * Acción para dar de alta un especialidad de encomienda.
 * El alta es sólo en sesión para ir armando la encomienda.
 * 
 * @author Bernardo
 * @since 08-10-2013
 * 
 */
class AddEncomiendaEspecialidadSessionAction extends AddEntityAction{

	protected function edit( $entity ){
		
		parent::edit( $entity );
		
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