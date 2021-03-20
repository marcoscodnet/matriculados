<?php

/**
 * GridModel para Incumbencia Registros
 *
 * @author Marcos
 * @since 13-12-2013
 */
class IncumbenciaRegistroGridModel extends GridModel {

	public function IncumbenciaRegistroGridModel() {

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
		
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "registro.nombre", CPIQ_LBL_REGISTRO, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tRegistro.nombre" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		
		$this->buildAction("add_incumbenciaRegistro_init", "add_incumbenciaRegistro_init", CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_INCUMBENCIA_REGISTRO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getIncumbenciaRegistroManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "incumbenciaRegistro", CPIQ_LBL_INCUMBENCIA_REGISTRO, true, true, true, false, 500, 750);
		
	}


}
?>