<?php

/**
 * Manager para TipoDocumento
 *  
 * @author Bernardo
 * @since 20-03-2013
 */
class TipoDocumentoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getTipoDocumentoDAO();
	}

}
?>
