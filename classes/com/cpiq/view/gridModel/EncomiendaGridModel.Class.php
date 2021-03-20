<?php

/**
 * GridModel para Encomienda
 *
 * @author Marcos
 * @since 03-10-2013
 */
class EncomiendaGridModel extends GridModel {

	public function EncomiendaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		$column = GridModelBuilder::buildColumn( "numero", CPIQ_LBL_ENCOMIENDA_NUMERO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "numero" );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModel( "numero", CPIQ_LBL_ENCOMIENDA_NUMERO) );

		$column = GridModelBuilder::buildColumn( "fecha", CPIQ_LBL_ENCOMIENDA_FECHA, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CPIQ_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		$tTipoEncomienda = DAOFactory::getTipoEncomiendaDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "tipoEncomienda.nombre", CPIQ_LBL_ENCOMIENDA_TIPO_ENCOMIENDA, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tTipoEncomienda.nombre" );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "comitente", CPIQ_LBL_ENCOMIENDA_COMITENTE, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "comitente" );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModel( "comitente", CPIQ_LBL_ENCOMIENDA_COMITENTE) );
		
		$tTipoEstadoEncomienda = DAOFactory::getTipoEstadoEncomiendaDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "tipoEstadoEncomienda.nombre", CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tTipoEstadoEncomienda.nombre" );
		$this->addColumn( $column );
		
		//acciones sobre la lista
		$this->buildAction("add_encomienda_init", "add_encomienda_init", CPIQ_MSG_ENCOMIENDA_TITLE_ADD, "image", "add");
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_ENCOMIENDA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getEncomiendaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		
		
		
		
		$actions = new ItemCollection();
	
		$action = $this->buildRowAction( "certificado_encomienda_pdf", "certificado_encomienda_pdf", CDT_CMP_GRID_MSG_VIEW . " ".CPIQ_LBL_ENCOMIENDA, CDT_UI_IMG_SEARCH, "view") ;
		$action->setBl_targetblank(true);
		$actions->addItem( $action );
		
		$action = $this->buildRowAction( "update_encomienda_init", "update_encomienda_init", CDT_CMP_GRID_MSG_EDIT . " ".CPIQ_LBL_ENCOMIENDA, CDT_UI_IMG_EDIT, "edit") ;
		$actions->addItem( $action );
		
		$action =  $this->buildDeleteAction( $item, "encomienda", CPIQ_LBL_ENCOMIENDA, $this->getMsgConfirmDelete( $item ), false ) ;
		$actions->addItem( $action );
		if (!CPIQUtils::isMatriculadoLogged()) {
			$action = $this->buildRowAction("list_encomiendasObservacion", "list_encomiendasObservacion", CPIQ_MSG_ENCOMIENDA_OBSERVACION_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "attach" ) ;
			$actions->addItem( $action );
			
			$action = $this->buildRowAction("cambiarEstadoEncomienda_init", "cambiarEstadoEncomienda_init", CPIQ_MSG_TIPO_ESTADO_ENCOMIENDA_TITLE_LIST, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "edit" ) ;
			$actions->addItem( $action );
			
			$action = $this->buildRowAction("pagarEncomienda_init", "pagarEncomienda_init", CPIQ_MSG_PAGAR_ENCOMIENDA, CDT_CMP_GRID_MSG_VIEWCDT_UI_IMG_SEARCH, "pay" ) ;
			$actions->addItem( $action );
		}
		
		return $actions;
	}


}
?>