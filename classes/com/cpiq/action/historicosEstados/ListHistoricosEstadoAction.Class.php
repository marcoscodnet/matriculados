<?php

/**
 * AcciÃ³n para listar históricos estados.
 *
 * @author Marcos
 * @since 25-10-2013
 *
 */
class ListHistoricosEstadoAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPHistoricoEstadoGrid();
	}



}
