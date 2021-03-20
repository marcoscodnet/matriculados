<?php

/**
 * DAO para Concepto
 *
 * @author Marcos
 * @since 25-07-2013
 */
class ConceptoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_CONCEPTO;
	}

	public function getEntityFactory(){
		return new ConceptoFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["coeficiente"] = $this->formatIfNull( $entity->getCoeficiente(), 'null' );
		$fieldsValues["tipoAsignado_oid"] = $this->formatIfNull( $entity->getTipoAsignado()->getOid(), 'null' );
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() );
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tConcepto = $this->getTableName();
		$tTipoAsignado = DAOFactory::getTipoAsignadoDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tTipoAsignado . " ON($tConcepto.tipoAsignado_oid = $tTipoAsignado.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tConcepto.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		
		
		$fields = parent::getFieldsToSelect();
		
        $tTipoAsignado = DAOFactory::getTipoAsignadoDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tTipoAsignado.oid as " . $tTipoAsignado . "_oid ";
        $fields[] = "$tTipoAsignado.nombre as " . $tTipoAsignado . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}
		
	
	
	
	
	
	
	
	
}
?>