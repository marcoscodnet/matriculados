<?php

/**
 * GridModel para TipoTitulo
 *
 * @author Bernardo
 * @since 17-05-2013
 */
class TipoTituloGridModel extends GridModel {

	public function TipoTituloGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_TIPO_TITULO_NOMBRE, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$tClaseTitulo = DAOFactory::getClaseTituloDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "claseTitulo.nombre", CPIQ_LBL_TIPO_TITULO_CLASE_TITULO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tClaseTitulo.nombre");
		$this->addColumn( $column );
		
		$tSecuenciaTitulo = DAOFactory::getSecuenciaTituloDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "secuenciaTitulo.nombre,secuenciaTitulo.ultMatricula", CPIQ_LBL_TIPO_TITULO_SECUENCIA_TITULO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tSecuenciaTitulo.nombre,secuenciaTitulo.ultMatricula");
		$this->addColumn( $column );
		
		//acciones sobre la lista
		$this->buildAction("add_tipoTitulo_init", "add_tipoTitulo_init", CPIQ_MSG_TIPO_TITULO_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_TIPO_TITULO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getTipoTituloManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "tipoTitulo", CPIQ_LBL_TIPO_TITULO, true, true, true, false, 500, 750);
	}


}
?>