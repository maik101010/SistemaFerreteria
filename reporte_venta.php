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
		    $w = array(35, 50, 40, 50);

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
		        $cantidad = $row['cantidadSolicitada'];
              	$valorProducto = $row['valor'];
              	$total = $valorProducto*$cantidad;
              	//echo "$". $total;

	            $contVenta = $total+$contVenta;  

		        $this->Cell($w[2],6, iconv('UTF-8', 'ISO-8859-2', '$'.$total),'LR',0,'C',$fill);
		        $this->Cell($w[3],6, iconv('UTF-8', 'ISO-8859-2', $row['cantidadSolicitada']),'LR',0,'C',$fill);
		  		$this->Ln();
		  		$cont = $row['valor'] * $row['cantidadSolicitada'];
		        $fill = !$fill;
		    }

		    $this->SetFont('Arial', 'B', 20);
			$this->SetTextColor(26, 54, 68);
			$this->Text(140, 150, iconv('UTF-8', 'ISO-8859-2', "Total Venta: $".$contVenta));
			//$this->Text(180, 150, iconv('UTF-8', 'ISO-8859-2', "$".$contVenta));
			$this->SetFont('Arial', 'B', 14);		  
		}

}
$pdf = new PDF();

// Títulos de las columnas
$titulo= "Referencia";
$titulo1= "Nombre";
$titulo2 = "Valor";
$titulo3 = "Cantidad Solicitada";

/**
 *
 * 	Solucionando la parte de las tildes
 */

$titulo = iconv('UTF-8', 'ISO-8859-2', $titulo);
$titulo1 = iconv('UTF-8', 'ISO-8859-2', $titulo1);
$titulo2 = iconv('UTF-8', 'ISO-8859-2', $titulo2);
$titulo3 = iconv('UTF-8', 'ISO-8859-2', $titulo3);

$header = array($titulo, $titulo1, $titulo2, $titulo3);

//$header2 = array('Tipo de uso', 'Unidad de medida', 'Precio');
// Carga de datos


	include "php/conexion.php";

    $conexion = $con;

        /*
            Consulta que trae los usuarios de tipo "consultor", puesto que son los unicos que tienen un tema asociado
        */

    

    $consulta = $conexion->query("SELECT producto.referencia as referencia, producto.nombre, producto.valor, venta.cantidadSolicitada FROM venta INNER JOIN producto on producto.id = venta.producto_id where venta.estado = 0 order by producto.nombre" );
    $data = $consulta;



$pdf->SetMargins(20,20,20);
$pdf->AddPage();

// $pdf->Image('img/logo.jpg' , 20 ,22, 35 , 38,'JPG', 'http://www.facebook.com');
// $pdf->Image('img/13.png' , 100 ,22, 100 , 38,'PNG', 'http://www.facebook.com');
$pdf->Ln(50);
$pdf->SetFont('Arial', 'B', 30);
$pdf->SetTextColor(26, 54, 68);
$pdf->Text(80, 80, iconv('UTF-8', 'ISO-8859-2', "Detalle Venta"));
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 14);
/**
 *Convertimos header a caracteres latinos
 * 
 */

$pdf->FancyTable($header, $data);



$pdf->Output();
?>