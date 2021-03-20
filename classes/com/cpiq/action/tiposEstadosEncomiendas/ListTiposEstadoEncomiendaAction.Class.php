<?php

/**
 * Acción para listar tipos de estados de encomienda .
 *
 * @author Marcos
 * @since 03-10-2013
 *
 */
class ListTiposEstadoEncomiendaAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPTipoEstadoEncomiendaGrid();
	}



}
