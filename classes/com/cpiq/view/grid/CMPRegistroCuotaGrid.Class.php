<?php

/**
 * componente grilla para registros cuotas
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class CMPRegistroCuotaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPRegistroCuotaFilter();
		
		$registro_oid = CdtUtils::getParam('id');
			
		if (!empty( $registro_oid )) {
			$registro = new Registro();
			$registro->setOid($registro_oid);
			$filter->setRegistro( $registro );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new RegistroCuotaGridModel() );
		//$this->setRenderer( );
	}

}