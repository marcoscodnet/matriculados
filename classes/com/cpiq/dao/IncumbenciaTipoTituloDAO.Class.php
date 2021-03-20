<?php

/**
 * DAO para Incumbencia TipoTitulo
 *
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaTipoTituloDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_INCUMBENCIA_TIPO_TITULO;
	}

	public function getEntityFactory(){
		return new IncumbenciaTipoTituloFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["incumbencia_oid"] = $this->formatIfNull( $entity->getIncumbencia()->getOid(), 'null' );
		
		$fieldsValues["tipoTitulo_oid"] = $this->formatIfNull( $entity->getTipoTitulo()->getOid(), 'null' );
		
		
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tIncumbenciaTipoTitulo = $this->getTableName();
		
		$tIncumbencia = DAOFactory::getIncumbenciaDAO()->getTableName();
		$tTipoTitulo = DAOFactory::getTipoTituloDAO()->getTableName();
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tIncumbencia . " ON($tIncumbenciaTipoTitulo.incumbencia_oid = $tIncumbencia.oid)";
        $sql .= " LEFT JOIN " . $tTipoTitulo . " ON($tIncumbenciaTipoTitulo.tipoTitulo_oid = $tTipoTitulo.oid)";
        $sql .= " LEFT JOIN " . $tUser . " ON($tIncumbenciaTipoTitulo.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tIncumbencia = DAOFactory::getIncumbenciaDAO()->getTableName();
		$tTipoTitulo = DAOFactory::getTipoTituloDAO()->getTableName();
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tIncumbencia.oid as " . $tIncumbencia . "_oid ";
        $fields[] = "$tIncumbencia.nombre as " . $tIncumbencia . "_nombre ";
                
        $fields[] = "$tTipoTitulo.oid as " . $tTipoTitulo . "_oid ";
        $fields[] = "$tTipoTitulo.nombre as " . $tTipoTitulo . "_nombre ";
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	

}
?>