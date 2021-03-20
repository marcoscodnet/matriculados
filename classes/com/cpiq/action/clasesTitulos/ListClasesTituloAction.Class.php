<?php

/**
 * Acción para listar clases títulos.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class ListClasesTituloAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPClaseTituloGrid();
	}



}
