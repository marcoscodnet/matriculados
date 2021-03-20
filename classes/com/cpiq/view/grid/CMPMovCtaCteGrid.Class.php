<?php

/**
 * componente grilla para movimeintos de cta cte
 *
 * @author Marcos
 * @since 31-10-2013
 *
 */
class CMPMovCtaCteGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPMovCtaCteFilter();
		
		
		
		if (CPIQUtils::isMatriculadoLogged()) {
            //que se muestren sólo los movimientos del matriculado
            $oMatriculado = CPIQUtils::getMatriculadoLogged();
            $filter->setMatriculado( $oMatriculado );
			$filter->saveProperties();
        }
		
		
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new MovCtaCteGridModel() );
		//$this->setRenderer( );
	}

}