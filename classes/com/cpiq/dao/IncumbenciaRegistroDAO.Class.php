<?php

/**
 * DAO para Incumbencia Registro
 *
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaRegistroDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_INCUMBENCIA_REGISTRO;
	}

	public function getEntityFactory(){
		return new IncumbenciaRegistroFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["incumbencia_oid"] = $this->formatIfNull( $entity->getIncumbencia()->getOid(), 'null' );
		
		$fieldsValues["registro_oid"] = $this->formatIfNull( $entity->getRegistro()->getOid(), 'null' );
		
		
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tIncumbenciaRegistro = $this->getTableName();
		
		$tIncumbencia = DAOFactory::getIncumbenciaDAO()->getTableName();
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tIncumbencia . " ON($tIncumbenciaRegistro.incumbencia_oid = $tIncumbencia.oid)";
        $sql .= " LEFT JOIN " . $tRegistro . " ON($tIncumbenciaRegistro.registro_oid = $tRegistro.oid)";
        $sql .= " LEFT JOIN " . $tUser . " ON($tIncumbenciaRegistro.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tIncumbencia = DAOFactory::getIncumbenciaDAO()->getTableName();
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tIncumbencia.oid as " . $tIncumbencia . "_oid ";
        $fields[] = "$tIncumbencia.nombre as " . $tIncumbencia . "_nombre ";
                
        $fields[] = "$tRegistro.oid as " . $tRegistro . "_oid ";
        $fields[] = "$tRegistro.nombre as " . $tRegistro . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	

}
?>