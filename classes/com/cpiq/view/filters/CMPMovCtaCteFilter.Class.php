<?php

/**
 * componente filter para movimientos de cta cte.
 *
 * @author Marcos
 * @since 31-10-2013
 *
 */
class CMPMovCtaCteFilter extends CMPFilter{

	
	
	
	
	/**
	 * matriculado 
	 * @var Matriculado
	 */
	private $matriculado;
	
	/**
	 * concepto
	 * @var Concepto
	 */
	private $concepto;
	
	/**
	 * fecha  desde.
	 * @var string
	 */
	private $fechaDesde;
	
	/**
	 * fecha  hasta.
	 * @var string
	 */
	private $fechaHasta;
	
	
	
	
	
	
	
	public function __construct( $id="filter_registrosMatriculado"){

		parent::__construct($id);


		$this->setComponent("CMPMovCtaCteGrid");

		
		
		$this->setMatriculado( new Matriculado() );
		$this->setConcepto( new Concepto() );
		
		//formamos el form de búsqueda.
		
		
		if (!CPIQUtils::isMatriculadoLogged()) {
		
			$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, "", "registroMatriculado_filter_matriculado_oid", "matriculado.oid", "");
			//$findMatriculado->setMinWidth("372px;");
			$this->addField( $findMatriculado );
		}
		
		$fieldConcepto = FieldBuilder::buildFieldSelect (CPIQ_LBL_CONCEPTO, "concepto.oid", CPIQUtils::getConceptosItems(), null, null, null, "--Seleccionar--" );
		$this->addField( $fieldConcepto );
		
		$fieldFechaDesde = FieldBuilder::buildFieldDate ( CPIQ_LBL_HISTORICO_ESTADO_FECHA_DESDE, "fechaDesde"  );
		$this->addField( $fieldFechaDesde);
		
		$fieldFechaHasta = FieldBuilder::buildFieldDate ( CPIQ_LBL_HISTORICO_ESTADO_FECHA_HASTA, "fechaHasta"  );
		$this->addField( $fieldFechaHasta);
		
		
		
		
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		
		
		//filtramos por matriculado.
		$matriculado = $this->getMatriculado();
		if($matriculado!=null && $matriculado->getOid()!=null){
			$criteria->addFilter("matriculado_oid", $matriculado->getOid(), "=" );
		}
		
		//filtramos por concepto.
		$concepto = $this->getConcepto();
		if($concepto!=null && $concepto->getOid()!=null){
			$criteria->addFilter("concepto_oid", $concepto->getOid(), "=" );
		}
		
		//filtramos por rango de fechas.
		$fechaDesde = $this->getFechaDesde();
		if(!empty($fechaDesde)){
			$criteria->addFilter("fechaCarga", $fechaDesde, ">=", new CdtCriteriaFormatMysqlDateValue("d/m/y", DB_DEFAULT_DATE_FORMAT) );
		}
		
		$fechaHasta = $this->getFechaHasta();
		if(!empty($fechaHasta)){
			//$criteria->addFilter("fechaCarga", $fechaHasta, "<=", new CdtCriteriaFormatMysqlDateValue("d/m/y", DB_DEFAULT_DATE_FORMAT) );
			$criteria->addFilter("fechaCarga", CPIQUtils::addDays(CPIQUtils::formatDateToPersist($fechaHasta), DB_DEFAULT_DATETIME_FORMAT, 1), "<=", new CdtCriteriaFormatStringValue());
		}
		
		if (CPIQUtils::isMatriculadoLogged()) {
            //que se muestren sólo las encomiendas del matriculado
            $oMatriculado = CPIQUtils::getMatriculadoLogged();
            CdtUtils::log($oMatriculado->getOid(), __CLASS__,LoggerLevel::getLevelDebug());
            $criteria->addFilter("matriculado_oid", $oMatriculado->getOid(), "=");
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

	public function getConcepto()
	{
	    return $this->concepto;
	}

	public function setConcepto($concepto)
	{
	    $this->concepto = $concepto;
	}

	public function getFechaDesde()
	{
	    return $this->fechaDesde;
	}

	public function setFechaDesde($fechaDesde)
	{
	    $this->fechaDesde = $fechaDesde;
	}

	public function getFechaHasta()
	{
	    return $this->fechaHasta;
	}

	public function setFechaHasta($fechaHasta)
	{
	    $this->fechaHasta = $fechaHasta;
	}
}