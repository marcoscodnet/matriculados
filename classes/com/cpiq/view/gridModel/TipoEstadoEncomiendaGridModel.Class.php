<?php

/**
 * GridModel para TipoEstadoEncomienda
 *
 * @author Marcos
 * @since 03-10-2013
 */
class TipoEstadoEncomiendaGridModel extends GridModel {

	public function TipoEstadoEncomiendaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		//acciones sobre la lista
		$this->buildAction("add_tipoEstadoEncomienda_init", "add_tipoEstadoEncomienda_init", CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getTipoEstadoEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "tipoEstadoEncomienda", CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA, true, true, true, false, 500, 750);
	}


}
?>