<?php

/**
 * DAO para TipoTitulo
 *
 * @author Bernardo
 * @since 17-05-2013
 */
class TipoTituloDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_TIPO_TITULO;
	}

	public function getEntityFactory(){
		return new TipoTituloFactory();
	}

	public function getFieldsToAdd($entity){

		$fieldsValues = array();

		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() );
		
		$fieldsValues["claseTitulo_oid"] = $this->formatIfNull( $entity->getClaseTitulo()->getOid(), 'null' );
		
		$fieldsValues["secuenciaTitulo_oid"] = $this->formatIfNull( $entity->getSecuenciaTitulo()->getOid(), 'null' );
		
		$fieldsValues["ingenieroLicenciado"] = $this->formatIfNull( $entity->getIngenieroLicenciado(), '0' );

		return $fieldsValues;
	}
	
	public function getFromToSelect(){
		
		$tTipoTitulo = $this->getTableName();
		$tClaseTitulo = DAOFactory::getClaseTituloDAO()->getTableName();
		$tSecuenciaTitulo = DAOFactory::getSecuenciaTituloDAO()->getTableName();
		
		
        $sql  = parent::getFromToSelect();
        $sql .= " LEFT JOIN " . $tClaseTitulo . " ON($tTipoTitulo.claseTitulo_oid = $tClaseTitulo.oid)";
        $sql .= " LEFT JOIN " . $tSecuenciaTitulo . " ON($tTipoTitulo.secuenciaTitulo_oid = $tSecuenciaTitulo.oid)";
        
        
        return $sql;
	}
	
	public function getFieldsToSelect(){
		
		$tClaseTitulo = DAOFactory::getClaseTituloDAO()->getTableName();
		$tSecuenciaTitulo = DAOFactory::getSecuenciaTituloDAO()->getTableName();
		
		
		$fields = parent::getFieldsToSelect();
		
        $fields[] = "$tClaseTitulo.oid as " . $tClaseTitulo . "_oid ";
        $fields[] = "$tClaseTitulo.nombre as " . $tClaseTitulo . "_nombre ";
        $fields[] = "$tSecuenciaTitulo.oid as " . $tSecuenciaTitulo . "_oid ";
        $fields[] = "$tSecuenciaTitulo.nombre as " . $tSecuenciaTitulo . "_nombre ";
        $fields[] = "$tSecuenciaTitulo.ultMatricula as " . $tSecuenciaTitulo . "_ultMatricula ";
       
        
        return $fields;
	}	

}
?>