<?php

/**
 * DAO para Registro Matriculado
 *
 * @author Marcos
 * @since 19-09-2013
 */
class RegistroMatriculadoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_REGISTRO_MATRICULADO;
	}

	public function getEntityFactory(){
		return new RegistroMatriculadoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["matriculado_oid"] = $this->formatIfNull( $entity->getMatriculado()->getOid(), 'null' );
		$fieldsValues["registro_oid"] = $this->formatIfNull( $entity->getRegistro()->getOid(), 'null' );
		
		$fieldsValues["fecha"] = $this->formatDate( $entity->getFecha() );
		
		$fieldsValues["numero"] = $this->formatString( $entity->getNumero() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tRegistroMatriculado = $this->getTableName();
		
		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tMatriculado . " ON($tRegistroMatriculado.matriculado_oid = $tMatriculado.oid)";
        $sql .= " LEFT JOIN " . $tTitulo . " ON($tRegistroMatriculado.matriculado_oid = $tTitulo.matriculado_oid)";
        
        $sql .= " LEFT JOIN " . $tRegistro . " ON($tRegistroMatriculado.registro_oid = $tRegistro.oid)";
       
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tRegistroMatriculado.user_oid = $tUser.cd_user)";
       
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
        
        
		
       
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	

}
?>