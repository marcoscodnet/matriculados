<?php

/**
 * componente filter para registros matriculados.
 *
 * @author Marcos
 * @since 20-03-2017
 *
 */
class CMPRegistroCuotaMatriculadoFilter extends CMPFilter{

	
	
	
	
	/**
	 * registro 
	 * @var string
	 */
	private $matriculado;
	
	/**
	 * registro 
	 * @var string
	 */
	private $registro;
	
	/**
	 * year 
	 * @var string
	 */
	private $year;
	
	
	public function __construct( $id="filter_registrosMatriculado"){

		parent::__construct($id);


		$this->setComponent("CMPRegistroCuotaMatriculadoGrid");

		
		
		$this->setMatriculado( new Matriculado() );
		$this->setRegistro( new Registro() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findMatriculado = CPIQComponentsFactory::getFindMatriculado(new Matriculado(), CPIQ_LBL_MATRICULADO, "", "registroCuotaMatriculado_filter_matriculado_oid", "matriculado.oid", "");
		$this->addField( $findMatriculado );
		
		$findRegistro = CPIQComponentsFactory::getFindRegistro(new Registro(), CPIQ_LBL_REGISTRO, "", "registroMatriculado_registro_oid", "registro.oid", "");
		$this->addField( $findRegistro );
		
		$fieldYear = FieldBuilder::buildFieldText ( CPIQ_LBL_REGISTRO_CUOTA_YEAR, "year"  );
		$this->addField( $fieldYear);
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		
		//filtramos por matriculado.
		$matriculado = $this->getMatriculado();
		if($matriculado!=null && $matriculado->getOid()!=null){
			$criteria->addFilter("matriculado_oid", $matriculado->getOid(), "=" );
		}
		
		$registro = $this->getRegistro();
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		if($registro!=null && $registro->getOid()!=null){
			$criteria->addFilter("$tRegistro.oid", $registro->getOid(), "=" );
		}
		
		$year = $this->getYear();
		$tRegistroCuota = DAOFactory::getRegistroCuotaDAO()->getTableName();
		if(!empty($year)){
			$criteria->addFilter("$tRegistroCuota.year", $year, "like", new CdtCriteriaFormatLikeValue() );
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

	

	public function getRegistro()
	{
	    return $this->registro;
	}

	public function setRegistro($registro)
	{
	    $this->registro = $registro;
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