<?php

/**
 * DAO para Anulacion
 *
 * @author Marcos
 * @since 01-11-2013
 */
class AnulacionDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ANULACION;
	}

	public function getEntityFactory(){
		return new AnulacionFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["fecha"] = $this->formatDate( $entity->getFecha() );
		
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tAnulacion = $this->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tAnulacion.user_oid = $tUser.cd_user)";
        
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