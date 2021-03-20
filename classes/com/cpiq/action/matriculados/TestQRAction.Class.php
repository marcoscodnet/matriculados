<?php

/**
 * Test para código QR
 *
 * @author Bernardo
 * @since 07-10-2013
 *
 */
class TestQRAction extends CdtAction{

	
	public function execute(){

		/* 
		 *  Pinia, para generar el QR se pide lo siguiente:
		 *  
		 *  Nº de encomienda + 
		 *  Código de verificación + 
		 *  Apellido y nombre del matriculado + 
		 *  tarea profesional asignada + 
		 *  nombre o razón social del comitente + 
		 *  fecha de la encomienda.
		 *   
		 *  Con toda esa info te armás un string y se lo pasás a CPIQUtils::generarQRCode($texto)
		 *  
		 *  Esa función te devuelve la url de la imagen generada que sería
		 *  lo que agregás al pdf.
		 *  
		 *  Hay formas preestablecidas para escribir cierta información pero también se puede ingresar texto
		 *  libre. Como lo que se pide acá es algo específico del sistema, hay que generarlo usando texto libre.
		 *  De todas maneras, alguien lo va a leer, habría que ver quién, asi que en el ejemplo le puse la data
		 *  entre tags, como para saber de qué se trata la info que está escrita.
		 *  
		 *   
		 *  Una vez que generás la imagen podés usar este link
		 *  para chequear si quedó bien armada:
		 *  
		 *  http://www.webqr.com/
		 *  
		 *  Es una página que le subís el png y te lee lo que contiene el QR code.
		 */
		
		$texto  = "<encomienda>xxx</encomienda>";		
		$texto .= "<codigo_verificacion>xxx</codigo_verificacion>";
		$texto .= "<matriculado>xxx</matriculado>";
		$texto .= "<tarea>xxx</tarea>";
		$texto .= "<comitente>xxx</comitente>";
		$texto .= "<fecha>xxx</fecha>";
		$imgSrc = CPIQUtils::generarQRCode($texto);
		
		echo "<img src=\"$imgSrc\">";
	}

	
}