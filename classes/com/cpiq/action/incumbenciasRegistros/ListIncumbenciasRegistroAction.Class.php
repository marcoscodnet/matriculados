<?php

/**
 * Acción para listar incumbencias registros.
 *
 * @author Marcos
 * @since 13-12-2013
 *
 */
class ListIncumbenciasRegistroAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPIncumbenciaRegistroGrid();
	}



}
