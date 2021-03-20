<?php

/**
 * componente filter para registros matriculados.
 *
 * @author Marcos
 * @since 19-09-2013
 *
 */
class CMPRegistroMatriculadoFilter extends CMPFilter{

	
	
	
	
	/**
	 * registro 
	 * @var string
	 */
	private $matriculado;
	
	/**
	 * year 
	 * @var string
	 */
	private $year;
	
	
	
	
	public function __construct( $id="filter_registrosMatriculado"){

		parent::__construct($id);


		$this->setComponent("CMPRegistroMatriculadoGrid");

		
		
		$this->setMatriculado( new Matriculado() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, "", "registroMatriculado_filter_matriculado_oid", "matriculado.oid", "");
		$this->addField( $findMatriculado );
		
		
		//$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_REGISTRO_CUOTA_YEAR, "year"  ) );
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		/*$year = $this->getYear();

		if(!empty($year)){
			$criteria->addFilter("year", $year, "like", new CdtCriteriaFormatLikeValue() );
		}*/
		
		

		
		
		//filtramos por matriculado.
		$matriculado = $this->getMatriculado();
		if($matriculado!=null && $matriculado->getOid()!=null){
			$criteria->addFilter("matriculado_oid", $matriculado->getOid(), "=" );
		}
		
		
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$filter = new CdtSimpleExpression("(".$tTitulo.".tituloPrincipal = 1 OR ".$tTitulo.".oid is null)");
		$criteria->setExpresion($filter);
		
	}




	

	

	public function getMatriculado()
	{
	    return $this->matriculado;
	}

	public function setMatriculado($matriculado)
	{
	    $this->matriculado = $matriculado;
	}

	public function getYear()
	{
	    return $this->year;
	}

	public function setYear($year)
	{
	    $this->year = $year;
	}
}