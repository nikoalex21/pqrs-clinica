<?php
include("../../fpdp/fpdf.php");
include("../../conexion.php");
include("../../Model/Pqrs_pqr_model.php");
$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $resultado = $pqrs_pqr_model->getListaPqrs_personaId($id); 
    $resultado1 = $pqrs_pqr_model->getRepuestaPqr($id);
}
//var_dump($resultado1);
class PDF extends FPDF
{

function Header()
{
 
 $imageAncho = 90;
 $imageAlto = 30;
 $imageAncho1 = 50;
 $imageAlto1 = 30;

 $this->Image('../../img/logoProinsalud.png', 20, 20, $imageAncho, $imageAlto);
 
 $this->SetX(135);

 $this->Image('../../img/logo2.png', 135, 20, $imageAncho1, $imageAlto1);
 
 $this->Ln(30);
  
    $this->SetFont('Arial','B',15);
    
    $this->Cell(80);

    $this->Ln(20);  
}

function Footer()
{
    
    $this->SetY(-15);
  
    $this->SetFont('Arial','I',8);
 
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);



$pdf->Cell(5, 5, utf8_decode('Señor(a)'));
$pdf->Ln(6);
$pdf->Cell(5, 5, html_entity_decode($resultado['nombre']));
$pdf->Ln(6);
$pdf->Cell(15, 5, utf8_decode($resultado['tipoIdentificacion']));
$pdf->Cell(15, 5, utf8_decode($resultado['identificacion']));
$pdf->Ln(6);
$pdf->Cell(15, 5, utf8_decode('telefono'));
$pdf->Cell(15, 5, utf8_decode($resultado['telefono']));
$pdf->Ln(6);
$pdf->Cell(15, 5, utf8_decode('municipio'));
$pdf->Ln(6);
$pdf->SetX(120);
$pdf->Cell(15, 5, utf8_decode('Respuesta a ' . $resultado['tipoPqr'] . '  ' . $resultado['radicado']));
$pdf->Ln(10);
$pdf->Cell(5, 5, utf8_decode('Reciba usted un cordial Saludo: '));
$pdf->Ln(10);
$pdf->MultiCell(0, 5, utf8_decode('La UT SALUD SUR 2, agradece a usted la oportunidad que nos brinda para ser cada vez mejores, estamos en un proceso de mejoramiento continuo y sus apreciaciones son bienvenidas. '));
$pdf->Ln(10);
$pdf->MultiCell(0, 5, html_entity_decode($resultado1['respuestasPqr']));
$pdf->Ln(10);
$pdf->Cell(5, 5, utf8_decode('Se anexa pantallazo de agendamiento de cita.'));
$pdf->Ln(7);
$pdf->MultiCell(0, 5, utf8_decode('Si no se encuentra satisfecho (a) con la respuesta, favor háganoslo saber en la Oficina de Atención al Usuario, celular y WhatsApp 3176487000, correo citas.magisterio@proinsalud.co línea gratuita: 018000941474. Teléfono 6027244323 Ext. 503. '));
$pdf->Ln(10);
$pdf->Cell(5, 5, utf8_decode('Cordialmente, '));
$pdf->Ln(10);
$pdf->Cell(5, 5, utf8_decode('YENNY GALINDEZ '));
$pdf->Ln(4);
$pdf->Cell(5, 5, utf8_decode('Coordinación SIAU '));
$pdf->Output('D', $resultado['nombre'] . '.pdf');
$pdf->Output();
