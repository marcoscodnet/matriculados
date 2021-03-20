<?php

/**
 * DAO para Incumbencia
 *
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_INCUMBENCIA;
	}

	public function getEntityFactory(){
		return new IncumbenciaFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tIncumbencia = $this->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tIncumbencia.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$fields = parent::getFieldsToSelect();
		
        
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}
		
	
	
}
?>