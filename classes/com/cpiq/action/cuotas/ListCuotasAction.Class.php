<?php

/**
 * Acción para listar cuotas.
 *
 * @author Marcos
 * @since 27-06-2013
 *
 */
class ListCuotasAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPCuotaGrid();
	}



}
