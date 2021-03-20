<?php

/**
 * componente filter para paises.
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class CMPPaisFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;



	public function __construct( $id="filter_paises"){

		parent::__construct($id);


		$this->setComponent("CMPPaisGrid");

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_PAIS_NOMBRE, "nombre"  ) );

		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
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

}