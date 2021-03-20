<?php

/**
 * DAO para Registro
 *
 * @author Marcos
 * @since 27-06-2013
 */
class RegistroDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_REGISTRO;
	}

	public function getEntityFactory(){
		return new RegistroFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["sigla"] = $this->formatString( $entity->getSigla() );
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tRegistro = $this->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tRegistro.user_oid = $tUser.cd_user)";
        
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