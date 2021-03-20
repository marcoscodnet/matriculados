<?php

/**
 * Acción para listar tiposEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class ListTiposEncomiendaAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPTipoEncomiendaGrid();
	}



}
