<?php

/**
 * DAO para Incumbencia TipoEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 */
class IncumbenciaTipoEncomiendaDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_INCUMBENCIA_TIPO_ENCOMIENDA;
	}

	public function getEntityFactory(){
		return new IncumbenciaTipoEncomiendaFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["incumbencia_oid"] = $this->formatIfNull( $entity->getIncumbencia()->getOid(), 'null' );
		
		$fieldsValues["tipoEncomienda_oid"] = $this->formatIfNull( $entity->getTipoEncomienda()->getOid(), 'null' );
		
		
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tIncumbenciaTipoEncomienda = $this->getTableName();
		
		$tIncumbencia = DAOFactory::getIncumbenciaDAO()->getTableName();
		$tTipoEncomienda = DAOFactory::getTipoEncomiendaDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tIncumbencia . " ON($tIncumbenciaTipoEncomienda.incumbencia_oid = $tIncumbencia.oid)";
        $sql .= " LEFT JOIN " . $tTipoEncomienda . " ON($tIncumbenciaTipoEncomienda.tipoEncomienda_oid = $tTipoEncomienda.oid)";
        $sql .= " LEFT JOIN " . $tUser . " ON($tIncumbenciaTipoEncomienda.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tIncumbencia = DAOFactory::getIncumbenciaDAO()->getTableName();
		$tTipoEncomienda = DAOFactory::getTipoEncomiendaDAO()->getTableName();
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tIncumbencia.oid as " . $tIncumbencia . "_oid ";
        $fields[] = "$tIncumbencia.nombre as " . $tIncumbencia . "_nombre ";
                
        $fields[] = "$tTipoEncomienda.oid as " . $tTipoEncomienda . "_oid ";
        $fields[] = "$tTipoEncomienda.nombre as " . $tTipoEncomienda . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	

}
?>