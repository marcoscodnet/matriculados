<?php

/**
 * Acción para listar incumbencias.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class ListIncumbenciasAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPIncumbenciaGrid();
	}



}
