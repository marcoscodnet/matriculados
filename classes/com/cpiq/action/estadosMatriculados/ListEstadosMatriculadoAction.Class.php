<?php

/**
 * Acción para listar estados.
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */
class ListEstadosMatriculadoAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPEstadoMatriculadoGrid();
	}



}
