<?php

/**
 * Manager para Pais
 *  
 * @author Marcos
 * @since 28-05-2013
 */
class PaisManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getPaisDAO();
	}

}
?>
