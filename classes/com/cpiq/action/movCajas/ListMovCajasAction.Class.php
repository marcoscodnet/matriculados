<?php

/**
 * Acción para listar movimientos de caja.
 *
 * @author Marcos
 * @since 01-11-2013
 *
 */
class ListMovCajasAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPMovCajaGrid();
	}

	

}
