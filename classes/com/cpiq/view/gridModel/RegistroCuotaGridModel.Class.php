<?php

/**
 * GridModel para Registro Cuota
 *
 * @author Marcos
 * @since 04-07-2013
 */
class RegistroCuotaGridModel extends GridModel {

	public function RegistroCuotaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "registro.sigla", CPIQ_LBL_REGISTRO_SIGLA, 50, CDT_CMP_GRID_TEXTALIGN_CENTER, "$tRegistro.sigla" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$column = GridModelBuilder::buildColumn( "year", CPIQ_LBL_REGISTRO_CUOTA_YEAR, 40, CDT_CMP_GRID_TEXTALIGN_CENTER, "year" );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModel( "year", CPIQ_LBL_REGISTRO_CUOTA_YEAR) );
		
		$column = GridModelBuilder::buildColumn( "importe", CPIQ_LBL_REGISTRO_CUOTA_IMPORTE, 40, CDT_CMP_GRID_TEXTALIGN_RIGHT, "importe", new GridMontoValueFormat() );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModel( "importe", CPIQ_LBL_REGISTRO_CUOTA_IMPORTE) );
		
		$this->buildAction("add_registroCuota_init", "add_registroCuota_init", CPIQ_MSG_REGISTRO_CUOTA_TITLE_ADD, "image", "add");
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_REGISTRO_CUOTA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getRegistroCuotaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "registroCuota", CPIQ_LBL_REGISTRO_CUOTA, true, true, true, false, 500, 750);
	}


}
?>