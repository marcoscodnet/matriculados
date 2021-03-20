<?php

/**
 * componente filter para cuotas generadas.
 *
 * @author Marcos
 * @since 02-07-2013
 *
 */
class CMPCuotaGeneradaFilter extends CMPFilter{

	
	/**
	 * cuota
	 * @var Cuota
	 */
	private $cuota;
	
	
	/**
	 * matriculado 
	 * @var string
	 */
	private $matriculado;
	
	/**
	 * nombre 
	 * @var string
	 */
	private $nombre;
	
	
	
	
	
	
	public function __construct( $id="filter_cuotasGenerada"){

		parent::__construct($id);


		$this->setComponent("CMPCuotaGeneradaGrid");

		
		$this->setCuota( new Cuota() );
		$this->setMatriculado( new Matriculado() );
		
		//formamos el form de búsqueda.
		
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CUOTA_GENERADA_NOMBRE, "nombre"  ) );
		
		$findCuota = CPIQComponentsFactory::getFindCuota(new Cuota(), CPIQ_LBL_CUOTA, "", "cuotaGenerada_filter_cuota_oid", "cuota.oid", "");
		$this->addField( $findCuota );
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, "", "cuotaGenerada_filter_matriculado_oid", "matriculado.oid", "");
		$this->addField( $findMatriculado );
		
		
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		
		//$criteria->addNull('movCtaCte_oid');

		//filtramos por cuota.
		$cuota = $this->getCuota();
		if($cuota!=null && $cuota->getOid()!=null){
			$criteria->addFilter("cuota_oid", $cuota->getOid(), "=" );
		}
		
		//filtramos por matriculado.
		$matriculado = $this->getMatriculado();
		if($matriculado!=null && $matriculado->getOid()!=null){
			$criteria->addFilter("matriculado_oid", $matriculado->getOid(), "=" );
		}
		/*$tCuotaValor = DAOFactory::getCuotaValorDAO()->getTableName();
		$criteria->addFilter("$tCuotaValor.fechaDesde", date(DB_DEFAULT_DATE_FORMAT), "<=",new CdtCriteriaFormatStringValue() );
		$criteria->addFilter("$tCuotaValor.fechaHasta", date(DB_DEFAULT_DATE_FORMAT), ">=",new CdtCriteriaFormatStringValue() );*/
		
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$filter = new CdtSimpleExpression("(".$tTitulo.".tituloPrincipal = 1 OR ".$tTitulo.".oid is null)");
		$criteria->setExpresion($filter);
		
	}




	

	public function getCuota()
	{
	    return $this->cuota;
	}

	public function setCuota($cuota)
	{
	    $this->cuota = $cuota;
	}

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}
}