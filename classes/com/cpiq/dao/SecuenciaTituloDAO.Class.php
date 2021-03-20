<?php

/**
 * DAO para SecuenciaTitulo
 *  
 * @author Marcos
 * @since 10-06-2013
 */
class SecuenciaTituloDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_SECUENCIA_TITULO;
	}
	
	public function getEntityFactory(){
		return new SecuenciaTituloFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		$fieldsValues["ultMatricula"] = $this->formatString( $entity->getUltMatricula() );
		
		return $fieldsValues;
	}
	
}
?>