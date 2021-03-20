<?php

/**
 * DAO para Encomienda Estado
 *
 * @author Marcos
 * @since 04-10-2013
 */
class EncomiendaEstadoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ENCOMIENDA_ESTADO;
	}

	public function getEntityFactory(){
		return new EncomiendaEstadoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["encomienda_oid"] = $this->formatIfNull( $entity->getEncomienda()->getOid(), 'null' );
		$fieldsValues["tipoEstadoEncomienda_oid"] = $this->formatIfNull( $entity->getTipoEstadoEncomienda()->getOid(), 'null' );
		
		
		$fieldsValues["fechaDesde"] = $this->formatDate( $entity->getFechaDesde() );
		$fieldsValues["fechaHasta"] = $this->formatDate( $entity->getFechaHasta() );
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tEncomiendaEstado = $this->getTableName();
		
		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		$tTipoEstadoEncomienda = DAOFactory::getTipoEstadoEncomiendaDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        
        $sql .= " LEFT JOIN " . $tEncomienda . " ON($tEncomiendaEstado.encomienda_oid = $tEncomienda.oid)";
       	$sql .= " LEFT JOIN " . $tTipoEstadoEncomienda . " ON($tEncomiendaEstado.tipoEstadoEncomienda_oid = $tTipoEstadoEncomienda.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tEncomiendaEstado.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tTipoEstadoEncomienda = DAOFactory::getTipoEstadoEncomiendaDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
                
        $tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		$fields[] = "$tEncomienda.oid as " . $tEncomienda . "_oid ";
        $fields[] = "$tEncomienda.numero as " . $tEncomienda . "_numero ";
       
        
        $tTipoEstadoEncomienda = DAOFactory::getTipoEstadoEncomiendaDAO()->getTableName();
		$fields[] = "$tTipoEstadoEncomienda.oid as " . $tTipoEstadoEncomienda . "_oid ";
        $fields[] = "$tTipoEstadoEncomienda.nombre as " . $tTipoEstadoEncomienda . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	public function deleteEncomiendaEstadoPorEncomienda($encomienda_oid, $idConn=0) {
    	
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