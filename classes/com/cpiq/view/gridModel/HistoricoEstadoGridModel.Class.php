<?php

/**
 * GridModel para Histórico Estado
 *
 * @author Marcos
 * @since 17-06-2013
 */
class HistoricoEstadoGridModel extends GridModel {

	public function HistoricoEstadoGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "matriculado.apellido,matriculado.nombre", CPIQ_LBL_MATRICULADO, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tMatriculado.nombre,$tMatriculado.apellido" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$tEstadoMatriculado = DAOFactory::getEstadoMatriculadoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "estadoMatriculado.nombre", CPIQ_LBL_HISTORICO_ESTADO_ESTADO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tEstadoMatriculado.nombre" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaDesde", CPIQ_LBL_HISTORICO_ESTADO_FECHA_DESDE, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CPIQ_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaHasta", CPIQ_LBL_HISTORICO_ESTADO_FECHA_HASTA, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CPIQ_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "motivo", CPIQ_LBL_HISTORICO_ESTADO_MOTIVO, 40 );
		$this->addColumn( $column );
		
		//acciones sobre la lista
		$this->buildAction("cambiarEstadoMatriculado_init", "cambiarEstadoMatriculado_init", CPIQ_MSG_HISTORICO_ESTADO_CAMBIAR_ESTADO, "image", "edit");
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_HISTORICO_ESTADO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getHistoricoEstadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		
		
		//$actions = $this->getDefaultRowActions($item, "matriculado", CPIQ_LBL_MATRICULADO, false, true, true, false, 500, 750);
		
		$actions = new ItemCollection();
		
		
		
		return $actions;
	}


}
?>