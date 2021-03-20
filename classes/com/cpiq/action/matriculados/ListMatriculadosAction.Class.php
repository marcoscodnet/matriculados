<?php

/**
 * Acción para listar matriculados.
 *
 * @author Bernardo
 * @since 23-05-2013
 *
 */
class ListMatriculadosAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPMatriculadoGrid();
	}



}
