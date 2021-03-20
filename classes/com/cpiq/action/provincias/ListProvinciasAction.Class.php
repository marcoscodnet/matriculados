<?php

/**
 * Acción para listar provincias.
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class ListProvinciasAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPProvinciaGrid();
	}



}
