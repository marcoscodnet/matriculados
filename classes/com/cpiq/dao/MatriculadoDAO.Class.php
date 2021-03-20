<?php

/**
 * DAO para Matriculado
 *
 * @author Bernardo
 * @since 22-05-2013
 */
class MatriculadoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_MATRICULADO;
	}

	public function getEntityFactory(){
		return new MatriculadoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() );
		$fieldsValues["apellido"] = $this->formatString( $entity->getApellido() );
		$fieldsValues["email"] = $this->formatString( $entity->getEmail() );
		$fieldsValues["tipoDocumento_oid"] = $this->formatIfNull( $entity->getTipoDocumento()->getOid(), 'null' );
		$fieldsValues["nroDocumento"] = $this->formatString( $entity->getNroDocumento() );
		$fieldsValues["fechaNacimiento"] = $this->formatDate( $entity->getFechaNacimiento() );
		$fieldsValues["sexo"] = $this->formatString( $entity->getSexo() );
		$fieldsValues["localidad_oid"] = $this->formatIfNull( $entity->getLocalidad()->getOid(), 'null' );
		$fieldsValues["domicilio"] = $this->formatString( $entity->getDomicilio() );
		$fieldsValues["codigoPostal"] = $this->formatString( $entity->getCodigoPostal() );
		$fieldsValues["teParticular"] = $this->formatString( $entity->getTeParticular() );
		$fieldsValues["teLaboral"] = $this->formatString( $entity->getTeLaboral() );
		$fieldsValues["teMovil"] = $this->formatString( $entity->getTeMovil() );
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());
		

		return $fieldsValues;
	}
	
	public function getFieldsToUpdate($entity){

		$fieldsValues = array();

		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() );
		$fieldsValues["apellido"] = $this->formatString( $entity->getApellido() );
		$fieldsValues["email"] = $this->formatString( $entity->getEmail() );
		$fieldsValues["tipoDocumento_oid"] = $this->formatIfNull( $entity->getTipoDocumento()->getOid(), 'null' );
		$fieldsValues["nroDocumento"] = $this->formatString( $entity->getNroDocumento() );
		$fieldsValues["fechaNacimiento"] = $this->formatDate( $entity->getFechaNacimiento() );
		$fieldsValues["sexo"] = $this->formatString( $entity->getSexo() );
		$fieldsValues["localidad_oid"] = $this->formatIfNull( $entity->getLocalidad()->getOid(), 'null' );
		$fieldsValues["domicilio"] = $this->formatString( $entity->getDomicilio() );
		$fieldsValues["codigoPostal"] = $this->formatString( $entity->getCodigoPostal() );
		$fieldsValues["teParticular"] = $this->formatString( $entity->getTeParticular() );
		$fieldsValues["teLaboral"] = $this->formatString( $entity->getTeLaboral() );
		$fieldsValues["teMovil"] = $this->formatString( $entity->getTeMovil() );
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());
		$fieldsValues["cd_user"] = $this->formatIfNull( $entity->getCdtUser()->getCd_user(), 'null' );

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tMatriculado = $this->getTableName();
		$tTipoDocumento = DAOFactory::getTipoDocumentoDAO()->getTableName();
		$tLocalidad = DAOFactory::getLocalidadDAO()->getTableName();
		$tProvincia = DAOFactory::getProvinciaDAO()->getTableName();
		$tPais = DAOFactory::getPaisDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		$tCdtUser = CPIQ_TABLE_CDT_USER;
		$tHistoricoEstado = DAOFactory::getHistoricoEstadoDAO()->getTableName();
		$tEstadoMatriculado = DAOFactory::getEstadoMatriculadoDAO()->getTableName();
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tTipoDocumento . " ON($tMatriculado.tipoDocumento_oid = $tTipoDocumento.oid)";
        $sql .= " LEFT JOIN " . $tLocalidad . " ON($tMatriculado.localidad_oid = $tLocalidad.oid)";
        $sql .= " LEFT JOIN " . $tProvincia . " ON($tLocalidad.provincia_oid = $tProvincia.oid)";
        $sql .= " LEFT JOIN " . $tPais . " ON($tProvincia.pais_oid = $tPais.oid)";
        $sql .= " LEFT JOIN " . $tUser . " ON($tMatriculado.user_oid = $tUser.cd_user)";
        $sql .= " LEFT JOIN " . $tCdtUser . " U ON($tMatriculado.cd_user = U.cd_user)";
        $sql .= " LEFT JOIN " . $tHistoricoEstado . " ON($tMatriculado.oid = $tHistoricoEstado.matriculado_oid)";
        $sql .= " LEFT JOIN " . $tEstadoMatriculado . " ON($tEstadoMatriculado.oid = $tHistoricoEstado.estadoMatriculado_oid)";
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tTipoDocumento = DAOFactory::getTipoDocumentoDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tTipoDocumento.oid as " . $tTipoDocumento . "_oid ";
        $fields[] = "$tTipoDocumento.nombre as " . $tTipoDocumento . "_nombre ";
        
        $tLocalidad = DAOFactory::getLocalidadDAO()->getTableName();
		$fields[] = "$tLocalidad.oid as " . $tLocalidad . "_oid ";
        $fields[] = "$tLocalidad.nombre as " . $tLocalidad . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        $tCdtUser = 'U';
		$fields[] = "$tCdtUser.cd_user as " . $tCdtUser . "_user_oid ";
        $fields[] = "$tCdtUser.ds_username as " . $tCdtUser . "_user_name ";
        
        $tEstadoMatriculado = DAOFactory::getEstadoMatriculadoDAO()->getTableName();
		$fields[] = "$tEstadoMatriculado.oid as " . $tEstadoMatriculado . "_oid ";
        $fields[] = "$tEstadoMatriculado.nombre as " . $tEstadoMatriculado . "_nombre ";
        
        return $fields;
	}	

}
?>