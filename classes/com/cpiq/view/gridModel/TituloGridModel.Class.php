<?php

/**
 * GridModel para Título
 *
 * @author Marcos
 * @since 12-06-2013
 */
class TituloGridModel extends GridModel {

	public function TituloGridModel() {

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
		
		/*$column = GridModelBuilder::buildColumn( "matricula", CPIQ_LBL_TITULO_MATRICULA, 40, CDT_CMP_GRID_TEXTALIGN_CENTER, "matricula" );
		$this->addColumn( $column );*/
		$column = GridModelBuilder::buildColumn( "matriculado.oid", CPIQ_LBL_TITULO_MATRICULA, 20,CDT_CMP_GRID_TEXTALIGN_CENTER, "",new GridMatriculaValueFormat()  );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModel( "matricula", CPIQ_LBL_TITULO_MATRICULA) );
		
		$column = GridModelBuilder::buildColumn( "tituloPrincipal", CPIQ_LBL_TITULO_PRINCIPAL, 20, CDT_CMP_GRID_TEXTALIGN_CENTER, "",new GridTituloPrincipalValueFormat()  ); 
		$this->addColumn( $column );
		
		$tTipoTitulo = DAOFactory::getTipoTituloDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "tipoTitulo.nombre", CPIQ_LBL_TITULO_TIPO_TITULO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tTipoTitulo.nombre" );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$tEntidadEmisora = DAOFactory::getEntidadEmisoraDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "entidadEmisora.nombre", CPIQ_LBL_TITULO_ENTIDAD_EMISORA, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tEntidadEmisora.nombre" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaExpedicion", CPIQ_LBL_TITULO_FECHA_EXPEDICION, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CPIQ_DATE_FORMAT) ); 
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "fechaMatriculacion", CPIQ_LBL_TITULO_FECHA_MATRICULACION, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CPIQ_DATE_FORMAT) ); 
		$this->addColumn( $column );
		
		
		
		
		$this->buildAction("add_titulo_init", "add_titulo_init", CPIQ_MSG_TITULO_TITLE_ADD, "image", "add");
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_TITULO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getTituloManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "titulo", CPIQ_LBL_TITULO, true, true, true, false, 500, 750);
		
	}


}
?>