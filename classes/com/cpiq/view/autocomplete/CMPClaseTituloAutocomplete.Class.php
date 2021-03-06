<?php
class CMPClaseTituloAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "ClaseTitulo";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "nombre";
	}
	
	protected function getFieldSearchParent(){
		return "";
	}
	protected function getEntityManager(){
		return ManagerFactory::getClaseTituloManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "oid";
		$properties[] = "nombre";
		$this->setPropertiesList($properties);
	}

	

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getNombre() . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}

}
?>