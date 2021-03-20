<?php

/**
 * componente filter para registros cuotas.
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class CMPRegistroCuotaFilter extends CMPFilter{

	
	
	
	
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
	
	
	
	
	public function __construct( $id="filter_registrosCuota"){

		parent::__construct($id);


		$this->setComponent("CMPRegistroCuotaGrid");

		
		
		$this->setRegistro( new Registro() );
		
		//formamos el form de búsqueda.
		
		
		
		
		$findRegistro = CPIQComponentsFactory::getFindRegistro(new Registro(), CPIQ_LBL_REGISTRO, "", "registroCuota_filter_registro_oid", "registro.oid", "");
		$this->addField( $findRegistro );
		
		
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_REGISTRO_CUOTA_YEAR, "year"  ) );
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$year = $this->getYear();

		if(!empty($year)){
			$criteria->addFilter("year", $year, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		

		
		
		//filtramos por registro.
		$registro = $this->getRegistro();
		if($registro!=null && $registro->getOid()!=null){
			$criteria->addFilter("registro_oid", $registro->getOid(), "=" );
		}
		
		
		
		
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