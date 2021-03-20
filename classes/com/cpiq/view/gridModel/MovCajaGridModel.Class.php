<?php

/**
 * GridModel para movimientos de caja.
 *
 * @author Marcos
 * @since 01-11-2013
 */
class MovCajaGridModel extends GridModel {

	public function MovCajaGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		
		$column = GridModelBuilder::buildColumn( "fechaCarga", CPIQ_LBL_ENCOMIENDA_FECHA, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CPIQ_DATETIME_FORMAT) ); 
		$this->addColumn( $column );
		
		
		$tConcepto = DAOFactory::getConceptoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "concepto.nombre", CPIQ_LBL_CONCEPTO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tConcepto.nombre" );
		$this->addColumn( $column );
		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_MOVCAJA_DETALLE, 60,CDT_CMP_GRID_TEXTALIGN_LEFT, "",new GridMovCajaDetalleValueFormat()  );
		$this->addColumn( $column );
		
		
		$column = GridModelBuilder::buildColumn( "importe", CPIQ_LBL_CUOTA_VALOR_IMPORTE, 20,CDT_CMP_GRID_TEXTALIGN_RIGHT, "",new GridMontoCoeficienteValueFormat()  );
		$this->addColumn( $column );
		
		//acciones sobre la lista
		$this->buildAction("add_movCaja_init", "add_movCaja_init", CPIQ_MSG_MOVCAJA_TITLE_ADD, "image", "add");
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_MOVCAJA_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getMovCajaManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {
		$actions = new ItemCollection();
		
		//$action = $this->buildRowAction( "view_movCaja", "view_movCaja", CDT_CMP_GRID_MSG_VIEW . " ".CPIQ_LBL_MOVCAJA, CDT_UI_IMG_SEARCH, "view") ;
		$action = $this->buildViewAction( $item, "movCaja", CPIQ_LBL_MOVCAJA );
		$actions->addItem( $action );
		
		//$action =  $this->buildDeleteAction( $item, "movCaja", CPIQ_LBL_MOVCAJA, $this->getMsgConfirmAnulate( $item ), false ) ;
		$action =  $this->buildRowAction( "delete_movCaja", "delete_movCaja", CPIQ_MSGP_GRID_MSG_ANULAR . " ".CPIQ_LBL_MOVCAJA, CDT_UI_IMG_DELETE, "delete", "delete_items('delete_movCaja')", false, $this->getMsgConfirmAnulate( $item )) ;
		$actions->addItem( $action );
		
		
	
		
		return $actions;
		//return $this->getDefaultRowActions($item, "movCaja", CPIQ_LBL_MOVCAJA, false, true, true, false, 500, 750);
	}
	
	public function getHeaderContent(){
		
			$filter = new CMPMovCajaFilter();
			$filter->fillSavedProperties();
            $manager = $this->getEntityManager();
            $movCajas = $manager->getEntities($filter->buildCriteria());
            $saldo = 0;
            foreach ($movCajas as $oMovCaja) {
            	$saldo += $oMovCaja->getConcepto()->getCoeficiente()*$oMovCaja->getImporte();
            }
			return CPIQ_LBL_MOVCTACTE_SALDO." = ".CPIQUtils::formatMontoToView($saldo);
		
	}
	
	protected function getMsgConfirmAnulate( $item ){
		if(!empty($item)){
			$id = $this->getEntityId( $item );
		}else{
			$id="";
		}

		$msg = CPIQ_MSGP_GRID_MSG_CONFIRM_ANULATE_QUESTION;
		$params[] = $id;
		$msg = CdtFormatUtils::formatMessage($msg, $params);

		return CdtFormatUtils::quitarEnters($msg);
	}


}
?>