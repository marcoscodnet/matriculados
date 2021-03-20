<?php

/**
 * componente grilla para incumbencias registros.
 *
 * @author Marcos
 * @since 13-12-2013
 *
 */
class CMPIncumbenciaRegistroGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPIncumbenciaRegistroFilter();
		
		$incumbencia_oid = CdtUtils::getParam('id');
			
		if (!empty( $incumbencia_oid )) {
			$incumbencia = new Incumbencia();
			$incumbencia->setOid($incumbencia_oid);
			$filter->setIncumbencia( $incumbencia );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new IncumbenciaRegistroGridModel() );
		//$this->setRenderer( );
	}

}