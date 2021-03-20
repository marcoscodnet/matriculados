<?php

/**
 * Acción para listar localidadaes.
 *
 * @author Bernardo
 * @since 27-05-2013
 *
 */
class ListLocalidadesAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPLocalidadGrid();
	}



}
