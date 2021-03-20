<?php

/**
 * GridModel para Cuota
 *
 * @author Marcos
 * @since 27-06-2013
 */
class CuotaGridModel extends GridModel {

	public function CuotaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_CUOTA_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$column = GridModelBuilder::buildColumn( "year", CPIQ_LBL_CUOTA_YEAR, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		
			
		
		//acciones sobre la lista
		$this->buildAction("add_cuota_init", "add_cuota_init", CPIQ_MSG_CUOTA_TITLE_ADD, "image", "add");
		$this->buildAction("masiva_cuotasGenerada", "masiva_cuotasGenerada", CPIQ_MSG_CUOTA_GENERADA_TITLE_MASIVA, "image", "process");
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_CUOTA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getCuotaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "cuota", CPIQ_LBL_CUOTA, true, true, true, false, 500, 750);
	}


}
?>