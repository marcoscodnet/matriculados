<?php

/**
 * Manager para TipoEstadoEncomienda
 *  
 * @author Marcos
 * @since 03-10-2013
 */
class TipoEstadoEncomiendaManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getTipoEstadoEncomiendaDAO();
	}

}
?>
