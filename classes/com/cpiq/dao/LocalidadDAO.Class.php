<?php

/**
 * DAO para Localidad
 *  
 * @author Bernardo
 * @since 23-05-2013
 */
class LocalidadDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_LOCALIDAD;
	}
	
	public function getEntityFactory(){
		return new LocalidadFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		$fieldsValues["provincia_oid"] = $this->formatIfNull( $entity->getProvincia()->getOid(), 'null' );
		
		
		
		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tLocalidad = $this->getTableName();
		$tProvincia = DAOFactory::getProvinciaDAO()->getTableName();
		$tPais = DAOFactory::getPaisDAO()->getTableName();
		
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tProvincia . " ON($tLocalidad.provincia_oid = $tProvincia.oid)";
        $sql .= " LEFT JOIN " . $tPais . " ON($tProvincia.pais_oid = $tPais.oid)";
        
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tProvincia = DAOFactory::getProvinciaDAO()->getTableName();
		$tPais = DAOFactory::getPaisDAO()->getTableName();
		
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tProvincia.oid as " . $tProvincia . "_oid ";
        $fields[] = "$tProvincia.nombre as " . $tProvincia . "_nombre ";
        $fields[] = "$tPais.oid as " . $tPais . "_oid ";
        $fields[] = "$tPais.nombre as " . $tPais . "_nombre ";
        
       
        
        return $fields;
	}	
	
}
?>