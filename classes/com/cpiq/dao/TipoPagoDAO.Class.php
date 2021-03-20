<?php

/**
 * DAO para TipoPago
 *  
 * @author Marcos
 * @since 17-10-2013
 */
class TipoPagoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_TIPO_PAGO;
	}
	
	public function getEntityFactory(){
		return new TipoPagoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		$fieldsValues["entidad"] = $this->formatIfNull( $entity->getEntidad(), 0 );
		
		$fieldsValues["cheque"] = $this->formatIfNull( $entity->getCheque(), 0 );
		
		return $fieldsValues;
	}
	
}
?>