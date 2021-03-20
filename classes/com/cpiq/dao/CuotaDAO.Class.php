<?php

/**
 * DAO para Cuota
 *
 * @author Marcos
 * @since 27-06-2013
 */
class CuotaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_CUOTA;
	}

	public function getEntityFactory(){
		return new CuotaFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["year"] = $this->formatIfNull( $entity->getYear(), '0' );
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tCuota = $this->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tCuota.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$fields = parent::getFieldsToSelect();
		
        
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}
		
	
	/**
	 * se persisten valores de una cuota
	 * @param array $valores
	 * @throws DBException
	 */
	public function addValoresCuota( array $valores ) {
			
		$db = CdtDbManager::getConnection($idConn);
	
		$sqlInserts = array();
	
		foreach ($valores as $valor) {
			
			$strValues = array(
								$this->formatIfNull($valor->getCuota_oid(), 'null'),
							    $this->formatDate($valor->getFechaDesde()),
								$this->formatDate($valor->getFechaHasta()),
								$this->formatIfNull($valor->getImporteIngeniero(), 'null'),
								$this->formatIfNull($valor->getImporte(), 'null')
							);
			
			$strValues = implode( ",", $strValues);
			$sqlInserts[] = "( $strValues )";
		}
	
	
		$strValues = implode(',', $sqlInserts );
	
		$tableName = CPIQ_TABLE_CUOTA_VALOR;
	
		$sql = "INSERT INTO $tableName ( cuota_oid, fechaDesde, fechaHasta, importeIngeniero, importe ) VALUES $strValues ";
	
		CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
	
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());
	
	}
	
	public function getValoresCuota( $cuota_oid ) {
			
		$db = CdtDbManager::getConnection( $idConn );

		$tableName = CPIQ_TABLE_CUOTA_VALOR;
		
        $sql = "SELECT * FROM $tableName WHERE cuota_oid = $cuota_oid";
                
        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());

        $items = CdtResultFactory::toCollection($db, $result, new CuotaValorFactory());
        $db->sql_freeresult($result);
        return $items;
	}
	
	public function updateCuotaValor( CuotaValor $cuotaValor ) {
			
		$db = CdtDbManager::getConnection($idConn);
	
		$fechaDesde = $this->formatDate($cuotaValor->getFechaDesde()) ;
		$fechaHasta = $this->formatDate($cuotaValor->getFechaHasta());
		$importeIngeniero = 	$this->formatIfNull($cuotaValor->getImporteIngeniero(), 'null');
		$importe = 	$this->formatIfNull($cuotaValor->getImporte(), 'null');
		$oid = 	$this->formatIfNull($cuotaValor->getOid(), 'null');
	
		$tableName = CPIQ_TABLE_CUOTA_VALOR;
	
		$sql = "UPDATE $tableName SET fechaDesde=$fechaDesde, fechaHasta=$fechaHasta, importe=$importe, importeIngeniero=$importeIngeniero  WHERE oid = $oid ";
	
		CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
	
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());
	
	}
	
	
}
?>