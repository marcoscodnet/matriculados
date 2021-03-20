<?php

/**
 * Acción para listar títulos.
 *
 * @author Marcos
 * @since 12-06-2013
 *
 */
class ListTitulosAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPTituloGrid();
	}



}
