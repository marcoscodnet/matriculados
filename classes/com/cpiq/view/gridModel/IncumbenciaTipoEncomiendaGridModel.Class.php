<?php

/**
 * GridModel para Incumbencia TipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 */
class IncumbenciaTipoEncomiendaGridModel extends GridModel {

	public function IncumbenciaTipoEncomiendaGridModel() {

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
		
		$tTipoEncomienda = DAOFactory::getTipoEncomiendaDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "tipoEncomienda.nombre", CPIQ_LBL_TIPO_ENCOMIENDA, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tTipoEncomienda.nombre" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$this->buildAction("add_incumbenciaTipoEncomienda_init", "add_incumbenciaTipoEncomienda_init", CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_INCUMBENCIA_TIPO_ENCOMIENDA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getIncumbenciaTipoEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {
		
		return $this->getDefaultRowActions($item, "incumbenciaTipoEncomienda", CPIQ_LBL_INCUMBENCIA_TIPO_ENCOMIENDA, true, true, true, false, 500, 750);
	}


}
?>