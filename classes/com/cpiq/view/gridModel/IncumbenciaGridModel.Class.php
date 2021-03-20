<?php

/**
 * GridModel para Incumbencia
 *
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaGridModel extends GridModel {

	public function IncumbenciaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_INCUMBENCIA_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		
		
		
			
		
		//acciones sobre la lista
		$this->buildAction("add_incumbencia_init", "add_incumbencia_init", CPIQ_MSG_INCUMBENCIA_TITLE_ADD, "image", "add");
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_INCUMBENCIA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getIncumbenciaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		$actions = $this->getDefaultRowActions($item, "incumbencia", CPIQ_LBL_INCUMBENCIA, true, true, true, false, 500, 750);
		
		$action = $this->buildRowAction("list_incumbenciasTiposTitulo", "list_incumbenciasTiposTitulo", CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
		$actions->addItem( $action );
		
		$action = $this->buildRowAction("list_incumbenciasRegistro", "list_incumbenciasRegistro", CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
		$actions->addItem( $action );
		
		return $actions;
	}


}
?>