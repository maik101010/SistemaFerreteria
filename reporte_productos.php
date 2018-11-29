<?php
require('fpdf.php');
header('Content-Type: text/html; charset=UTF-8');

class PDF extends FPDF
{
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
		    $w = array(35, 50, 33, 30, 30);

		    for($i=0;$i<count($header);$i++)
		        $this->Cell($w[$i],6,$header[$i],1,0,'C',true);
			    $this->Ln(5);
			    // Restauración de colores y fuentes
			    $this->SetFillColor(224,235,255);
			    $this->SetTextColor(0);
			    $this->SetFont('');
			    // Datos
			    $fill = false;

			$contVenta=0;
		    
		    foreach($data as $row)
		    {
		        $this->Cell($w[0],6, iconv('UTF-8', 'ISO-8859-2', $row['referencia']),'LR',0,'C',$fill);
		        $this->Cell($w[1],6, iconv('UTF-8', 'ISO-8859-2', $row['nombre']),'LR',0,'C',$fill);
		        $this->Cell($w[2],6, iconv('UTF-8', 'ISO-8859-2', $row['marca']),'LR',0,'C',$fill);
		        $this->Cell($w[3],6, iconv('UTF-8', 'ISO-8859-2', $row['valor']),'LR',0,'C',$fill);
		        $this->Cell($w[4],6, iconv('UTF-8', 'ISO-8859-2', $row['cantidadStock']),'LR',0,'C',$fill);
		  		$this->Ln();

		  		$fill = !$fill;
		    }

		}

}
$pdf = new PDF();

// Títulos de las columnas
$titulo= "Referencia";
$titulo1= "Nombre";
$titulo2 = "Marca";
$titulo3 = "Valor";
$titulo4 = "Stock";

/**
 *
 * 	Solucionando la parte de las tildes
 */

$titulo = iconv('UTF-8', 'ISO-8859-2', $titulo);
$titulo1 = iconv('UTF-8', 'ISO-8859-2', $titulo1);
$titulo2 = iconv('UTF-8', 'ISO-8859-2', $titulo2);
$titulo3 = iconv('UTF-8', 'ISO-8859-2', $titulo3);
$titulo4 = iconv('UTF-8', 'ISO-8859-2', $titulo4);

$header = array($titulo, $titulo1, $titulo2, $titulo3, $titulo4);



include "php/conexion.php";

$conexion = $con;

    
$consulta = $conexion->query("SELECT * FROM producto");
//---Almacenamos la consulta
$data = $consulta;



$pdf->SetMargins(20,20,20);
$pdf->AddPage();

$pdf->Ln(50);
$pdf->SetFont('Arial', 'B', 30);
$pdf->SetTextColor(26, 54, 68);
$pdf->Text(80, 80, iconv('UTF-8', 'ISO-8859-2', "Detalle Productos"));
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 14);
/**
 *Convertimos header a caracteres latinos
 * 
 */
//---Enviamos la consulta con el header
$pdf->FancyTable($header, $data);



$pdf->Output();
?>