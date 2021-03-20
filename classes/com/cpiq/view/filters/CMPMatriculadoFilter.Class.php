<?php

/**
 * componente filter para matriculados.
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 23-05-2013
 *
 */
class CMPMatriculadoFilter extends CMPFilter{

	/**
	 * nombre 
	 * @var string
	 */
	private $nombre;
	
	/**
	 * apellido 
	 * @var string
	 */
	private $apellido;
	
	/**
	 * email 
	 * @var string
	 */
	private $email;

	/**
	 * tipo de documento 
	 * @var TipoDocumento
	 */
	private $tipoDocumento;
	
	/**
	 * nro de documento 
	 * @var NroDocumento
	 */
	private $nroDocumento;
	
	/**
	 * localidad
	 * @var Localidad
	 */
	private $localidad;

	/**
	 * provincia
	 * @var Provincia
	 */
	private $provincia;
	
	/**
	 * pais
	 * @var Pais
	 */
	private $pais;
	
	
	/**
	 * estado
	 * @var Estado
	 */
	private $estadoMatriculado;
	
	/**
	 * fecha nacimiento desde.
	 * @var string
	 */
	//private $fechaNacimientoDesde;
	
	/**
	 * fecha nacimiento hasta.
	 * @var string
	 */
	//private $fechaNacimientoHasta;
	
	/**
	 * sexos posibles
	 * @var array
	 */
	//private $sexos;
	
	public function __construct( $id="filter_matriculados"){

		parent::__construct($id);


		$this->setComponent("CMPMatriculadoGrid");

		$this->setPais( new Pais() );
		$this->setProvincia( new Provincia() );
		$this->setLocalidad( new Localidad() );
		$this->setEstadoMatriculado( new EstadoMatriculado() );
		//$this->setSexos( array() );
		$this->setTipoDocumento( new TipoDocumento() );
		
		//formamos el form de búsqueda.
		$fieldNombre = FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_NOMBRE, "nombre"  );
		$fieldNombre->setMinWidth("372px;");
		$this->addField( $fieldNombre );
		
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_APELLIDO, "apellido"  ) );
		
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_EMAIL, "email"  ) );
	
		/*$fieldFechaDesde = FieldBuilder::buildFieldDate ( CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO_DESDE, "fechaNacimientoDesde"  );
		$this->addField( $fieldFechaDesde );
		
		$fieldFechaHasta = FieldBuilder::buildFieldDate ( CPIQ_LBL_MATRICULADO_FECHA_NACIMIENTO_HASTA, "fechaNacimientoHasta"  );
		$this->addField( $fieldFechaHasta );*/

		$fieldTipoDocumento = FieldBuilder::buildFieldSelect (CPIQ_LBL_MATRICULADO_TIPO_DOCUMENTO, "tipoDocumento.oid", CPIQUtils::getTiposDocumentoItems(), null, null, null, "--Seleccionar--" );
		$this->addField( $fieldTipoDocumento );
		
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_MATRICULADO_NRO_DOCUMENTO, "nroDocumento"  ) );
				
		//$findLocalidad = CPIQComponentsFactory::getFindLocalidad( $this->getLocalidad(), "", "localidad_oid", "localidad.oid", "filterMatriculado_localidadChange" );
		//$this->addField( FieldBuilder::buildFieldFindObject( CPIQ_LBL_MATRICULADO_LOCALIDAD, $findLocalidad ) );
		$findPais = CPIQComponentsFactory::getFindPais(new Pais(), CPIQ_LBL_PAIS, "", "matriculado_filter_pais_oid", "pais.oid", "matriculado_filter_pais_change");
		$findPais->setMinWidth("435px;");
		$findPais->getInput()->setHeightPopup("605");
		$findPais->getInput()->setWidthPopup("805");
		$this->addField( $findPais, 2 );
		
		$findProvincia = CPIQComponentsFactory::getFindProvincia(new Provincia(), CPIQ_LBL_PROVINCIA, "", "matriculado_filter_provincia_oid", "provincia.oid", "matriculado_filter_provincia_change");
		$this->addField( $findProvincia, 2 );
				


		$fieldEstado = FieldBuilder::buildFieldSelect (CPIQ_LBL_ESTADO_MATRICULADO, "estadoMatriculado.oid", CPIQUtils::getEstadosMatriculadoItems(), '', null, null, "--seleccionar--", "estadoMatriculado_oid" );
		$this->addField( $fieldEstado,2 );
		/*$checkboxes = array();
		foreach (Sexo::getItems() as $value => $label) {
			$chkSexo = FieldBuilder::buildFieldCheckbox( $label, "sexo_$value", "sexos[]", false, "", $value);
			$checkboxes[] = $chkSexo;
		}
		$this->addField( FieldBuilder::buildFieldCheckboxes(  CPIQ_LBL_SEXO, "sexos", $checkboxes) );*/
		
		
		$this->fillForm();

	}


	protected function fillCriteria( $criteria ){

		parent::fillCriteria($criteria);
		
		$nombre = $this->getNombre();

		if(!empty($nombre)){
			$criteria->addFilter("nombre", $nombre, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$apellido = $this->getApellido();
		
		if(!empty($apellido)){
			$criteria->addFilter("apellido", $apellido, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$email = $this->getEmail();
		
		if(!empty($email)){
			$criteria->addFilter("email", $email, "like", new CdtCriteriaFormatLikeValue() );
		}


		//filtramos por rango de fechas.
		/*$fechaDesde = $this->getFechaNacimientoDesde();
		if(!empty($fechaDesde)){
			$criteria->addFilter("fechaNacimiento", $fechaDesde, ">=", new CdtCriteriaFormatMysqlDateValue("d/m/y", DB_DEFAULT_DATE_FORMAT) );
		}
		
		$fechaHasta = $this->getFechaNacimientoHasta();
		if(!empty($fechaHasta)){
			$criteria->addFilter("fechaNacimiento", $fechaHasta, "<=", new CdtCriteriaFormatMysqlDateValue("d/m/y",DB_DEFAULT_DATE_FORMAT) );
		}*/

		//filtramos por localidad.
		$localidad = $this->getLocalidad();
		if($localidad!=null && $localidad->getOid()!=null){
			$criteria->addFilter("localidad_oid", $localidad->getOid(), "=" );
		}
		
		
		//para poder filtar por provincia y por país, hay que hacer
		//el join en el dao porque sólo tenemos localidad en el matriculado.
		
		//por provincia
		$tProvincia = DAOFactory::getProvinciaDAO()->getTableName();
		$provincia = $this->getProvincia();
		if($provincia!=null && $provincia->getOid()!=null){
			$criteria->addFilter("$tProvincia.oid", $provincia->getOid(), "=" );
		}
		
		//por pais.
		$tPais = DAOFactory::getPaisDAO()->getTableName();
		$pais = $this->getPais();
		if($pais!=null && $pais->getOid()!=null){
			$criteria->addFilter("$tPais.oid", $pais->getOid(), "=" );
		}
		
		//filtramos por tipo de documento.
		$tipoDocumento = $this->getTipoDocumento();
		if($tipoDocumento!=null && $tipoDocumento->getOid()!=null){
			$criteria->addFilter("tipoDocumento_oid", $tipoDocumento->getOid(), "=" );
		}
		
		$nroDocumento = $this->getNroDocumento();
		if(!empty($nroDocumento)){
			$criteria->addFilter("nroDocumento", $nroDocumento, "like", new CdtCriteriaFormatLikeValue() );
		}
		
		$estado = $this->getEstadoMatriculado();
		if($estado!=null && $estado->getOid()!=null){
			$tHistoricoEstado = DAOFactory::getHistoricoEstadoDAO()->getTableName();
			$criteria->addFilter("$tHistoricoEstado.estadoMatriculado_oid", $estado->getOid(), "=" );
		}
		
		//armamos un IN con los sexos posibles.
		/*$sexos = $this->getSexos();
		if( !empty($sexos) ){
			
			
			
			$strSexos = implode("','", $sexos ); 
			if( !empty( $strSexos) ){
				$criteria->addFilter( "sexo", "'$strSexos'", "IN", new CdtCriteriaFormatINValue() );
			}
		}*/
		
		$criteria->addNull('fechaHasta');
	}




	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}
	
	public function getNroDocumento()
	{
	    return $this->nroDocumento;
	}

	public function setNroDocumento($nroDocumento)
	{
	    $this->nroDocumento = $nroDocumento;
	}
	
	public function getApellido()
	{
	    return $this->apellido;
	}

	public function setApellido($apellido)
	{
	    $this->apellido = $apellido;
	}
	
	public function getEmail()
	{
	    return $this->email;
	}

	public function setEmail($email)
	{
	    $this->email = $email;
	}

	public function getLocalidad()
	{
	    return $this->localidad;
	}

	public function setLocalidad($localidad)
	{
	    $this->localidad = $localidad;
	}

	/*public function getFechaNacimientoDesde()
	{
	    return $this->fechaNacimientoDesde;
	}

	public function setFechaNacimientoDesde($fechaNacimientoDesde)
	{
	    $this->fechaNacimientoDesde = $fechaNacimientoDesde;
	}

	public function getFechaNacimientoHasta()
	{
	    return $this->fechaNacimientoHasta;
	}

	public function setFechaNacimientoHasta($fechaNacimientoHasta)
	{
	    $this->fechaNacimientoHasta = $fechaNacimientoHasta;
	}

	public function getSexos()
	{
	    return $this->sexos;
	}

	public function setSexos($sexos)
	{
	    $this->sexos = $sexos;
	}*/

	public function getTipoDocumento()
	{
	    return $this->tipoDocumento;
	}

	public function setTipoDocumento($tipoDocumento)
	{
	    $this->tipoDocumento = $tipoDocumento;
	}

	public function getProvincia()
	{
	    return $this->provincia;
	}

	public function setProvincia($provincia)
	{
	    $this->provincia = $provincia;
	}

	public function getPais()
	{
	    return $this->pais;
	}

	public function setPais($pais)
	{
	    $this->pais = $pais;
	}

	public function getEstadoMatriculado()
	{
	    return $this->estadoMatriculado;
	}

	public function setEstadoMatriculado($estadoMatriculado)
	{
	    $this->estadoMatriculado = $estadoMatriculado;
	}
}