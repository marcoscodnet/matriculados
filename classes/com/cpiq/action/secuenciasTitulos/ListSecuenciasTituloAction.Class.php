<?php

/**
 * Acción para listar secuencias títulos.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class ListSecuenciasTituloAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPSecuenciaTituloGrid();
	}



}
