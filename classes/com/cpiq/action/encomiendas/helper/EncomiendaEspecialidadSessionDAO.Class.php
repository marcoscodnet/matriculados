<?php

/**
 * Helper DAO para administrar en sesión las especialidades de una 
 * encomienda.
 *  
 * @author Bernardo
 * @since 08-10-2013
 */
class EncomiendaEspecialidadSessionDAO extends EntityDAO {

	public function getFieldsToAdd($entity){}
	
	public function getFieldsToUpdate($entity){}
	
	public function getId($entity){}
		
	public function getIdFieldName(){}
	
	public function setId($entity, $id){}
	
	public function getTableName(){}
	
	public function getEntityFactory(){}
	
	public function getVariableSessionName(){
		return "encomienda_especialidades";
	}
	
    /**
     * se persiste la nueva entity
     * @param $entity entity a persistir.
     */
    public function addEntity( $entity, $idConn=0 ) {
    	
    	$especialidades = unserialize( $_SESSION[ $this->getVariableSessionName() ] );
    	
    	if( empty($especialidades) )
    		$especialidades = new ItemCollection();
    		
    	if (!$especialidades->existObjectComparator($entity, new EspecialidadComparator())) {
    		
    		$especialidades->addItem($entity);
    	}
    	 
        
        $_SESSION[$this->getVariableSessionName()] = serialize($especialidades);
        
    }
    
    /**
     */
    public function setEntities( $entities, $idConn=0 ) {
    	
        $_SESSION[$this->getVariableSessionName()] = serialize($entities);
        
    }
    
    /**
     * se modifica la entity
     * @param $entity entity a modificar.
     */
    public function updateEntity($entity, $idConn=0) {
        //TODO
    }

    /**
     * se elimina la entity
     * @param $id identificador de la entity a eliminar.
     */
    public function deleteEntity($oid, $idConn=0) {
    	
    	$oid = urldecode($oid);
    	
    	$especialidades = unserialize( $_SESSION[$this->getVariableSessionName()] );
    	
    	//el oid representaría el titulo??
    	$nuevasEspecialidades = new ItemCollection();
    	foreach ($especialidades as $especialidad) {
    		
    		if( $especialidad->getTitulo()->getOid() != $oid ){
    			$nuevasEspecialidades->addItem($especialidad);
    		}
    	}
    	
        $_SESSION[$this->getVariableSessionName()] = serialize($nuevasEspecialidades);
    	
    }

    /**
     * quitamos todas las especialidades de sesión
     */
    public function deleteAll() {
    	unset( $_SESSION[$this->getVariableSessionName()] ) ;
    	
    }
    /**
     * se obtiene una colección de entities dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return ItemCollection
     */
    public function getEntities(CdtSearchCriteria $oCriteria, $idConn=0) {

    	if(isset($_SESSION[$this->getVariableSessionName()]))
			$especialidades = unserialize( $_SESSION[$this->getVariableSessionName()] );
		else 
			$especialidades = new ItemCollection();	

		return $especialidades;
    }

    /**
     * se obtiene la cantidad de entities dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return int
     */
    public function getEntitiesCount(CdtSearchCriteria $oCriteria, $idConn=0) {
        
    	$especialidades = unserialize($this->getVariableSessionName() );

        return $especialidades->size();
    }

    /**
     * se obtiene un entity dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return Entity
     */
    public function getEntity(CdtSearchCriteria $oCriteria, $idConn=0) {
		//TODO
    }
	
	public function getEntityById($id) {
		//TODO
    }
		
}
?>