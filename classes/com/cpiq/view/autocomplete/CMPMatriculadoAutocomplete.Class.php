<?php
/**
 * 
 * Componente para autocomplete matriculados facturas.
 * 
 * @author bernardo
 * @since 23/05/2013
 */

class CMPMatriculadoAutocomplete extends CMPEntityAutocomplete{

	protected function getEntityClazz(){
		return "Matriculado";
	}

	protected function getFieldCode(){
		return "oid";
	}

	protected function getFieldSearch(){
		return "apellido,nombre";
	}

	protected function getEntityManager(){
		return ManagerFactory::getMatriculadoManager();
	}


	public function __construct(){
		$properties = array();
		$properties[] = "apellido";
		$properties[] = "nombre";
		$this->setPropertiesList($properties);
	}

	protected function getCriteria($text, $parent=null){
		
		$criterio = new CdtSearchCriteria();

		$tMatriculado = DAOFactory::getMatriculadoDAO()->getTableName();
		
		
		$filter = new CdtSimpleExpression( "($tMatriculado.nombre like '$text%') OR ($tMatriculado.apellido like '$text%')");

		$criterio->setExpresion($filter);

		return $criterio;
	}

	protected function getItemDropDown( $entity ){
		$dropdownItem = "<div id='autocomplete_item_desc'><table><tr>";
		$dropdownItem .= "<td>".  $entity->getApellido()  . "</td>";
		$dropdownItem .= "<td>".  $entity->getNombre()  . "</td>";
		$dropdownItem .= "</tr></table></div>";
		return $dropdownItem;
	}


}
?>