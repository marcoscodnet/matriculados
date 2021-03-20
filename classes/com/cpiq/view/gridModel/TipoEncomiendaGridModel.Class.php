<?php

/**
 * GridModel para TipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 */
class TipoEncomiendaGridModel extends GridModel {

	public function TipoEncomiendaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_TIPO_ENCOMIENDA_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		
		
		
			
		
		//acciones sobre la lista
		$this->buildAction("add_tipoEncomienda_init", "add_tipoEncomienda_init", CPIQ_MSG_TIPO_ENCOMIENDA_TITLE_ADD, "image", "add");
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_TIPO_ENCOMIENDA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getTipoEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		$actions = $this->getDefaultRowActions($item, "tipoEncomienda", CPIQ_LBL_TIPO_ENCOMIENDA, true, true, true, false, 500, 750);
		
		$action = $this->buildRowAction("list_incumbenciasTiposEncomienda", "list_incumbenciasTiposEncomienda", CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
		$actions->addItem( $action );
		
		return $actions;
	}


}
?>