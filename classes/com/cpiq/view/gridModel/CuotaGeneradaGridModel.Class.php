<?php

/**
 * GridModel para Cuota Generada
 *
 * @author Marcos
 * @since 29-07-2013
 */
class CuotaGeneradaGridModel extends GridModel {

	public function CuotaGeneradaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "titulo.matricula", CPIQ_LBL_TITULO_MATRICULA, 50, CDT_CMP_GRID_TEXTALIGN_CENTER, "$tTitulo.matricula") ;
		$this->addColumn( $column );
		
		
		
		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "matriculado.apellido,matriculado.nombre", CPIQ_LBL_MATRICULADO, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tMatriculado.nombre,$tMatriculado.apellido" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$column = GridModelBuilder::buildColumn( "nombre", CPIQ_LBL_CUOTA_GENERADA_NOMBRE, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "nombre" );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModel( "nombre", CPIQ_LBL_CUOTA_GENERADA_NOMBRE) );
		
		/*$tCuotaValor = DAOFactory::getCuotaValorDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "cuotaValor.importeIngeniero", CPIQ_LBL_CUOTA_VALOR_IMPORTE_INGENIERO, 50, CDT_CMP_GRID_TEXTALIGN_RIGHT, "$tCuotaValor.importeIngeniero",new GridMontoValueFormat()  ) ;
		$this->addColumn( $column );
		
		$tCuotaValor = DAOFactory::getCuotaValorDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "cuotaValor.importe", CPIQ_LBL_CUOTA_VALOR_IMPORTE_OTROS, 50, CDT_CMP_GRID_TEXTALIGN_RIGHT, "$tCuotaValor.importe",new GridMontoValueFormat()  ) ;
		$this->addColumn( $column );*/
		
		$column = GridModelBuilder::buildColumn( "movCtaCte.oid", CPIQ_LBL_CUOTA_GENERADA_ESTADO, 20, "","",new GridPagoEstadoValueFormat() ) ;
		$this->addColumn( $column );
		
		
		
		//$matriculado_oid = CdtUtils::getParam('id');
			
		//acciones sobre la lista
		$this->buildAction("pagar_cuotaGenerada_init", "pagar_cuotaGenerada_init", CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA, "image", "pay");
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_CUOTA_GENERADA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getCuotaGeneradaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		$actions = new ItemCollection();
	
		
		
		/*$action = $this->buildRowAction( "pagar_cuotaGenerada_init", "pagar_cuotaGenerada_init", CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA, CDT_UI_IMG_SEARCH, "pay", "", false, "", true ) ;
		$actions->addItem( $action );*/
		
		//$action = $this->buildRowAction("pagar_cuotaGenerada_init", "pagar_cuotaGenerada_init", CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA, CDT_UI_IMG_SEARCH, "pay","",false,CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA.'?') ;
		
		//$action->setBl_targetblank(true);
		/*$action->setDs_callback("mostrarPDFCuotaPaga");
		$actions->addItem( $action );*/
		
		return $actions;
	}


}
?>