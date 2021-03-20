<?php

/**
 * GridModel para SecuenciaTitulo
 *
 * @author Marcos
 * @since 10-06-2013
 */
class SecuenciaTituloGridModel extends GridModel {

	public function SecuenciaTituloGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_SECUENCIA_TITULO_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$column = GridModelBuilder::buildColumn( "ultMatricula", CPIQ_LBL_SECUENCIA_TITULO_ULT_MATRICULA, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		//acciones sobre la lista
		$this->buildAction("add_secuenciaTitulo_init", "add_secuenciaTitulo_init", CPIQ_MSG_SECUENCIA_TITULO_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_SECUENCIA_TITULO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getSecuenciaTituloManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "secuenciaTitulo", CPIQ_LBL_SECUENCIA_TITULO, true, true, true, false, 500, 750);
	}


}
?>