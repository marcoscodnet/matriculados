<?php

/**
 * componente grilla para matriculados
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 23-05-2013
 *
 */
class CMPMatriculadoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPMatriculadoFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new MatriculadoGridModel() );
		//$this->setRenderer( );
	}

}