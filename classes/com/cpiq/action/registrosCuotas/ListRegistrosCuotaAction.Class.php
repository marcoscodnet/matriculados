<?php

/**
 * Acción para listar registros cuotas.
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class ListRegistrosCuotaAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPRegistroCuotaGrid();
	}



}
