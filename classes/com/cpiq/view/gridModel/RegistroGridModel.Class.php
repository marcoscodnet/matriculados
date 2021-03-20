<?php

/**
 * GridModel para Registro
 *
 * @author Marcos
 * @since 04-07-2013
 */
class RegistroGridModel extends GridModel {

	public function RegistroGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_REGISTRO_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$column = GridModelBuilder::buildColumn( "sigla", CPIQ_LBL_REGISTRO_SIGLA, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		
			
		
		//acciones sobre la lista
		$this->buildAction("add_registro_init", "add_registro_init", CPIQ_MSG_REGISTRO_TITLE_ADD, "image", "add");
		$this->buildAction("masiva_registrosCuotaMatriculado", "masiva_registrosCuotaMatriculado", CPIQ_MSG_CUOTA_GENERADA_TITLE_MASIVA, "image", "process");
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_REGISTRO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getRegistroManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		$actions = $this->getDefaultRowActions($item, "registro", CPIQ_LBL_REGISTRO, true, true, true, false, 500, 750);
		
		$action = $this->buildRowAction("list_registrosCuota", "list_registrosCuota", CPIQ_MSG_REGISTRO_CUOTA_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
		$actions->addItem( $action );
		
		return $actions;
	}


}
?>