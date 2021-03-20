<?php

/**
 * componente filter para tipos de estados de encomienda.
 *
 * @author marcos
 * @since 03-10-2013
 *
 */
class CMPTipoEstadoEncomiendaFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;



	public function __construct( $id="filter_tiposEstadoEncomienda"){

		parent::__construct($id);


		$this->setComponent("CMPTipoEstadoEncomiendaGrid");

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_TIPO_ESTADO_ENCOMIENDA_NOMBRE, "nombre"  ) );

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