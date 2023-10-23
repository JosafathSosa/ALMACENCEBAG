<?php
require_once('../tcpdf/tcpdf.php'); //Llamando a la Libreria TCPDF
require_once('conexion.php'); //Llamando a la conexión para BD

$fechaInicio = $mysqli->real_escape_string($_POST['fechaInicio']);
$fechaFin = $mysqli->real_escape_string($_POST['fechaFin']);
date_default_timezone_set('America/Mexico_City');


ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF
{

    public function Header()
    {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = dirname(__FILE__) . '/assets/img/logo.png';
        $this->Image($img_file, 85, 8, 20, 25, '', '', '', false, 30, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }
}


//Iniciando un nuevo pdf
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, 'mm', 'Letter', true, 'UTF-8', false);

//Establecer margenes del PDF
$pdf->SetMargins(0, 0, 0);
$pdf->SetHeaderMargin(20);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(true); //Eliminar la linea superior del PDF por defecto
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM); //Activa o desactiva el modo de salto de página automático

//Informacion del PDF
$pdf->SetCreator('UrianViera');
$pdf->SetAuthor('UrianViera');
$pdf->SetTitle('Informe de Salidas');

/** Eje de Coordenadas
 *          Y
 *          -
 *          - 
 *          -
 *  X ------------- X
 *          -
 *          -
 *          -
 *          Y
 * 
 * $pdf->SetXY(X, Y);
 */

//Agregando la primera página
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 10); //Tipo de fuente y tamaño de letra

$pdf->SetXY(150, 25);
$pdf->Write(0, 'Fecha: ' . date('d-m-Y'));
$pdf->SetXY(150, 30);
$pdf->Write(0, 'Hora: ' . date('h:i A'));
$pdf->SetXY(150, 35);
$pdf->Write(0, 'De: ' . $fechaInicio . ' Hasta: ' . $fechaFin);

$canal = 'Inventario CEBAG';
$pdf->SetFont('helvetica', 'B', 10); //Tipo de fuente y tamaño de letra
$pdf->SetXY(15, 20); //Margen en X y en Y
$pdf->SetTextColor(204, 0, 0);
$pdf->SetTextColor(0, 0, 0); //Color Negrita
$pdf->SetXY(15, 25);
$pdf->Write(0, '' . $canal);



$pdf->Ln(35); //Salto de Linea
$pdf->Cell(40, 26, '', 0, 0, 'C');
/*$pdf->SetDrawColor(50, 0, 0, 0);
$pdf->SetFillColor(100, 0, 0, 0); */
$pdf->SetTextColor(34, 68, 136);
//$pdf->SetTextColor(255,204,0); //Amarillo
//$pdf->SetTextColor(34,68,136); //Azul
//$pdf->SetTextColor(153,204,0); //Verde
//$pdf->SetTextColor(204,0,0); //Marron
//$pdf->SetTextColor(245,245,205); //Gris claro
//$pdf->SetTextColor(100, 0, 0); //Color Carne
$pdf->SetFont('helvetica', 'B', 15);
$pdf->Cell(100, 6, 'LISTA DE SALIDA', 0, 0, 'C');


$pdf->Ln(10); //Salto de Linea
$pdf->SetTextColor(0, 0, 0);

//Almando la cabecera de la Tabla
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('helvetica', 'B', 12); //La B es para letras en Negritas

$pdf->Cell(30, 6, 'Destino', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Direccion', 1, 0, 'C', 1);
$pdf->Cell(32, 6, 'Telefono', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Producto', 1, 0, 'C', 1);
$pdf->Cell(10, 6, 'Cant', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'Recibe', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'Entrega', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Fecha', 1, 1, 'C', 1);

/*El 1 despues de  Fecha Ingreso indica que hasta alli 
llega la linea */

$pdf->SetFont('helvetica', '', 10);

//SQL para consultas Empleados



$consultaSalida = "SELECT `salida`.`id_salida`,`salida`.`fecha`, `salida`.`entrega`,`salida`.`recibe`,`destino`.`destino`,`destino`.`direccion`,`destino`.`telefono`,`salida`.`producto`, `salida`.`cantidad` FROM `salida` LEFT JOIN `destino` ON `salida`.`id_destino` = `destino`.`id_Destino` WHERE `salida`.`fecha` BETWEEN '$fechaInicio' and '$fechaFin'";
$res = mysqli_query($mysqli, $consultaSalida);

while ($dataRow = mysqli_fetch_array($res)) {

    $pdf->Cell(30, 6, $dataRow['destino'], 1, 0, 'C');
    $pdf->Cell(30, 6, $dataRow['direccion'], 1, 0, 'C');
    $pdf->Cell(32, 6,  $dataRow['telefono'], 1, 0, 'C');
    $pdf->Cell(30, 6,  $dataRow['producto'], 1, 0, 'C');
    $pdf->Cell(10, 6,  $dataRow['cantidad'], 1, 0, 'C');
    $pdf->Cell(25, 6,  $dataRow['recibe'], 1, 0, 'C');
    $pdf->Cell(25, 6,  $dataRow['entrega'], 1, 0, 'C');
    $pdf->Cell(30, 6,  $dataRow['fecha'], 1, 1, 'C');
}


//$pdf->AddPage(); //Agregar nueva Pagina


//$pdf->AddPage(); //Agregar nueva Pagina

$pdf->Output('Reporte_Salida_' . date('d_m_y') . '.pdf', 'I'); 
// Output funcion que recibe 2 parameros, el nombre del archivo, ver archivo o descargar,
// La D es para Forzar una descarga