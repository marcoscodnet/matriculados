<?php

/**
 * componente filter para tiposEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class CMPTipoEncomiendaFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;


	
	
	

	public function __construct( $id="filter_tiposEncomienda"){

		parent::__construct($id);


		$this->setComponent("CMPTipoEncomiendaGrid");
		
		

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_TIPO_ENCOMIENDA_NOMBRE, "nombre"  ) );
		
		
		
		
		
		

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