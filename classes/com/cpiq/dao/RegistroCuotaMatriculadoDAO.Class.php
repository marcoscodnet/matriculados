<?php

/**
 * DAO para Registro Matriculado
 *
 * @author Marcos
 * @since 19-09-2013
 */
class RegistroCuotaMatriculadoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_REGISTRO_CUOTA_MATRICULADO;
	}

	public function getEntityFactory(){
		return new RegistroCuotaMatriculadoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["matriculado_oid"] = $this->formatIfNull( $entity->getMatriculado()->getOid(), 'null' );
		$fieldsValues["registroCuota_oid"] = $this->formatIfNull( $entity->getRegistroCuota()->getOid(), 'null' );
		$fieldsValues["movCtaCte_oid"] = $this->formatIfNull( $entity->getMovCtaCte()->getOid(), 'null' );
		$fieldsValues["movCtaCteDeuda_oid"] = $this->formatIfNull( $entity->getMovCtaCteDeuda()->getOid(), 'null' );
		
		$fieldsValues["fecha"] = $this->formatDate( $entity->getFecha() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tRegistroCuotaMatriculado = $this->getTableName();
		
		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$tRegistroCuota = DAOFactory::getRegistroCuotaDAO()->getTableName();
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		$tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tMatriculado . " ON($tRegistroCuotaMatriculado.matriculado_oid = $tMatriculado.oid)";
        $sql .= " LEFT JOIN " . $tTitulo . " ON($tRegistroCuotaMatriculado.matriculado_oid = $tTitulo.matriculado_oid)";
        $sql .= " LEFT JOIN " . $tRegistroCuota . " ON($tRegistroCuotaMatriculado.registroCuota_oid = $tRegistroCuota.oid)";
        $sql .= " LEFT JOIN " . $tRegistro . " ON($tRegistroCuota.registro_oid = $tRegistro.oid)";
        $sql .= " LEFT JOIN " . $tMovCtaCte . " ON($tRegistroCuotaMatriculado.movCtaCte_oid = $tMovCtaCte.oid)";
        $sql .= " LEFT JOIN " . $tMovCtaCte . " DEUDA ON($tRegistroCuotaMatriculado.movCtaCteDeuda_oid = DEUDA.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tRegistroCuotaMatriculado.user_oid = $tUser.cd_user)";
       
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		$fields[] = "$tRegistro.oid as " . $tRegistro . "_oid ";
        $fields[] = "$tRegistro.nombre as " . $tRegistro . "_nombre ";
        $fields[] = "$tRegistro.sigla as " . $tRegistro . "_sigla ";
        
        $tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
        $fields[] = "$tMatriculado.oid as " . $tMatriculado . "_oid ";
        $fields[] = "$tMatriculado.nombre as " . $tMatriculado . "_nombre ";
        $fields[] = "$tMatriculado.apellido as " . $tMatriculado . "_apellido ";
        
        $tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$fields[] = "$tTitulo.oid as " . $tTitulo . "_oid ";
        $fields[] = "$tTitulo.matricula as " . $tTitulo . "_matricula ";
        
        
		$fields[] = "DEUDA.oid as DEUDA_oid ";
        $fields[] = "DEUDA.importe as DEUDA_importe ";
        
        $tMovCtaCte = DAOFactory::getMovCtaCteDAO()->getTableName();
		$fields[] = "$tMovCtaCte.oid as " . $tMovCtaCte . "_oid ";
        $fields[] = "$tMovCtaCte.importe as " . $tMovCtaCte . "_importe ";
        
        $tRegistroCuota = DAOFactory::getRegistroCuotaDAO()->getTableName();
		$fields[] = "$tRegistroCuota.oid as " . $tRegistroCuota . "_oid ";
        $fields[] = "$tRegistroCuota.year as " . $tRegistroCuota . "_year ";
       
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	

}
?>