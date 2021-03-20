<?php

/**
 * Acción para listar incumbencias tiposEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class ListIncumbenciasTiposEncomiendaAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPIncumbenciaTipoEncomiendaGrid();
	}



}
