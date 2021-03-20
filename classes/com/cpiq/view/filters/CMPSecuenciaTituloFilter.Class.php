<?php

/**
 * componente filter para secuencias títulos.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class CMPSecuenciaTituloFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;
	
	/**
	 * ultMatricula del tipo de título
	 * @var string
	 */
	private $ultMatricula;



	public function __construct( $id="filter"){

		parent::__construct($id);


		$this->setComponent("CMPSecuenciaTituloGrid");

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_SECUENCIA_TITULO_NOMBRE, "nombre"  ) );

		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_SECUENCIA_TITULO_ULT_MATRICULA, "ultMatricula"  ) );
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();
		
		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$ultMatricula = $this->getUltMatricula();
		
		if(!empty($ultMatricula)){
			$criteria->addFilter("ultMatricula", $ultMatricula, "like", new CdtCriteriaFormatLikeValue() );
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


    public function getUltMatricula()
    {
        return $this->ultMatricula;
    }

    public function setUltMatricula($ultMatricula)
    {
        $this->ultMatricula = $ultMatricula;
    }
}