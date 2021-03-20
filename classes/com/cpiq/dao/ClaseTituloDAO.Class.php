<?php

/**
 * DAO para ClaseTitulo
 *  
 * @author Marcos
 * @since 10-06-2013
 */
class ClaseTituloDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_CLASE_TITULO;
	}
	
	public function getEntityFactory(){
		return new ClaseTituloFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		return $fieldsValues;
	}
	
}
?>