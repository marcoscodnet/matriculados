<?php

/**
 * componente filter para cuotas.
 *
 * @author Marcos
 * @since 27-06-2013
 *
 */
class CMPCuotaFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;


	/**
	 * year
	 * @var Year
	 */
	private $year;
	
	

	public function __construct( $id="filter_cuotas"){

		parent::__construct($id);


		$this->setComponent("CMPCuotaGrid");
		
		

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CUOTA_NOMBRE, "nombre"  ) );
		
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CUOTA_YEAR, "year"  ) );
		
		
		
		

		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$year = $this->getYear();

		if(!empty($year)){
			$criteria->addFilter("year", $year, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		
		
		
		

		

	}


	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
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