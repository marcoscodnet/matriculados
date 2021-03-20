<?php

/**
 * Manager para TipoTitulo
 *
 * @author Bernardo
 * @since 17-05-2013
 */
class TipoTituloManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getTipoTituloDAO();
	}

}
?>
