<?php

/**
 * GridModel para movimientos de cta cte.
 *
 * @author Marcos
 * @since 31-10-2013
 */
class MovCtaCteGridModel extends GridModel {

	public function MovCtaCteGridModel() {

		parent::__construct();
		$this->initModel();
	}

	protected function initModel() {

		
		
		$column = GridModelBuilder::buildColumn( "oid", CPIQ_LBL_ENTITY_OID, 20, CDT_CMP_GRID_TEXTALIGN_RIGHT );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );

		if (!CPIQUtils::isMatriculadoLogged()) {
			$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
			$column = GridModelBuilder::buildColumn( "matriculado.apellido,matriculado.nombre", CPIQ_LBL_MATRICULADO, 50, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tMatriculado.nombre,$tMatriculado.apellido" ) ;
			$this->addColumn( $column );
		}
		
		$column = GridModelBuilder::buildColumn( "fechaCarga", CPIQ_LBL_ENCOMIENDA_FECHA, 30, CDT_CMP_GRID_TEXTALIGN_CENTER, null, new GridDateValueFormat(CPIQ_DATETIME_FORMAT) ); 
		$this->addColumn( $column );

		$tConcepto = DAOFactory::getConceptoDAO()->getTableName();
        $column = GridModelBuilder::buildColumn( "concepto.nombre", CPIQ_LBL_CONCEPTO, 40, CDT_CMP_GRID_TEXTALIGN_LEFT, "$tConcepto.nombre" );
		$this->addColumn( $column );
		
		
		
		
		
		$column = GridModelBuilder::buildColumn( "importe", CPIQ_LBL_CUOTA_VALOR_IMPORTE, 20,CDT_CMP_GRID_TEXTALIGN_RIGHT, "",new GridMontoCoeficienteValueFormat()  );
		$this->addColumn( $column );
		
		//acciones sobre la lista
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_MOVCTACTE_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getMovCtaCteManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {
		return new ItemCollection();
	}
	
	public function getHeaderContent(){
		$filter = new CMPMovCtaCteFilter();
		$filter->fillSavedProperties();
		$criteria = $filter->buildCriteria();
		if ($filter->getMatriculado()->getOid()) {
		
            $manager = $this->getEntityManager();
            $movCtaCtes = $manager->getEntities($criteria);
            $saldo = 0;
            foreach ($movCtaCtes as $oMovCte) {
            	$saldo += $oMovCte->getConcepto()->getCoeficiente()*$oMovCte->getImporte();
            }
			return CPIQ_LBL_MOVCTACTE_SALDO." = ".CPIQUtils::formatMontoToView($saldo);
		}
	}


}
?>