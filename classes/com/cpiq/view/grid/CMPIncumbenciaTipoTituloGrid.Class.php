<?php

/**
 * componente grilla para incumbencias tiposTitulo.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class CMPIncumbenciaTipoTituloGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPIncumbenciaTipoTituloFilter();
		
		$incumbencia_oid = CdtUtils::getParam('id');
			
		if (!empty( $incumbencia_oid )) {
			$incumbencia = new Incumbencia();
			$incumbencia->setOid($incumbencia_oid);
			$filter->setIncumbencia( $incumbencia );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new IncumbenciaTipoTituloGridModel() );
		//$this->setRenderer( );
	}

}