<?php

/**
 * DAO para Encomienda
 *
 * @author Marcos
 * @since 04-10-2013
 */
class EncomiendaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ENCOMIENDA;
	}

	public function getEntityFactory(){
		return new EncomiendaFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["numero"] = $this->formatString( $entity->getNumero() );
		$fieldsValues["matriculado_oid"] = $this->formatIfNull( $entity->getMatriculado()->getOid(), 'null' );
		$fieldsValues["tipoEncomienda_oid"] = $this->formatIfNull( $entity->getTipoEncomienda()->getOid(), 'null' );
		$fieldsValues["fecha"] = $this->formatDate( $entity->getFecha() );
		$fieldsValues["comitente"] = $this->formatString( $entity->getComitente() );
		$fieldsValues["tipoComitente"] = $this->formatIfNull( $entity->getTipoComitente(), '0' );
		$fieldsValues["representante"] = $this->formatString( $entity->getRepresentante() );
		$fieldsValues["tipoDocumento_oid"] = $this->formatIfNull( $entity->getTipoDocumento()->getOid(), 'null' );
		$fieldsValues["documento"] = $this->formatString( $entity->getDocumento() );
		$fieldsValues["cuil"] = $this->formatString( $entity->getCuil() );
		$fieldsValues["domicilio"] = $this->formatString( $entity->getDomicilio() );
		$fieldsValues["localidad_oid"] = $this->formatIfNull( $entity->getLocalidad()->getOid(), 'null' );
		$fieldsValues["cp"] = $this->formatString( $entity->getCp() );
		$fieldsValues["telefono"] = $this->formatString( $entity->getTelefono() );
		$fieldsValues["seguridad"] = $this->formatString( $entity->getSeguridad() );
		$fieldsValues["primero"] = $this->formatString( $entity->getPrimero() );
		$fieldsValues["segundo"] = $this->formatString( $entity->getSegundo() );
		$fieldsValues["tercero"] = $this->formatString( $entity->getTercero() );
		$fieldsValues["cuarto"] = $this->formatString( $entity->getCuarto() );
		$fieldsValues["quinto"] = $this->formatString( $entity->getQuinto() );
		$fieldsValues["posFirmaComitente"] = $this->formatString( $entity->getPosFirmaComitente() );
		$fieldsValues["seguridadTexto"] = $this->formatString( $entity->getSeguridadTexto() );
		$fieldsValues["piePagina"] = $this->formatString( $entity->getPiePagina() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFieldsToUpdate($entity){

		$fieldsValues = array();

		$fieldsValues["numero"] = $this->formatString( $entity->getNumero() );
		$fieldsValues["matriculado_oid"] = $this->formatIfNull( $entity->getMatriculado()->getOid(), 'null' );
		$fieldsValues["tipoEncomienda_oid"] = $this->formatIfNull( $entity->getTipoEncomienda()->getOid(), 'null' );
		$fieldsValues["fecha"] = $this->formatDate( $entity->getFecha() );
		$fieldsValues["comitente"] = $this->formatString( $entity->getComitente() );
		$fieldsValues["tipoComitente"] = $this->formatIfNull( $entity->getTipoComitente(), '0' );
		$fieldsValues["representante"] = $this->formatString( $entity->getRepresentante() );
		$fieldsValues["tipoDocumento_oid"] = $this->formatIfNull( $entity->getTipoDocumento()->getOid(), 'null' );
		$fieldsValues["documento"] = $this->formatString( $entity->getDocumento() );
		$fieldsValues["cuil"] = $this->formatString( $entity->getCuil() );
		$fieldsValues["domicilio"] = $this->formatString( $entity->getDomicilio() );
		$fieldsValues["localidad_oid"] = $this->formatIfNull( $entity->getLocalidad()->getOid(), 'null' );
		$fieldsValues["cp"] = $this->formatString( $entity->getCp() );
		$fieldsValues["telefono"] = $this->formatString( $entity->getTelefono() );
		$fieldsValues["seguridad"] = $this->formatString( $entity->getSeguridad() );
		
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tEncomienda = $this->getTableName();
		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$tTipoEncomienda = DAOFactory::getTipoEncomiendaDAO()->getTableName();
		$tTipoDocumento = DAOFactory::getTipoDocumentoDAO()->getTableName();
		$tLocalidad = DAOFactory::getLocalidadDAO()->getTableName();
		$tProvincia = DAOFactory::getProvinciaDAO()->getTableName();
		$tPais = DAOFactory::getPaisDAO()->getTableName();
		$tTipoEstadoEncomienda = DAOFactory::getTipoEstadoEncomiendaDAO()->getTableName();
		$tEncomiendaEstado = DAOFactory::getEncomiendaEstadoDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tMatriculado . " ON($tEncomienda.matriculado_oid = $tMatriculado.oid)";
        $sql .= " LEFT JOIN " . $tTipoEncomienda . " ON($tEncomienda.tipoEncomienda_oid = $tTipoEncomienda.oid)";
        $sql .= " LEFT JOIN " . $tTipoDocumento . " ON($tEncomienda.tipoDocumento_oid = $tTipoDocumento.oid)";
        $sql .= " LEFT JOIN " . $tLocalidad . " ON($tEncomienda.localidad_oid = $tLocalidad.oid)";
        $sql .= " LEFT JOIN " . $tProvincia . " ON($tLocalidad.provincia_oid = $tProvincia.oid)";
        $sql .= " LEFT JOIN " . $tPais . " ON($tProvincia.pais_oid = $tPais.oid)";
        $sql .= " LEFT JOIN " . $tUser . " ON($tEncomienda.user_oid = $tUser.cd_user)";
        $sql .= " LEFT JOIN " . $tEncomiendaEstado . " ON($tEncomiendaEstado.encomienda_oid = $tEncomienda.oid)";
        $sql .= " LEFT JOIN " . $tTipoEstadoEncomienda . " ON($tEncomiendaEstado.tipoEstadoEncomienda_oid = $tTipoEstadoEncomienda.oid)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tTipoEncomienda = DAOFactory::getTipoEncomiendaDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tTipoEncomienda.oid as " . $tTipoEncomienda . "_oid ";
        $fields[] = "$tTipoEncomienda.nombre as " . $tTipoEncomienda . "_nombre ";
        
         $tTipoDocumento = DAOFactory::getTipoDocumentoDAO()->getTableName();
        $fields[] = "$tTipoDocumento.oid as " . $tTipoDocumento . "_oid ";
        $fields[] = "$tTipoDocumento.nombre as " . $tTipoDocumento . "_nombre ";
        
        $tLocalidad = DAOFactory::getLocalidadDAO()->getTableName();
		$fields[] = "$tLocalidad.oid as " . $tLocalidad . "_oid ";
        $fields[] = "$tLocalidad.nombre as " . $tLocalidad . "_nombre ";
        
        $tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$fields[] = "$tMatriculado.oid as " . $tMatriculado . "_oid ";
        $fields[] = "$tMatriculado.nombre as " . $tMatriculado . "_nombre ";
        $fields[] = "$tMatriculado.apellido as " . $tMatriculado . "_apellido ";
        
        $tTipoEstadoEncomienda = DAOFactory::getTipoEstadoEncomiendaDAO()->getTableName();
		$fields[] = "$tTipoEstadoEncomienda.oid as " . $tTipoEstadoEncomienda . "_oid ";
        $fields[] = "$tTipoEstadoEncomienda.nombre as " . $tTipoEstadoEncomienda . "_nombre ";
        
        $tEncomiendaEstado = DAOFactory::getEncomiendaEstadoDAO()->getTableName();
		$fields[] = "$tEncomiendaEstado.oid as " . $tEncomiendaEstado . "_oid ";
        $fields[] = "$tEncomiendaEstado.fechaDesde as " . $tEncomiendaEstado . "_fechaDesde ";
        $fields[] = "$tEncomiendaEstado.fechaHasta as " . $tEncomiendaEstado . "_fechaHasta ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	

}
?>