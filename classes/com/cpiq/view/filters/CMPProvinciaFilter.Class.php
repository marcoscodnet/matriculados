<?php

/**
 * componente filter para provincias.
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class CMPProvinciaFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;

	/**
	 * pais
	 * @var Pais
	 */
	private $pais;


	public function __construct( $id="filter_provincias"){

		parent::__construct($id);


		$this->setComponent("CMPProvinciaGrid");
		
		$this->setPais( new Pais() );

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_PROVINCIA_NOMBRE, "nombre"  ) );
		
		$findPais = CPIQComponentsFactory::getFindPais(new Pais(), CPIQ_LBL_PAIS, "", "provincia_filter_pais_oid", "pais.oid", "");
		$this->addField( $findPais );
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		//filtramos por pais.
		$pais = $this->getPais();
		if($pais!=null && $pais->getOid()!=null){
			$criteria->addFilter("pais_oid", $pais->getOid(), "=" );
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

	public function setPais($pais)
	{
	    $this->pais = $pais;
	}
	
	public function getPais()
	{
	    return $this->pais;
	}
}