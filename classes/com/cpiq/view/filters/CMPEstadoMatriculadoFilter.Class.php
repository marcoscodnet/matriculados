<?php

/**
 * componente filter para estados.
 *
 * @author Marcos
 * @since 07-06-2013
 *
 */
class CMPEstadoMatriculadoFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;



	public function __construct( $id="filter"){

		parent::__construct($id);


		$this->setComponent("CMPEstadoMatriculadoGrid");

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_ENTIDAD_EMISORA_NOMBRE, "nombre"  ) );

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