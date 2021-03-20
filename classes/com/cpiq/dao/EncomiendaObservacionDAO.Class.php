<?php

/**
 * DAO para observaciones de la encomienda
 *
 * @author Marcos
 * @since 10-10-2013
 */
class EncomiendaObservacionDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ENCOMIENDA_OBSERVACION;
	}

	public function getEntityFactory(){
		return new EncomiendaObservacionFactory();
	}
	
	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		
		$fieldsValues["encomienda_oid"] = $this->formatIfNull( $entity->getEncomienda()->getOid(), 'null' );
		$fieldsValues["observacion"] = $this->formatString( $entity->getObservacion() );
		
		
		
		
		$fieldsValues["user_oid"] = $this->formatIfNull( $entity->getUser()->getCd_user(), 'null' );
		$fieldsValues["fechaUltModificacion"] = $this->formatString($entity->getFechaUltModificacion());

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tEncomiendaObservacion = $this->getTableName();
		
		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		
		$tUser = CPIQ_TABLE_CDT_USER;
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tEncomienda . " ON($tEncomiendaObservacion.encomienda_oid = $tEncomienda.oid)";
        
        $sql .= " LEFT JOIN " . $tUser . " ON($tEncomiendaObservacion.user_oid = $tUser.cd_user)";
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tEncomienda.oid as " . $tEncomienda . "_oid ";
        $fields[] = "$tEncomienda.numero as " . $tEncomienda . "_numero ";
                
       
        
        $tUser = CPIQ_TABLE_CDT_USER;
		$fields[] = "$tUser.cd_user";
        $fields[] = "$tUser.ds_username";
        
        return $fields;
	}	
	
	

}
?>