<?php

/**
 * GridModel para Localidad
 *
 * @author Bernardo
 * @since 27-05-2013
 */
class LocalidadGridModel extends GridModel {

	public function LocalidadGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_LOCALIDAD_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$tProvincia = DAOFactory::getProvinciaDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "provincia.nombre", CPIQ_LBL_LOCALIDAD_PROVINCIA, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tProvincia.nombre");
		$this->addColumn( $column );
		
		/*$column = GridModelBuilder::buildColumn( "codigoPostal", CPIQ_LBL_LOCALIDAD_CP, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );*/

		//acciones sobre la lista
		$this->buildAction("add_localidad_init", "add_localidad_init", CPIQ_MSG_LOCALIDAD_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_LOCALIDAD_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getLocalidadManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "localidad", CPIQ_LBL_LOCALIDAD, true, true, true, false, 500, 750);
	}

	public function getDefaultFilterField() {
        return "oid";
    }

    public function getDefaultOrderField(){
		return "oid";
	}
	
}
?>