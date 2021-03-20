<?php

/**
 * Acción para listar paises.
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class ListPaisesAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPPaisGrid();
	}



}
