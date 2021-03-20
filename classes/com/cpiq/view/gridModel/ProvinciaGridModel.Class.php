<?php

/**
 * GridModel para Provincia
 *
 * @author Marcos
 * @since 28-05-2013
 */
class ProvinciaGridModel extends GridModel {

	public function ProvinciaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_PROVINCIA_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$tPais = DAOFactory::getPaisDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "pais.nombre", CPIQ_LBL_PROVINCIA_PAIS, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tPais.nombre");
		$this->addColumn( $column );

		//acciones sobre la lista
		$this->buildAction("add_provincia_init", "add_provincia_init", CPIQ_MSG_PROVINCIA_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_PROVINCIA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getProvinciaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "provincia", CPIQ_LBL_PROVINCIA, true, true, true, false, 500, 750);
	}

	public function getDefaultFilterField() {
        return "oid";
    }

    public function getDefaultOrderField(){
		return "oid";
	}
	
}
?>