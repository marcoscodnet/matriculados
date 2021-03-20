<?php

/**
 * GridModel para Registro Matriculado
 *
 * @author Marcos
 * @since 19-09-2013
 */
class RegistroMatriculadoGridModel extends GridModel {

	public function RegistroMatriculadoGridModel() {

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
		
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "titulo.matricula", CPIQ_LBL_TITULO_MATRICULA, 50, CDT_CMP_GRID_TEXTALIGN_CENTER, "$tTitulo.matricula") ;
		$this->addColumn( $column );

		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "registro.sigla", CPIQ_LBL_REGISTRO_SIGLA, 50, CDT_CMP_GRID_TEXTALIGN_CENTER, "$tRegistro.sigla" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		/*$tRegistroCuota = DAOFactory::getRegistroCuotaDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "registroCuota.year", CPIQ_LBL_REGISTRO_CUOTA_YEAR, 40, CDT_CMP_GRID_TEXTALIGN_CENTER, "$tRegistroCuota.year" );
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );*/
		
		/*$tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$column = GridModelBuilder::buildColumn( "movCtaCte.importe", CPIQ_LBL_REGISTRO_CUOTA_IMPORTE, 40, CDT_CMP_GRID_TEXTALIGN_RIGHT, "$tMovCtaCte.importe", new GridMontoValueFormat() );
		*		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );*/
		
		
		$column = GridModelBuilder::buildColumn( "numero", CPIQ_LBL_REGISTRO_MATRICULADO_NUMERO, 50, CDT_CMP_GRID_TEXTALIGN_CENTER, "numero" ) ;
		$this->addColumn( $column );
		$this->addFilter( GridModelBuilder::buildFilterModelFromColumn( $column ) );
		
		
	
		$this->buildAction("add_registroMatriculado_init", "add_registroMatriculado_init", CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_ADD, "image", "add");
		
		
		
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getTitle();
	 */
	function getTitle() {
		return CPIQ_MSG_REGISTRO_MATRICULADO_TITLE_LIST;
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getEntityManager();
	 */
	public function getEntityManager() {
		return ManagerFactory::getRegistroMatriculadoManager();
	}

	/**
	 * (non-PHPdoc)
	 * @see GridModel::getRowActionsModel( $item );
	 */
	public function getRowActionsModel($item) {

		return $this->getDefaultRowActions($item, "registroMatriculado", CPIQ_LBL_REGISTRO_MATRICULADO, true, true, true, false, 500, 750);
	}


}
?>