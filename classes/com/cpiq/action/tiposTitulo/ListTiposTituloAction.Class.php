<?php

/**
 * Acción para listar tipos de título.
 *
 * @author Bernardo
 * @since 17-05-2013
 *
 */
class ListTiposTituloAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPTipoTituloGrid();
	}



}
