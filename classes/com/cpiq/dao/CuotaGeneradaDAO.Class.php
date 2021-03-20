<?php

/**
 * DAO para Cuota Generada
 *
 * @author Marcos
 * @since 02-07-2013
 */
class CuotaGeneradaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_CUOTA_GENERADA;
	}

	public function getEntityFactory(){
		return new CuotaGeneradaFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["cuota_oid"] = $this->formatIfNull( $entity->getCuota()->getOid(), 'null' );
		$fieldsValues["matriculado_oid"] = $this->formatIfNull( $entity->getMatriculado()->getOid(), 'null' );
		$fieldsValues["movCtaCte_oid"] = $this->formatIfNull( $entity->getMovCtaCte()->getOid(), 'null' );
		$fieldsValues["movCtaCteDeuda_oid"] = $this->formatIfNull( $entity->getMovCtaCteDeuda()->getOid(), 'null' );
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() );
		
		$fieldsValues["fechaCarga"] = $this->formatDate( $entity->getFechaCarga() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tCuotaGenerada = $this->getTableName();
		$tCuota = DAOFactory::getCuotaDAO()->getTableName();
		//$tCuotaValor = DAOFactory::getCuotaValorDAO()->getTableName();
		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tCuota . " ON($tCuotaGenerada.cuota_oid = $tCuota.oid)";
        $sql .= " LEFT JOIN " . $tMatriculado . " ON($tCuotaGenerada.matriculado_oid = $tMatriculado.oid)";
        //$sql .= " LEFT JOIN " . $tCuotaValor . " ON($tCuotaValor.cuota_oid = $tCuota.oid)";
        $sql .= " LEFT JOIN " . $tTitulo . " ON($tCuotaGenerada.matriculado_oid = $tTitulo.matriculado_oid)";
       	$sql .= " LEFT JOIN " . $tMovCtaCte . " ON($tCuotaGenerada.movCtaCte_oid = $tMovCtaCte.oid)";
       	$sql .= " LEFT JOIN " . $tMovCtaCte . " DEUDA ON($tCuotaGenerada.movCtaCteDeuda_oid = DEUDA.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tCuotaGenerada.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tCuota = DAOFactory::getCuotaDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tCuota.oid as " . $tCuota . "_oid ";
        $fields[] = "$tCuota.nombre as " . $tCuota . "_nombre ";
        
        $tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$fields[] = "$tMatriculado.oid as " . $tMatriculado . "_oid ";
        $fields[] = "$tMatriculado.nombre as " . $tMatriculado . "_nombre ";
        $fields[] = "$tMatriculado.apellido as " . $tMatriculado . "_apellido ";
        
        /*$tCuotaValor = DAOFactory::getCuotaValorDAO()->getTableName();
		$fields[] = "$tCuotaValor.oid as " . $tCuotaValor . "_oid ";
        $fields[] = "$tCuotaValor.importe as " . $tCuotaValor . "_importe ";
        $fields[] = "$tCuotaValor.importeIngeniero as " . $tCuotaValor . "_importeIngeniero ";
        $fields[] = "$tCuotaValor.fechaDesde as " . $tCuotaValor . "_fechaDesde ";
        $fields[] = "$tCuotaValor.fechaHasta as " . $tCuotaValor . "_fechaHasta ";*/
        
        $tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$fields[] = "$tTitulo.oid as " . $tTitulo . "_oid ";
        $fields[] = "$tTitulo.matricula as " . $tTitulo . "_matricula ";
        
       
		$fields[] = "DEUDA.oid as DEUDA_oid ";
        
        $tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$fields[] = "$tMovCtaCte.oid as " . $tMovCtaCte . "_oid ";
       // $fields[] = "$tMovCtaCte.nombre as " . $tMovCtaCte . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	public function deleteCuotaGeneradaPorMatriculado($matriculado_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE matriculado_oid = $matriculado_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }
    
	public function deleteCuotaGeneradaPorCuota($cuota_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE cuota_oid = $cuota_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }
	

}
?>