<?php

/**
 * GridModel para observaciones de la encomienda
 *
 * @author Marcos
 * @since 10-10-2013
 */
class EncomiendaObservacionGridModel extends GridModel {

	public function EncomiendaObservacionGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "encomienda.numero", CPIQ_LBL_ENCOMIENDA, 20, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tEncomienda.numero" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$column = GridModelBuilder::buildColumn( "observacion", CPIQ_LBL_ENCOMIENDA_OBSERVACION_OBSERVACION, 100 );
		$this->addColumn( $column );
        
		$this->buildAction("add_encomiendaObservacion_init", "add_encomiendaObservacion_init", CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_ADD, "image", "add");
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getEncomiendaObservacionManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {
		
		return $this->getDefaultRowActions($item, "encomiendaObservacion", CPIQ_LBL_ENCOMIENDA_OBSERVACION, true, true, true, false, 500, 750);
		
	}


}
?>