<?php

/**
 * componente grilla para registros matriculados
 *
 * @author Marcos
 * @since 20-03-2017
 *
 */
class CMPRegistroCuotaMatriculadoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPRegistroCuotaMatriculadoFilter();
		
		$matriculado_oid = CdtUtils::getParam('id');
			
		if (!empty( $matriculado_oid )) {
			$matriculado = new Matriculado();
			$matriculado->setOid($matriculado_oid);
			$filter->setMatriculado( $matriculado );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new RegistroCuotaMatriculadoGridModel() );
		//$this->setRenderer( );
	}

}