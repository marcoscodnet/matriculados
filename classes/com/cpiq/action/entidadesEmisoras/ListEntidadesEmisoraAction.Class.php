<?php

/**
 * Acción para listar entidades emisoras.
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */
class ListEntidadesEmisoraAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPEntidadEmisoraGrid();
	}



}
