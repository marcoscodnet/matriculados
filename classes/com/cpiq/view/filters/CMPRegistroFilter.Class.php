<?php

/**
 * componente filter para registros.
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class CMPRegistroFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;


	/**
	 * sigla
	 * @var Sigla
	 */
	private $sigla;
	
	

	public function __construct( $id="filter_registros"){

		parent::__construct($id);


		$this->setComponent("CMPRegistroGrid");
		
		

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_REGISTRO_NOMBRE, "nombre"  ) );
		
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_REGISTRO_SIGLA, "sigla"  ) );
		
		
		
		

		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$sigla = $this->getSigla();

		if(!empty($sigla)){
			$criteria->addFilter("sigla", $sigla, "like", new CdtCriteriaFormatLikeValue() );
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
	
	


   
    
	

	public function getSigla()
	{
	    return $this->sigla;
	}

	public function setSigla($sigla)
	{
	    $this->sigla = $sigla;
	}
}