<?php

/**
 * componente filter para localidades.
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 27-05-2013
 *
 */
class CMPLocalidadFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;


	/**
	 * provincia
	 * @var Provincia
	 */
	private $provincia;
	
	

	public function __construct( $id="filter_localidades"){

		parent::__construct($id);


		$this->setComponent("CMPLocalidadGrid");
		
		$this->setPais( new Pais() );
		$this->setProvincia( new Provincia() );

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_LOCALIDAD_NOMBRE, "nombre"  ) );
		
		/*$findProvincia = CPIQComponentsFactory::getFindProvincia(new Provincia(), CPIQ_LBL_PROVINCIA, "", "localidad_filter_provincia_oid", "provincia.oid", "");
		$this->addField( $findProvincia );*/
		
		$findPais = CPIQComponentsFactory::getFindPais(new Pais(), CPIQ_LBL_PAIS, "", "localidad_filter_pais_oid", "pais.oid", "localidad_filter_pais_change");
		$this->addField( $findPais );
		
		$findProvincia = CPIQComponentsFactory::getFindProvincia(new Provincia(), CPIQ_LBL_PROVINCIA, "", "localidad_filter_provincia_oid", "provincia.oid");
		$this->addField( $findProvincia );
		
		

		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		
		//por pais.
		$tPais = DAOFactory::getPaisDAO()->getTableName();
		$pais = $this->getPais();
		if($pais!=null && $pais->getOid()!=null){
			$criteria->addFilter("$tPais.oid", $pais->getOid(), "=" );
		}
		
		//filtramos por provincia.
		$provincia = $this->getProvincia();
		if($provincia!=null && $provincia->getOid()!=null){
			$criteria->addFilter("provincia_oid", $provincia->getOid(), "=" );
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
	
	public function setProvincia($provincia)
	{
	    $this->provincia = $provincia;
	}
	
	public function getProvincia()
	{
	    return $this->provincia;
	}


   
    
	public function getPais()
	{
	    return $this->pais;
	}

	public function setPais($pais)
	{
	    $this->pais = $pais;
	}
}