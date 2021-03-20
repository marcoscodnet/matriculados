<?php

/**
 * Manager para SecuenciaTitulo
 *  
 * @author Marcos
 * @since 10-06-2013
 */
class SecuenciaTituloManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getSecuenciaTituloDAO();
	}

}
?>
