<?php

/**
 * Acción para inicializar el contexto
 * para editar una pago de cuota generada.
 *
 * @author Marcos
 * @since 02-12-2016
 *
 */

class PagarCuotaGeneradaInitAction extends EditEntityInitAction {

	
	protected function getEntity(){

		$entity = parent::getEntity();
		//$oUser = CdtSecureUtils::getUserLogged();
		
		$oCriteria = new CdtSearchCriteria();
		
		$oCriteria->addFilter("matriculado_oid", $entity->getMatriculado()->getOid(), "=" );
		$tTitulo = DAOFactory::getTituloDAO()->getTableName();
		$oCriteria->addFilter("$tTitulo.tituloPrincipal", 1, "=" );
		$managerCuotaGenerada =  ManagerFactory::getCuotaGeneradaManager();
        $oCuotaGeneradas = $managerCuotaGenerada->getEntities($oCriteria);
        $deudas = new ItemCollection();
        foreach ($oCuotaGeneradas as $oCuotaGenerada) {
        	//print_r($oCuotaGenerada->getMovCtaCte());
        	if (!$oCuotaGenerada->getMovCtaCte()->getOid()) {
        		$deudas->addItem($oCuotaGenerada);
        	}
        	else{
        		$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
				$oMovCtaCte = $managerMovCtaCte->getObjectByCode($oCuotaGenerada->getMovCtaCte()->getOid());
        		if($oMovCtaCte->getAnulacion()->getOid()){
        			$deudas->addItem($oCuotaGenerada);
        		}
        	}
        }
        $html = '';
        $html .= '<table style="width:100%; border-style: solid; border-width: 1px;  border-color: #666;margin-bottom:5px">';
        if ($deudas->size()>0) {
        	$oCriteria = new CdtSearchCriteria();
			$oCriteria->addOrder('oid','DESC');
			$oCriteria->setPage(1);
			$oCriteria->setRowPerPage(1);
			$managerCuota =  ManagerFactory::getCuotaManager();
	        $oCuota = $managerCuota->getEntity($oCriteria);
	      
	        $oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('matriculado_oid', $entity->getMatriculado()->getOid(), '=');
			$oCriteria->addFilter("tituloPrincipal", 1, "=" );
			$managerTitulo = new TituloManager();
			$oTitulo = $managerTitulo->getEntity($oCriteria);
	        
	        
        	$managerCuota =  ManagerFactory::getCuotaManager();
			$cuotaValores = $managerCuota->getValoresCuota($oCuota->getOid());
			$importe=0;
			foreach ($cuotaValores as $oCuotaValor) {
				if ((date(DB_DEFAULT_DATE_FORMAT)>=$oCuotaValor->getFechaDesde())&&(date(DB_DEFAULT_DATE_FORMAT)<=$oCuotaValor->getFechaHasta())) {
					$importe = ($oTitulo->getTipoTitulo()->getIngenieroLicenciado()==1)?$oCuotaValor->getImporteIngeniero():$oCuotaValor->getImporte();
				}
			}
	        
	        foreach ($deudas as $deuda) {
				$html .= '<tr style="border-style: solid; border-width: 1px; border-color: #666">
                        <td style="text-align:center;">'.$deuda->getNombre().'</td><td><label for="importe_'.$deuda->getOid().'">Importe *:</label><input class="txt" onChange="sumar_total(this);" id="importe_'.$deuda->getOid().'" name="importe_'.$deuda->getOid().'" value="'.$importe.'" size="5" jval="{valid:function (val) { return required(val,\'Importe es requerido\')+number(val,\'no es un formato de número\'); }}" type="text"></td></tr>';
			}
			
        }
        else{
        	$html .= '<tr style="border-style: solid; border-width: 1px; border-color: #666">
                        <td>No registra deudas</td></tr>';
        }
	 	$html .= '</table>';
		$entity->setDs_contenido($html);
		
		
		//CYTSecureUtils::logObject($entity);
		return $entity;
	}
	
	protected function parseEntity($entity, XTemplate $xtpl) {

			
		
		parent::parseEntity($entity, $xtpl);
		
	}
	
	protected function getEntityManager(){
		
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewFormInstance()
	 */
	public function getNewFormInstance($action){
		$form = new CMPPagarCuotaForm($action);
		
		return $form;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getNewEntityInstance()
	 */
	public function getNewEntityInstance(){
		$oPagarCuota = new PagarCuota();
		$filter = new CMPCuotaGeneradaFilter();
		$filter->fillSavedProperties();
		$oPagarCuota->setMatriculado($filter->getMatriculado());
		return $oPagarCuota;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return CPIQ_MSG_CUOTA_PAGAR_CUOTA_GENERADA;
	}

	/**
	 * (non-PHPdoc)
	 * @see classes/com/gestion/action/entities/EditEntityInitAction::getSubmitAction()
	 */
	protected function getSubmitAction(){
		return "pagar_cuotaGenerada";
	}


}
