<?php

/**
 * componente filter para encomiendas.
 *
 * @author Marcos
 * @since 03-10-2013
 *
 */
class CMPEncomiendaFilter extends CMPFilter{

	/**
	 * numero 
	 * @var string
	 */
	private $numero;
	
	/**
	 * tipoEncomienda
	 * @var TipoEncomienda
	 */
	private $tipoEncomienda;
	
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
	
	
	public function __construct( $id="filter_tiposEncomienda"){

		parent::__construct($id);


		$this->setComponent("CMPEncomiendaGrid");

		$this->setTipoEncomienda( new TipoEncomienda() );
		
		
		//formamos el form de bÃºsqueda.
		$fieldNumero = FieldBuilder::buildFieldText ( CPIQ_LBL_ENCOMIENDA_NUMERO, "numero"  );
		//$fieldNumero->setMinWidth("372px;");
		$this->addField( $fieldNumero );
		
		
	
		$fieldFechaDesde = FieldBuilder::buildFieldDate ( CPIQ_LBL_ENCOMIENDA_FECHA_DESDE, "fechaDesde"  );
		$this->addField( $fieldFechaDesde );
		
		$fieldFechaHasta = FieldBuilder::buildFieldDate ( CPIQ_LBL_ENCOMIENDA_FECHA_HASTA, "fechaHasta"  );
		$this->addField( $fieldFechaHasta );

		
		$findTipoEncomienda = CPIQComponentsFactory::getFindTipoEncomienda(new TipoEncomienda(), CPIQ_LBL_TIPO_ENCOMIENDA, "", "matriculado_filter_tipoEncomienda_oid", "tipoEncomienda.oid", "matriculado_filter_tipoEncomienda_change");
		
		$this->addField( $findTipoEncomienda);
		
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNumero();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		


		//filtramos por rango de fechas.
		$fechaDesde = $this->getFechaDesde();
		if(!empty($fechaDesde)){
			$criteria->addFilter("fecha", $fechaDesde, ">=", new CdtCriteriaFormatMysqlDateValue("d/m/y", DB_DEFAULT_DATE_FORMAT) );
		}
		
		$fechaHasta = $this->getFechaHasta();
		if(!empty($fechaHasta)){
			//$criteria->addFilter("fecha", $fechaHasta, "<=", new CdtCriteriaFormatMysqlDateValue("d/m/y",DB_DEFAULT_DATE_FORMAT) );
			$criteria->addFilter("fecha", CPIQUtils::addDays(CPIQUtils::formatDateToPersist($fechaHasta), DB_DEFAULT_DATETIME_FORMAT, 1), "<=", new CdtCriteriaFormatStringValue());
		}
		
		//filtramos por tipo de encomienda.
		$tipoEncomienda = $this->getTipoEncomienda();
		if($tipoEncomienda!=null && $tipoEncomienda->getOid()!=null){
			$criteria->addFilter("tipoEncomienda_oid", $tipoEncomienda->getOid(), "=" );
		}
		
		if (CPIQUtils::isMatriculadoLogged()) {
            //que se muestren sólo las encomiendas del matriculado
            $oMatriculado = CPIQUtils::getMatriculadoLogged();
            CdtUtils::log($oMatriculado->getOid(), __CLASS__,LoggerLevel::getLevelDebug());
            $criteria->addFilter("matriculado_oid", $oMatriculado->getOid(), "=");
        }
		$tEncomiendaEstado = DAOFactory::getEncomiendaEstadoDAO()->getTableName();
		$criteria->addNull('fechaHasta');
		
		
	}




	

	public function getNumero()
	{
	    return $this->numero;
	}

	public function setNumero($numero)
	{
	    $this->numero = $numero;
	}

	public function getTipoEncomienda()
	{
	    return $this->tipoEncomienda;
	}

	public function setTipoEncomienda($tipoEncomienda)
	{
	    $this->tipoEncomienda = $tipoEncomienda;
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