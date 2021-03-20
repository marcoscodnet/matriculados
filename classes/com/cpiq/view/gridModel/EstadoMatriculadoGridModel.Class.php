<?php

/**
 * GridModel para EstadoMatriculado
 *
 * @author Marcos
 * @since 07-06-2013
 */
class EstadoMatriculadoGridModel extends GridModel {

	public function EstadoMatriculadoGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_ESTADO_MATRICULADO_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		//acciones sobre la lista
		$this->buildAction("add_estadoMatriculado_init", "add_estadoMatriculado_init", CPIQ_MSG_ESTADO_MATRICULADO_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_ESTADO_MATRICULADO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getEstadoMatriculadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "estadoMatriculado", CPIQ_LBL_ESTADO_MATRICULADO, true, true, true, false, 500, 750);
	}


}
?>