<?php

/**
 * Acción para listar registros.
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class ListRegistrosAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPRegistroGrid();
	}



}
