<?php

/**
 * DAO para Encomienda Registro
 *
 * @author Marcos
 * @since 09-10-2013
 */
class EncomiendaRegistroDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ENCOMIENDA_REGISTRO;
	}

	public function getEntityFactory(){
		return new EncomiendaRegistroFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["encomienda_oid"] = $this->formatIfNull( $entity->getEncomienda()->getOid(), 'null' );
		$fieldsValues["registroMatriculado_oid"] = $this->formatIfNull( $entity->getRegistroMatriculado()->getOid(), 'null' );
		
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tEncomiendaRegistro = $this->getTableName();
		
		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		
		$tRegistroMatriculado = DAOFactory::getRegistroMatriculadoDAO()->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tEncomienda . " ON($tEncomiendaRegistro.encomienda_oid = $tEncomienda.oid)";
       
        $sql .= " LEFT JOIN " . $tRegistroMatriculado . " ON($tEncomiendaRegistro.registroMatriculado_oid = $tRegistroMatriculado.oid)";
       
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tEncomiendaRegistro.user_oid = $tUser.cd_user)";
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$fields = parent::getFieldsToSelect();
		
        
        $tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
        $fields[] = "$tEncomienda.oid as " . $tEncomienda . "_oid ";
        $fields[] = "$tEncomienda.numero as " . $tEncomienda . "_numero ";
        
        
       
        
        $tRegistroMatriculado = DAOFactory::getRegistroMatriculadoDAO()->getTableName();
		$fields[] = "$tRegistroMatriculado.oid as " . $tRegistroMatriculado . "_oid ";
       // $fields[] = "$tRegistroMatriculado.year as " . $tRegistroMatriculado . "_year ";
       
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	public function deleteEncomiendaRegistroPorEncomienda($encomienda_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE encomienda_oid = $encomienda_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }

}
?>