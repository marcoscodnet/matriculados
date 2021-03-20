<?php

/**
 * GridModel para Pais
 *
 * @author Marcos
 * @since 28-05-2013
 */
class PaisGridModel extends GridModel {

	public function PaisGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_PAIS_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		//acciones sobre la lista
		$this->buildAction("add_pais_init", "add_pais_init", CPIQ_MSG_PAIS_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_PAIS_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getPaisManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "pais", CPIQ_LBL_PAIS, true, true, true, false, 500, 750);
	}

	public function getDefaultFilterField() {
        return "oid";
    }

    public function getDefaultOrderField(){
		return "oid";
	}
	
}
?>