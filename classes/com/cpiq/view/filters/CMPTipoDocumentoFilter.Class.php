<?php

/**
 * componente filter para tipos de documento.
 *
 * @author marcos
 * @since 30-05-2013
 *
 */
class CMPTipoDocumentoFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;



	public function __construct( $id="filter_tiposDocumento"){

		parent::__construct($id);


		$this->setComponent("CMPTipoDocumentoGrid");

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_TIPO_DOCUMENTO_NOMBRE, "nombre"  ) );

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