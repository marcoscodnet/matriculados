<?php

/**
 * Acción para listar tipos de documento.
 *
 * @author Marcos
 * @since 30-05-2013
 *
 */
class ListTiposDocumentoAction extends CMPEntityGridAction{


	protected function getComponent() {
		return new CMPTipoDocumentoGrid();
	}



}
