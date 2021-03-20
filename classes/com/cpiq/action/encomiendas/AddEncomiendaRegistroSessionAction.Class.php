<?php 

/**
 * Acción para dar de alta un registro de encomienda.
 * El alta es sólo en sesión para ir armando la encomienda.
 * 
 * @author Bernardo
 * @since 08-10-2013
 * 
 */
class AddEncomiendaRegistroSessionAction extends AddEntityAction{

	protected function edit( $entity ){
		
		parent::edit( $entity );
		
		//vamos a retornar por json los registros de la encomienda.
		
		//usamos el renderer para reutilizar lo que mostramos de los registros.
		$renderer = new CMPEncomiendaFormRenderer();
		$registros = array();
		foreach ($this->getEntityManager()->getEntities(new CdtSearchCriteria()) as $registro) {
			
			$registros[] = $renderer->buildArrayRegistro($registro);
		}		
		
		return array("registros" => $registros, 
						"registroColumns" => $renderer->getRegistroColumns(),
						"registroColumnsAlign" => $renderer->getRegistroColumnsAlign(),
						"registroColumnsLabels" => $renderer->getRegistroColumnsLabels());

	}


	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewFormInstance()
	 */
	public function getNewFormInstance(){
		return new CMPEncomiendaRegistroForm();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		return new EncomiendaRegistro();
	}
	
	protected function getEntityManager(){
		return new EncomiendaRegistroSessionManager();
	}
	
}