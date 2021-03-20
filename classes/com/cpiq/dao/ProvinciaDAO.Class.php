<?php

/**
 * DAO para Provincia
 *  
 * @author Marcos
 * @since 28-05-2013
 */
class ProvinciaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_PROVINCIA;
	}
	
	public function getEntityFactory(){
		return new ProvinciaFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		$fieldsValues["pais_oid"] = $this->formatIfNull( $entity->getPais()->getOid(), 'null' );
		
		
		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tProvincia = $this->getTableName();
		$tPais = DAOFactory::getPaisDAO()->getTableName();
		
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tPais . " ON($tProvincia.pais_oid = $tPais.oid)";
        
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tPais = DAOFactory::getPaisDAO()->getTableName();
		
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tPais.oid as " . $tPais . "_oid ";
        $fields[] = "$tPais.nombre as " . $tPais . "_nombre ";
        
       
        
        return $fields;
	}	
	
}
?>