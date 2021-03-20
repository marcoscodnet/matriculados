<?php

/**
 * GridModel para Matriculado
 *
 * @author Bernardo
 * @since 23-05-2013
 */
class MatriculadoGridModel extends GridModel {

	public function MatriculadoGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$column = GridModelBuilder::buildColumn( "apellido,nombre", CPIQ_LBL_MATRICULADO_APELLIDO.' '.CPIQ_LBL_MATRICULADO_NOMBRE, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "nombre,apellido" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		/*$column = GridModelBuilder::buildColumn( "apellido", CPIQ_LBL_MATRICULADO_APELLIDO, 50 ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );*/
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_TITULO_MATRICULA, 20,CDT_CMP_GRID_TEXTALIGN_CENTER, "",new GridMatriculaValueFormat()  );
		$this->addColumn( $column );
	

        $tTipoDocumento = DAOFactory::getTipoDocumentoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "tipoDocumento.nombre", CPIQ_LBL_MATRICULADO_TIPO_DOCUMENTO, 20, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tTipoDocumento.nombre" );
		$this->addColumn( $column );
		$column = GridModelBuilder::buildColumn( "nroDocumento", CPIQ_LBL_MATRICULADO_DOCUMENTO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "nroDocumento" );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModel( "nroDocumento", CPIQ_LBL_MATRICULADO_NRO_DOCUMENTO) );
		
		
		$column = GridModelBuilder::buildColumn( "email", CPIQ_LBL_MATRICULADO_EMAIL, 40 );
		$this->addColumn( $column );
        $this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$tLocalidad = DAOFactory::getLocalidadDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "localidad.nombre", CPIQ_LBL_MATRICULADO_LOCALIDAD, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tLocalidad.nombre");
		$this->addColumn( $column );
		
		$tEstadoMatriculado = DAOFactory::getEstadoMatriculadoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "estadoMatriculado.nombre", CPIQ_LBL_ESTADO_MATRICULADO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tEstadoMatriculado.nombre");
		$this->addColumn( $column );
		/*$column = GridModelBuilder::buildColumn( "fechaNacimiento", CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CPIQ_DATE_FORMAT) ); 
		$this->addColumn( $column );
		$filter = GridModelBuilder::buildFilterModelFromColumn( $column );
		$filter->setType( CDT_CMP_GRID_FILTER_TYPE_DATE );
		$filter->setDs_name( "fecha_desde" );
		$filter->setDs_id( "fecha_desde" );
		$filter->setDs_label( CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO_DESDE );
		$filter->setDs_operator( ">=" );
		$filter->setCriteriaFormatValue( new CdtCriteriaFormatMysqlDateValue(CPIQ_DATE_FORMAT) );
		$this->addFilter( $filter );

    	$filter = GridModelBuilder::buildFilterModelFromColumn( $column );
		$filter->setType( CDT_CMP_GRID_FILTER_TYPE_DATE );
		$filter->setDs_name( "fecha_hasta" );
		$filter->setDs_id( "fecha_hasta" );
		$filter->setDs_label( CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO_HASTA );
		$filter->setDs_operator( "<=" );
		$filter->setCriteriaFormatValue( new CdtCriteriaFormatMysqlDateValue(CPIQ_DATE_FORMAT) );
		$this->addFilter( $filter );*/
		
		
		//acciones sobre la lista
		$this->buildAction("add_matriculado_init", "add_matriculado_init", CPIQ_MSG_MATRICULADO_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_MATRICULADO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getMatriculadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		
		
		//$actions = $this->getDefaultRowActions($item, "matriculado", CPIQ_LBL_MATRICULADO, false, true, true, false, 500, 750);
		
		$actions = new ItemCollection();
	
		$action = $this->buildRowAction( "view_matriculado", "view_matriculado", CDT_CMP_GRID_MSG_VIEW . " ".CPIQ_LBL_MATRICULADO, CDT_UI_IMG_SEARCH, "view") ;
		$actions->addItem( $action );
		
		$action = $this->buildRowAction( "update_matriculado_init", "update_matriculado_init", CDT_CMP_GRID_MSG_EDIT . " ".CPIQ_LBL_MATRICULADO, CDT_UI_IMG_EDIT, "edit") ;
		$actions->addItem( $action );
		
		//$action =  $this->buildRowAction( "delete_matriculado", "delete_matriculado", CDT_CMP_GRID_MSG_DELETE . " ".CPIQ_LBL_MATRICULADO, CDT_UI_IMG_DELETE, "delete", "delete_items('delete_matriculado')") ;
		
		
		$action =  $this->buildDeleteAction( $item, "matriculado", CPIQ_LBL_MATRICULADO, $this->getMsgConfirmDelete( $item ), false ) ;
		$actions->addItem( $action );
		
		$action = $this->buildRowAction("list_titulos", "list_titulos", CPIQ_MSG_TITULO_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
		$actions->addItem( $action );
		
		$action = $this->buildRowAction("list_cuotasGenerada", "list_cuotasGenerada", CPIQ_MSG_CUOTA_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "pay" ) ;
		$actions->addItem( $action );
		
		$action = $this->buildRowAction("list_registrosMatriculado", "list_registrosMatriculado", CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
		$actions->addItem( $action );
		
		$action = $this->buildRowAction("list_registrosCuotaMatriculado", "list_registrosCuotaMatriculado", CPIQ_MSG_REGISTRO_MATRICULADO_CUOTA_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "pay" ) ;
		$actions->addItem( $action );
		
		if (!CPIQUtils::isMatriculadoLogged()) {
			$action = $this->buildRowAction("list_historicosEstado", "list_historicosEstado", CPIQ_MSG_HISTORICO_ESTADO_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
			$actions->addItem( $action );
			
		}
		
		
		return $actions;
	}


}
?>