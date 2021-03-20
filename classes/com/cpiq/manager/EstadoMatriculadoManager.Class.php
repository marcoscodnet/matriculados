<?php

/**
 * Manager para EstadoMatriculado
 *  
 * @author Marcos
 * @since 06-06-2013
 */
class EstadoMatriculadoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getEstadoMatriculadoDAO();
	}

}
?>
