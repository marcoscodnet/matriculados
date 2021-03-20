<?php

/**
 * componente filter para incumbencias.
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class CMPIncumbenciaFilter extends CMPFilter{

	/**
	 * nombre del tipo de título
	 * @var string
	 */
	private $nombre;


	
	
	

	public function __construct( $id="filter_incumbencias"){

		parent::__construct($id);


		$this->setComponent("CMPIncumbenciaGrid");
		
		

		//formamos el form de búsqueda.
		$this->addField( FieldBuilder::buildFieldText ( CPIQ_LBL_INCUMBENCIA_NOMBRE, "nombre"  ) );
		
		
		
		
		
		

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