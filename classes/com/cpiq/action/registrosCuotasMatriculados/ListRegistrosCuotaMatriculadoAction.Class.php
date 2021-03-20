<?php

/**
 * Acción para listar registros matriculados.
 *
 * @author Marcos
 * @since 20-03-2017
 *
 */
class ListRegistrosCuotaMatriculadoAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPRegistroCuotaMatriculadoGrid();
	}



}
