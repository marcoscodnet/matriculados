<?php

/**
 * Acción para listar conceptos.
 *
 * @author Marcos
 * @since 25-07-2013
 *
 */
class ListConceptosAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPConceptoGrid();
	}



}
