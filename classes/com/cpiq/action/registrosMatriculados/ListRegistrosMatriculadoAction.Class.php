<?php

/**
 * Acción para listar registros matriculados.
 *
 * @author Marcos
 * @since 19-09-2013
 *
 */
class ListRegistrosMatriculadoAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPRegistroMatriculadoGrid();
	}



}
