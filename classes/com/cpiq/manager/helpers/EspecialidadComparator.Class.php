<?php
class EspecialidadComparator implements IItemComparator{
	
	function equals( $oObjeto1, $oObjeto2){
		return ($oObjeto1->getTitulo()->getOid() == $oObjeto2->getTitulo()->getOid());
	
	}
	
}