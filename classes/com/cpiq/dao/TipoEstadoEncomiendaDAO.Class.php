<?php

/**
 * DAO para TipoEstadoEncomienda
 *  
 * @author Marcos
 * @since 03-10-2013
 */
class TipoEstadoEncomiendaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_TIPO_ESTADO_ENCOMIENDA;
	}
	
	public function getEntityFactory(){
		return new TipoEstadoEncomiendaFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		return $fieldsValues;
	}
	
}
?>