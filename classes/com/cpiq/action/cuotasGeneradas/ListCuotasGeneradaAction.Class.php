<?php

/**
 * Acción para listar cuotas generadas.
 *
 * @author Marcos
 * @since 29-07-2013
 *
 */
class ListCuotasGeneradaAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPCuotaGeneradaGrid();
	}



}
