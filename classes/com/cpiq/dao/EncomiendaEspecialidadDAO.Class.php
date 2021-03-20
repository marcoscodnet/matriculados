<?php

/**
 * DAO para Encomienda Especialidad
 *
 * @author Marcos
 * @since 09-10-2013
 */
class EncomiendaEspecialidadDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ENCOMIENDA_ESPECIALIDAD;
	}

	public function getEntityFactory(){
		return new EncomiendaEspecialidadFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["encomienda_oid"] = $this->formatIfNull( $entity->getEncomienda()->getOid(), 'null' );
		$fieldsValues["titulo_oid"] = $this->formatIfNull( $entity->getTitulo()->getOid(), 'null' );
		
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tEncomiendaEspecialidad = $this->getTableName();
		
		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$tTipoTitulo = DAOFactory::getTipoTituloDAO()->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tEncomienda . " ON($tEncomiendaEspecialidad.encomienda_oid = $tEncomienda.oid)";
       
        $sql .= " LEFT JOIN " . $tTitulo . " ON($tEncomiendaEspecialidad.titulo_oid = $tTitulo.oid)";
       	$sql .= " LEFT JOIN " . $tTipoTitulo . " ON($tTitulo.tipoTitulo_oid = $tTipoTitulo.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tEncomiendaEspecialidad.user_oid = $tUser.cd_user)";
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$fields = parent::getFieldsToSelect();
		
        
        $tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
        $fields[] = "$tEncomienda.oid as " . $tEncomienda . "_oid ";
        $fields[] = "$tEncomienda.numero as " . $tEncomienda . "_numero ";
        
        
       
        
        $tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$fields[] = "$tTitulo.oid as " . $tTitulo . "_oid ";
       	$fields[] = "$tTitulo.matricula as " . $tTitulo . "_matricula ";
       
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	
	public function deleteEncomiendaEspecialidadPorEncomienda($encomienda_oid, $idConn=0) {
    	
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