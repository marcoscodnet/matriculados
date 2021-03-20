<?php

/**
 * DAO para Historico estado
 *
 * @author Marcos
 * @since 14-06-2013
 */
class HistoricoEstadoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_HISTORICO_ESTADO;
	}

	public function getEntityFactory(){
		return new HistoricoEstadoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["matriculado_oid"] = $this->formatIfNull( $entity->getMatriculado()->getOid(), 'null' );
		$fieldsValues["estadoMatriculado_oid"] = $this->formatIfNull( $entity->getEstadoMatriculado()->getOid(), 'null' );
		
		$fieldsValues["motivo"] = $this->formatString( $entity->getMotivo() );
		$fieldsValues["fechaDesde"] = $this->formatDate( $entity->getFechaDesde() );
		$fieldsValues["fechaHasta"] = $this->formatDate( $entity->getFechaHasta() );
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tHistoricoEstado = $this->getTableName();
		
		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$tEstadoMatriculado = DAOFactory::getEstadoMatriculadoDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        
        $sql .= " LEFT JOIN " . $tMatriculado . " ON($tHistoricoEstado.matriculado_oid = $tMatriculado.oid)";
       	$sql .= " LEFT JOIN " . $tEstadoMatriculado . " ON($tHistoricoEstado.estadoMatriculado_oid = $tEstadoMatriculado.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tHistoricoEstado.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tEstadoMatriculado = DAOFactory::getEstadoMatriculadoDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
                
        $tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$fields[] = "$tMatriculado.oid as " . $tMatriculado . "_oid ";
        $fields[] = "$tMatriculado.nombre as " . $tMatriculado . "_nombre ";
        $fields[] = "$tMatriculado.apellido as " . $tMatriculado . "_apellido ";
        
        $tEstadoMatriculado = DAOFactory::getEstadoMatriculadoDAO()->getTableName();
		$fields[] = "$tEstadoMatriculado.oid as " . $tEstadoMatriculado . "_oid ";
        $fields[] = "$tEstadoMatriculado.nombre as " . $tEstadoMatriculado . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	public function deleteHistoricoEstadoPorMatriculado($matriculado_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE matriculado_oid = $matriculado_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }

}
?>