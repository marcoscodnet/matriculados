<?php

/**
 * DAO para Mov Caja
 *
 * @author Marcos
 * @since 01-08-2013
 */
class MovCajaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_MOV_CAJA;
	}

	public function getEntityFactory(){
		return new MovCajaFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["concepto_oid"] = $this->formatIfNull( $entity->getConcepto()->getOid(), 'null' );
		$fieldsValues["movCtaCte_oid"] = $this->formatIfNull( $entity->getMovCtaCte()->getOid(), 'null' );
		
		$fieldsValues["anulacion_oid"] = $this->formatIfNull( $entity->getAnulacion()->getOid(), 'null' );
		
		$fieldsValues["importe"] = $this->formatString( $entity->getImporte() );
		$fieldsValues["observaciones"] = $this->formatString( $entity->getObservaciones() );
		
		$fieldsValues["fechaCarga"] = $this->formatDate( $entity->getFechaCarga() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tMovCaja = $this->getTableName();
		$tConcepto = DAOFactory::getConceptoDAO()->getTableName();
		
		$tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		
		$tAnulacion = DAOFactory::getAnulacionDAO()->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tConcepto . " ON($tMovCaja.concepto_oid = $tConcepto.oid)";
        $sql .= " LEFT JOIN " . $tMovCtaCte . " ON($tMovCaja.movCtaCte_oid = $tMovCtaCte.oid)";
       	$sql .= " LEFT JOIN " . $tMatriculado . " ON($tMovCtaCte.matriculado_oid = $tMatriculado.oid)";
       	$sql .= " LEFT JOIN " . $tAnulacion . " ON($tMovCaja.anulacion_oid = $tAnulacion.oid)";
       
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tMovCaja.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tConcepto = DAOFactory::getConceptoDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tConcepto.oid as " . $tConcepto . "_oid ";
        $fields[] = "$tConcepto.nombre as " . $tConcepto . "_nombre ";
        $fields[] = "$tConcepto.coeficiente as " . $tConcepto . "_coeficiente ";
        
        $tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$fields[] = "$tMovCtaCte.oid as " . $tMovCtaCte . "_oid ";
       /* $fields[] = "$tMovCtaCte.nombre as " . $tMovCtaCte . "_nombre ";
        $fields[] = "$tMovCtaCte.apellido as " . $tMovCtaCte . "_apellido ";*/
        
       	$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$fields[] = "$tMatriculado.oid as " . $tMatriculado . "_oid ";
        $fields[] = "$tMatriculado.nombre as " . $tMatriculado . "_nombre ";
        $fields[] = "$tMatriculado.apellido as " . $tMatriculado . "_apellido ";
        
        $tAnulacion = DAOFactory::getAnulacionDAO()->getTableName();
		$fields[] = "$tAnulacion.oid as " . $tAnulacion . "_oid ";
       
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	public function deleteMovCajaPorMovCtaCte($movCtaCte_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE movCtaCte_oid = $movCtaCte_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }
	

}
?>