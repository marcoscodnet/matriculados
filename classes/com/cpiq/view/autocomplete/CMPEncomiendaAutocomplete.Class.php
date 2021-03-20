<?php
class CMPEncomiendaAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Encomienda";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "numero";
	}
	
	
	protected function getEntityManager(){
		return ManagerFactory::getEncomiendaManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "oid";
		$properties[] = "numero";
	
		$this->setPropertiesList($properties);
	}
	
	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tEncomienda = DAOFactory::getEncomiendaDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "($tEncomienda.numero like '$text%')");

		$criterio->setExpresion($filter);

		return $criterio;
	}

	

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getNumero() . "</td>";
		
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}

}
?>