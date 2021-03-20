<?php

/**
 * Acción para listar encomiendas.
 *
 * @author Marcos
 * @since 03-10-2013
 *
 */
class ListEncomiendasAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPEncomiendaGrid();
	}



}
