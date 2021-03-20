<?php

/**
 * GridModel para Concepto
 *
 * @author Marcos
 * @since 25-07-2013
 */
class ConceptoGridModel extends GridModel {

	public function ConceptoGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_CONCEPTO_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$column = GridModelBuilder::buildColumn( "coeficiente", CPIQ_LBL_CONCEPTO_COEFICIENTE, 20, "","",new GridCoeficienteValueFormat() ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
		
		$tTipoAsignado = DAOFactory::getTipoAsignadoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "tipoAsignado.nombre", CPIQ_LBL_CONCEPTO_ASIGNADO, 20, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tTipoAsignado.nombre" );
		$this->addColumn( $column );	
		
		//acciones sobre la lista
		$this->buildAction("add_concepto_init", "add_concepto_init", CPIQ_MSG_CONCEPTO_TITLE_ADD, "image", "add");
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_CONCEPTO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getConceptoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "concepto", CPIQ_LBL_CONCEPTO, true, true, true, false, 500, 750);
	}


}
?>