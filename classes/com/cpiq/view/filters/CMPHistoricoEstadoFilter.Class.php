<?php

/**
 * componente filter para históricos estados.
 *
 * @author Marcos
 * @since 25-10-2013
 *
 */
class CMPHistoricoEstadoFilter extends CMPFilter{

	
	
	
	
	/**
	 * registro 
	 * @var string
	 */
	private $matriculado;
	
	/**
	 * estadoMatriculado
	 * @var EstadoMatriculado
	 */
	private $estadoMatriculado;
	
	/**
	 * inicio  desde.
	 * @var string
	 */
	private $inicioDesde;
	
	/**
	 * inicio  hasta.
	 * @var string
	 */
	private $inicioHasta;
	
	/**
	 * fin  desde.
	 * @var string
	 */
	private $finDesde;
	
	/**
	 * fin  hasta.
	 * @var string
	 */
	private $finHasta;
	
	
	
	
	
	public function __construct( $id="filter_registrosMatriculado"){

		parent::__construct($id);


		$this->setComponent("CMPHistoricoEstadoGrid");

		
		
		$this->setMatriculado( new Matriculado() );
		$this->setEstadoMatriculado( new EstadoMatriculado() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, "", "registroMatriculado_filter_matriculado_oid", "matriculado.oid", "");
		$findMatriculado->setMinWidth("372px;");
		$this->addField( $findMatriculado );
		
		$fieldEstadoMatriculado = FieldBuilder::buildFieldSelect (CPIQ_LBL_HISTORICO_ESTADO_ESTADO, "estadoMatriculado.oid", CPIQUtils::getEstadosMatriculadoItems(), null, null, null, "--Seleccionar--" );
		$this->addField( $fieldEstadoMatriculado );
		
		$fieldInicioDesde = FieldBuilder::buildFieldDate ( CPIQ_LBL_HISTORICO_ESTADO_FECHA_DESDE_DESDE, "inicioDesde"  );
		$this->addField( $fieldInicioDesde,2 );
		
		$fieldInicioHasta = FieldBuilder::buildFieldDate ( CPIQ_LBL_HISTORICO_ESTADO_FECHA_DESDE_HASTA, "inicioHasta"  );
		$this->addField( $fieldInicioHasta,2 );
		
		$fieldFinDesde = FieldBuilder::buildFieldDate ( CPIQ_LBL_HISTORICO_ESTADO_FECHA_HASTA_DESDE, "finDesde"  );
		$this->addField( $fieldFinDesde,2 );
		
		$fieldFinHasta = FieldBuilder::buildFieldDate ( CPIQ_LBL_HISTORICO_ESTADO_FECHA_HASTA_HASTA, "finHasta"  );
		$this->addField( $fieldFinHasta,2 );
		
		
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		
		
		//filtramos por matriculado.
		$matriculado = $this->getMatriculado();
		if($matriculado!=null && $matriculado->getOid()!=null){
			$criteria->addFilter("matriculado_oid", $matriculado->getOid(), "=" );
		}
		
		//filtramos por estado de matriculado.
		$estadoMatriculado = $this->getEstadoMatriculado();
		if($estadoMatriculado!=null && $estadoMatriculado->getOid()!=null){
			$criteria->addFilter("estadoMatriculado_oid", $estadoMatriculado->getOid(), "=" );
		}
		
		//filtramos por rango de fechas.
		$inicioDesde = $this->getInicioDesde();
		if(!empty($inicioDesde)){
			$criteria->addFilter("fechaDesde", $inicioDesde, ">=", new CdtCriteriaFormatMysqlDateValue("d/m/y", DB_DEFAULT_DATE_FORMAT) );
		}
		
		$inicioHasta = $this->getInicioHasta();
		if(!empty($inicioHasta)){
			//$criteria->addFilter("fechaDesde", $inicioHasta, "<=", new CdtCriteriaFormatMysqlDateValue("d/m/y", DB_DEFAULT_DATE_FORMAT) );
			$criteria->addFilter("fechaDesde", CPIQUtils::addDays(CPIQUtils::formatDateToPersist($inicioHasta), DB_DEFAULT_DATETIME_FORMAT, 1), "<=", new CdtCriteriaFormatStringValue());
		}
		
		$finDesde = $this->getFinDesde();
		if(!empty($finDesde)){
			$criteria->addFilter("fechaHasta", $finDesde, ">=", new CdtCriteriaFormatMysqlDateValue("d/m/y",DB_DEFAULT_DATE_FORMAT) );
		}
		
		$finHasta = $this->getFinHasta();
		if(!empty($finHasta)){
			//$criteria->addFilter("fechaHasta", $finHasta, "<=", new CdtCriteriaFormatMysqlDateValue("d/m/y",DB_DEFAULT_DATE_FORMAT) );
			$criteria->addFilter("fechaHasta", CPIQUtils::addDays(CPIQUtils::formatDateToPersist($finHasta), DB_DEFAULT_DATETIME_FORMAT, 1), "<=", new CdtCriteriaFormatStringValue());
		}
		
	}




	

	

	

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	public function getEstadoMatriculado()
	{
	    return $this->estadoMatriculado;
	}

	public function setEstadoMatriculado($estadoMatriculado)
	{
	    $this->estadoMatriculado = $estadoMatriculado;
	}

	

	public function getInicioDesde()
	{
	    return $this->inicioDesde;
	}

	public function setInicioDesde($inicioDesde)
	{
	    $this->inicioDesde = $inicioDesde;
	}

	public function getInicioHasta()
	{
	    return $this->inicioHasta;
	}

	public function setInicioHasta($inicioHasta)
	{
	    $this->inicioHasta = $inicioHasta;
	}

	public function getFinDesde()
	{
	    return $this->finDesde;
	}

	public function setFinDesde($finDesde)
	{
	    $this->finDesde = $finDesde;
	}

	public function getFinHasta()
	{
	    return $this->finHasta;
	}

	public function setFinHasta($finHasta)
	{
	    $this->finHasta = $finHasta;
	}
}