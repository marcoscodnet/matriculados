<?php

/**
 * Manager para TipoPago
 *  
 * @author Marcos
 * @since 17-10-2013
 */
class TipoPagoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getTipoPagoDAO();
	}

}
?>
