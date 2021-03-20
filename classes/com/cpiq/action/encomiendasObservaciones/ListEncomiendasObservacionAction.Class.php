<?php

/**
 * Acción para listar observaciones de encomiendas.
 *
 * @author Marcos
 * @since 10-10-2013
 *
 */
class ListEncomiendasObservacionAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPEncomiendaObservacionGrid();
	}



}
