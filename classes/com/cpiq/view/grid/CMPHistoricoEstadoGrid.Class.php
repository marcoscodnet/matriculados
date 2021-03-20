<?php

/**
 * componente grilla para históricos estados
 *
 * @author Marcos
 * @since 25-10-2013
 *
 */
class CMPHistoricoEstadoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPHistoricoEstadoFilter();
		
		$matriculado_oid = CdtUtils::getParam('id');
			
		if (!empty( $matriculado_oid )) {
			$matriculado = new Matriculado();
			$matriculado->setOid($matriculado_oid);
			$filter->setMatriculado( $matriculado );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new HistoricoEstadoGridModel() );
		//$this->setRenderer( );
	}

}