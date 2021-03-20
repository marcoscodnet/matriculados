<?php

/**
 * Manager para ClaseTitulo
 *  
 * @author Marcos
 * @since 10-06-2013
 */
class ClaseTituloManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getClaseTituloDAO();
	}

}
?>
