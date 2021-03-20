<?php

class CMPProvinciaAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Provincia";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "nombre";
	}
	
	protected function getFieldSearchParent(){
		return "pais_oid";
	}
	protected function getEntityManager(){
		return ManagerFactory::getProvinciaManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "oid";
		$properties[] = "nombre";
		$this->setPropertiesList($properties);
	}

	/*
	protected function getCriteria($text, $parent=null){
		$criterio = new CdtSearchCriteria();

		$tLocalidad = DAOFactory::getLocalidadDAO()->getTableName();
		$filterNombre  = new CdtFilterExpression( "$tLocalidad.nombre", $text, "like", new CdtCriteriaFormatLikeValue());

		$criterio->setExpresion($filterNombre);

		return $criterio;
	}*/

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getNombre() . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}

}
?>