<?php

/**
 * Acción para listar incumbencias tiposTitulo.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class ListIncumbenciasTiposTituloAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPIncumbenciaTipoTituloGrid();
	}



}
