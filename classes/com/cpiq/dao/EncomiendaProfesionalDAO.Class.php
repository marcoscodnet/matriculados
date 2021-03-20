<?php

/**
 * DAO para Encomienda Profesional
 *
 * @author Marcos
 * @since 09-10-2013
 */
class EncomiendaProfesionalDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ENCOMIENDA_PROFESIONAL;
	}

	public function getEntityFactory(){
		return new EncomiendaProfesionalFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["encomienda_oid"] = $this->formatIfNull( $entity->getEncomienda()->getOid(), 'null' );
		$fieldsValues["profesional"] = $this->formatString( $entity->getProfesional() );
		$fieldsValues["matricula"] = $this->formatString( $entity->getMatricula() );
		$fieldsValues["consejo"] = $this->formatString( $entity->getConsejo() );
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tEncomiendaProfesional = $this->getTableName();
		
		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		
		
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tEncomienda . " ON($tEncomiendaProfesional.encomienda_oid = $tEncomienda.oid)";
       
       
       
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tEncomiendaProfesional.user_oid = $tUser.cd_user)";
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$fields = parent::getFieldsToSelect();
		
        
        $tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
        $fields[] = "$tEncomienda.oid as " . $tEncomienda . "_oid ";
        $fields[] = "$tEncomienda.numero as " . $tEncomienda . "_numero ";
        
        
       
        
       
       
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	public function deleteEncomiendaProfesionalPorEncomienda($encomienda_oid, $idConn=0) {
    	
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