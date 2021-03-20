<?php

/**
 * AcciÃ³n para listar movimientos de cta cte.
 *
 * @author Marcos
 * @since 31-10-2013
 *
 */
class ListMovCtaCtesAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPMovCtaCteGrid();
	}

	

}
