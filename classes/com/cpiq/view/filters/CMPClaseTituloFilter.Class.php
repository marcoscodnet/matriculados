<?php

/**
 * componente filter para clases títulos.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class CMPClaseTituloFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;



	public function __construct( $id="filter"){

		parent::__construct($id);


		$this->setComponent("CMPClaseTituloGrid");

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_CLASE_TITULO_NOMBRE, "nombre"  ) );

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