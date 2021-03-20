<?php

/**
 * componente filter para tipos de título.
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 17-05-2013
 *
 */
class CMPTipoTituloFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;

	/**
	 * claseTitulo
	 * @var ClaseTitulo
	 */
	private $claseTitulo;
	
	/**
	 * secuenciaTitulo
	 * @var SecuenciaTitulo
	 */
	private $secuenciaTitulo;


	public function __construct( $id="filter_tiposTitulo"){

		parent::__construct($id);


		$this->setComponent("CMPTipoTituloGrid");
		
		$this->setClaseTitulo( new ClaseTitulo() );
		$this->setSecuenciaTitulo( new SecuenciaTitulo() );

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_TIPO_TITULO_NOMBRE, "nombre"  ) );
		
		/*$findClaseTitulo = CPIQComponentsFactory::getFindClaseTitulo(new ClaseTitulo(), CPIQ_LBL_CLASE_TITULO, "", "localidad_filter_claseTitulo_oid", "claseTitulo.oid");
		$this->addField( $findClaseTitulo );
		
		$findSecuenciaTitulo = CPIQComponentsFactory::getFindSecuenciaTitulo(new SecuenciaTitulo(), CPIQ_LBL_SECUENCIA_TITULO, "", "localidad_filter_secuenciaTitulo_oid", "secuenciaTitulo.oid");
		$this->addField( $findSecuenciaTitulo );*/
		
		$fieldClaseTitulo = FieldBuilder::buildFieldSelect (CPIQ_LBL_CLASE_TITULO, "claseTitulo.oid", CPIQUtils::getClasesTituloItems(), null, null, null, "--Seleccionar--" );
		$this->addField( $fieldClaseTitulo );
		
		$fieldSecuenciaTitulo = FieldBuilder::buildFieldSelect (CPIQ_LBL_SECUENCIA_TITULO, "secuenciaTitulo.oid", CPIQUtils::getSecuenciasTituloItems(), null, null, null, "--Seleccionar--" );
		$this->addField( $fieldSecuenciaTitulo );

		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}

		$claseTitulo = $this->getClaseTitulo();
		if($claseTitulo!=null && $claseTitulo->getOid()!=null){
			$criteria->addFilter("claseTitulo_oid", $claseTitulo->getOid(), "=" );
		}
		
		$secuenciaTitulo = $this->getSecuenciaTitulo();
		if($secuenciaTitulo!=null && $secuenciaTitulo->getOid()!=null){
			$criteria->addFilter("secuenciaTitulo_oid", $secuenciaTitulo->getOid(), "=" );
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


    public function getClaseTitulo()
    {
        return $this->claseTitulo;
    }

    public function setClaseTitulo($claseTitulo)
    {
        $this->claseTitulo = $claseTitulo;
    }

    public function getSecuenciaTitulo()
    {
        return $this->secuenciaTitulo;
    }

    public function setSecuenciaTitulo($secuenciaTitulo)
    {
        $this->secuenciaTitulo = $secuenciaTitulo;
    }
}