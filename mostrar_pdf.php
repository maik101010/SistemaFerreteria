<?php
require('fpdf.php');
header('Content-Type: text/html; charset=UTF-8');

class PDF extends FPDF
{
	function FancyTableTwo($header, $data)
	{
	    // --- SetFillColor, COLOR DE fondo de los titulos de la tabla
	    $this->SetFillColor(50, 128, 169);
	    // --- SetTextColor, COLOR del texto de la tabla
	    $this->SetTextColor(255);
	    $this->SetDrawColor(0);
	    $this->SetLineWidth(.6);
	    $this->SetFont('','B');
	    //-----OJO---- Cabecera
	    $w = array(75, 65, 35);

	    for($i=0;$i<count($header);$i++)
	        $this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		    $this->Ln();
		    // Restauración de colores y fuentes
		    $this->SetFillColor(224,235,255);
		    $this->SetTextColor(0);
		    $this->SetFont('');
		    // Datos
		    $fill = false;
	    
	    foreach($data as $row)
	    {
	    	
	        $this->Cell($w[0],6,iconv('UTF-8', 'ISO-8859-2', $row['descripcion_tipo']),'LR',0,'L',$fill);
	        $this->Cell($w[1],6,iconv('UTF-8', 'ISO-8859-2', $row['unidad_medida']),'LR', 0,'L',$fill);
	        $this->Cell($w[2],6,iconv('UTF-8', 'ISO-8859-2', $row['precio']),'LR', 0,$fill);
	        $this->Ln();
	        //$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
	
	
	        $fill = !$fill;
	    }

	    // Línea de cierre
	    $this->Cell(array_sum($w),0,'','T');
	}

function FancyTable($header, $data)
	{
	    // Colores, ancho de línea y fuente en negrita
	     $this->SetFillColor(50, 128, 169);
	    // --- SetTextColor, COLOR del texto de la tabla
	    $this->SetTextColor(255);
	    $this->SetDrawColor(0);
	    $this->SetLineWidth(.6);
	    $this->SetFont('','B');
	    //-----OJO---- Cabecera
	    $w = array(55, 120);

	    for($i=0;$i<count($header);$i++)
	        $this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		    $this->Ln(5);
		    // Restauración de colores y fuentes
		    $this->SetFillColor(224,235,255);
		    $this->SetTextColor(0);
		    $this->SetFont('');
		    // Datos
		    $fill = false;
	    
	    foreach($data as $row)
	    {
	        $this->Cell($w[0],6, iconv('UTF-8', 'ISO-8859-2', $row['nombre']),'LR',0,'L',$fill);
	        $this->MultiCell($w[1],6,iconv('UTF-8', 'ISO-8859-2', $row['descripcion_producto']),'LR',$fill);
	
	        $this->Ln();
	        $fill = !$fill;
	    }

	  
	}

}
$pdf = new PDF();



// Títulos de las columnas
$titulo= "Nombre";
$titulo2 = "Descripción Del producto";

/**
 *
 * 	Solucionando la parte de las tildes
 */

$titulo = iconv('UTF-8', 'ISO-8859-2', $titulo);
$titulo2 = iconv('UTF-8', 'ISO-8859-2', $titulo2);

$header = array($titulo, $titulo2);

$header2 = array('Tipo de uso', 'Unidad de medida', 'Precio');
// Carga de datos


	include "php/conexion.php";

    $conexion = $con;

        /*
            Consulta que trae los usuarios de tipo "consultor", puesto que son los unicos que tienen un tema asociado
        */

    $id = $_GET["id"];

    $consulta = $conexion->query("SELECT tipo_uso.descripcion AS descripcion_tipo,  tipo_producto.tipo_producto, producto.nombre, producto.descripcion as descripcion_producto,	producto.unidad_medida
					FROM producto LEFT JOIN tipo_producto
					ON tipo_producto.id = producto.tipoproducto_id 
					LEFT JOIN tipo_uso ON tipo_producto.tipouso_id = tipo_uso.id
					WHERE producto.id = '$id'" );
    $data = $consulta;



$pdf->SetMargins(20,20,20);
$pdf->AddPage();

$pdf->Image('img/logo.jpg' , 20 ,22, 35 , 38,'JPG', 'http://www.facebook.com');
$pdf->Image('img/13.png' , 100 ,22, 100 , 38,'PNG', 'http://www.facebook.com');
$pdf->Ln(50);
$pdf->SetFont('Arial', 'B', 30);
$pdf->SetTextColor(26, 54, 68);
$pdf->Text(50, 80, iconv('UTF-8', 'ISO-8859-2', "Información del producto"));
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 14);
/**
 *Convertimos header a caracteres latinos
 * 
 */

$pdf->FancyTable($header, $data);

include "php/conexion.php";

    $conexion = $con;
    $id = $_GET["id"];

        /*
            Consulta que trae los usuarios de tipo "consultor", puesto que son los unicos que tienen un tema asociado
        */

    $consulta = $conexion->query("SELECT tipo_uso.descripcion AS descripcion_tipo,  tipo_producto.tipo_producto, producto.nombre, producto.descripcion as descripcion_producto,	producto.unidad_medida, concat('$', producto.precio) AS precio
					FROM producto LEFT JOIN tipo_producto
					ON tipo_producto.id = producto.tipoproducto_id 
					LEFT JOIN tipo_uso ON tipo_producto.tipouso_id = tipo_uso.id
					WHERE producto.id = '$id'" );
	$data = $consulta;
$pdf->Ln(10);
$pdf->FancyTableTwo($header2,$data);
$pdf->Output();
?>