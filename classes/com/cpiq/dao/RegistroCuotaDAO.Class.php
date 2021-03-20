<?php

/**
 * DAO para Registro Cuota
 *
 * @author Marcos
 * @since 04-07-2013
 */
class RegistroCuotaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_REGISTRO_CUOTA;
	}

	public function getEntityFactory(){
		return new RegistroCuotaFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["registro_oid"] = $this->formatIfNull( $entity->getRegistro()->getOid(), 'null' );
		
		$fieldsValues["year"] = $this->formatIfNull( $entity->getYear(), '0' );
		$fieldsValues["importe"] = $this->formatIfNull( $entity->getImporte(), '0' );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tRegistroCuota = $this->getTableName();
		
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tRegistro . " ON($tRegistroCuota.registro_oid = $tRegistro.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tRegistroCuota.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tRegistro = DAOFactory::getRegistroDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tRegistro.oid as " . $tRegistro . "_oid ";
        $fields[] = "$tRegistro.nombre as " . $tRegistro . "_nombre ";
        $fields[] = "$tRegistro.sigla as " . $tRegistro . "_sigla ";
        
        
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	

}
?>