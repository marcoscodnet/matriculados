<?php

/**
 * DAO para EstadoMatriculado
 *  
 * @author Marcos
 * @since 06-06-2013
 */
class EstadoMatriculadoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ESTADO_MATRICULADO;
	}
	
	public function getEntityFactory(){
		return new EstadoMatriculadoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		return $fieldsValues;
	}
	
	
	
}
?>