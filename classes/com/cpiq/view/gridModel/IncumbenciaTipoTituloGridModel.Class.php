<?php

/**
 * GridModel para Incumbencia TipoTitulo
 *
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaTipoTituloGridModel extends GridModel {

	public function IncumbenciaTipoTituloGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$tIncumbencia = DAOFactory::getIncumbenciaDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "incumbencia.nombre", CPIQ_LBL_INCUMBENCIA, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tIncumbencia.nombre" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$tTipoTitulo = DAOFactory::getTipoTituloDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "tipoTitulo.nombre", CPIQ_LBL_TIPO_TITULO, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tTipoTitulo.nombre" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		
		$this->buildAction("add_incumbenciaTipoTitulo_init", "add_incumbenciaTipoTitulo_init", CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_INCUMBENCIA_TIPO_TITULO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getIncumbenciaTipoTituloManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "incumbenciaTipoTitulo", CPIQ_LBL_INCUMBENCIA_TIPO_TITULO, true, true, true, false, 500, 750);
		
	}


}
?>