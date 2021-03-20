<?php

/**
 * DAO para Título
 *
 * @author Marcos
 * @since 12-06-2013
 */
class TituloDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_TITULO;
	}

	public function getEntityFactory(){
		return new TituloFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["tipoTitulo_oid"] = $this->formatIfNull( $entity->getTipoTitulo()->getOid(), 'null' );
		$fieldsValues["matriculado_oid"] = $this->formatIfNull( $entity->getMatriculado()->getOid(), 'null' );
		$fieldsValues["entidadEmisora_oid"] = $this->formatIfNull( $entity->getEntidadEmisora()->getOid(), 'null' );
		$fieldsValues["tituloPrincipal"] = $this->formatIfNull( $entity->getTituloPrincipal(), '0' );
		$fieldsValues["matricula"] = $this->formatString( $entity->getMatricula() );
		$fieldsValues["fechaExpedicion"] = $this->formatDate( $entity->getFechaExpedicion() );
		$fieldsValues["fechaMatriculacion"] = $this->formatDate( $entity->getFechaMatriculacion() );
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tTitulo = $this->getTableName();
		$tTipoTitulo = DAOFactory::getTipoTituloDAO()->getTableName();
		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$tEntidadEmisora = DAOFactory::getEntidadEmisoraDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		$tSecuenciaTitulo = DAOFactory::getSecuenciaTituloDAO()->getTableName();
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tTipoTitulo . " ON($tTitulo.tipoTitulo_oid = $tTipoTitulo.oid)";
        $sql .= " LEFT JOIN " . $tMatriculado . " ON($tTitulo.matriculado_oid = $tMatriculado.oid)";
       	$sql .= " LEFT JOIN " . $tEntidadEmisora . " ON($tTitulo.entidadEmisora_oid = $tEntidadEmisora.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tTitulo.user_oid = $tUser.cd_user)";
        $sql .= " LEFT JOIN " . $tSecuenciaTitulo . " ON($tTipoTitulo.secuenciaTitulo_oid = $tSecuenciaTitulo.oid)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tTipoTitulo = DAOFactory::getTipoTituloDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tTipoTitulo.oid as " . $tTipoTitulo . "_oid ";
        $fields[] = "$tTipoTitulo.nombre as " . $tTipoTitulo . "_nombre ";
        $fields[] = "$tTipoTitulo.ingenieroLicenciado as " . $tTipoTitulo . "_ingenieroLicenciado ";
        
        $tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$fields[] = "$tMatriculado.oid as " . $tMatriculado . "_oid ";
        $fields[] = "$tMatriculado.nombre as " . $tMatriculado . "_nombre ";
        $fields[] = "$tMatriculado.apellido as " . $tMatriculado . "_apellido ";
        
        $tEntidadEmisora = DAOFactory::getEntidadEmisoraDAO()->getTableName();
		$fields[] = "$tEntidadEmisora.oid as " . $tEntidadEmisora . "_oid ";
        $fields[] = "$tEntidadEmisora.nombre as " . $tEntidadEmisora . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        $tSecuenciaTitulo = DAOFactory::getSecuenciaTituloDAO()->getTableName();
        $fields[] = "$tSecuenciaTitulo.oid as " . $tSecuenciaTitulo . "_oid ";
        $fields[] = "$tSecuenciaTitulo.nombre as " . $tSecuenciaTitulo . "_nombre ";
        
        return $fields;
	}	
	
	public function ponerNoPrincipal($matriculado_oid){
		$db = CdtDbManager::getConnection($idConn);

        $tableName = $this->getTableName();
        
        $sql = "UPDATE $tableName SET tituloPrincipal=0 WHERE matriculado_oid = $matriculado_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
		
	}

}
?>