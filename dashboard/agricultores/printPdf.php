<?php
/* Created by kiaka
   Project name watu
   Data: 08/10/2023
   Time: 11:20
*/
//Autoload
require __DIR__ . "./../../vendor/autoload.php";
//Configurações da página com TCPDF
use Source\Agricultor\Lavra;
use Source\Agricultor\Agricultor;
use Source\Agricultor\LavraOcupada;
$perfil = base64_decode($_GET['q']) ?? 0;

if ($perfil === 0) {
    redirect(CONF_URL_BASE."/dashboard/");
}
$agricultor = new Agricultor();
$lavra = new Lavra();
$lavraOcupada = new LavraOcupada();


$agricultor->getAgricultor($perfil);
$lavra->getLavra($perfil);
$lavraOcupada->consultarLavraOcupada($perfil);

$title = "FORMULÁRIO DE INQUÉRITO AO AGRICULTOR";
$titleCabecalho = "Plano de Acção de Reassentamento do Projecto da Linha de Transmissão de 220kV entre o Gove e a Matala, Províncias do Huambo e da Huíla";
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(CONF_SITE_NAME);
$pdf->SetAuthor(CONF_SITE_NAME);
$pdf->SetTitle($title);
$pdf->SetSubject($title);
$pdf->SetKeywords($title);
// desabilitar o rodapé e o cabeçalho
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);
// add a page
$pdf->AddPage();
//Criar cabeçalho
$pdf->Image(CONF_SITE_LOGO_RNT, 10, 5, 16, '', 'JPG', '', 'T');
$pdf->Image(CONF_SITE_LOGO_ELEC, 160, 12, 25, '', 'PNG', '', 'T');
// Adicione uma linha horizontal
$pdf->Line(10, 30, 200, 30); // (x1, y1, x2, y2)
// Set font
$pdf->Ln(15);
$pdf->Cell(190, 0, "", 0, 1);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(190, "", $titleCabecalho, 0, false, 'C', 0, '', 1, false, 'M','M');
$pdf->Ln();
//END: Criar cabeçalho
$pdf->SetFillColor(255, 255, 0);
// 255, 255, 0 representa cor amarela em RGB
$pdf->SetFont('courier', 'B', 11, '', true);
$pdf->Cell(190, 0, $title, 0, 1, 'C');
$pdf->SetFont('courier', '', 11, '', true);
$pdf->Ln(5);
$pdf->Cell(190, '', "IDENTIFICAÇÃO DO AGREGADO FAMILIAR", 'LTRB', 1,'C', 1, '', 1, false, 'M','M');

$pdf->Cell(20, '', "NOME:", 'L');
$pdf->Cell(170, '', $agricultor->getNomeIdentidade(), 'R',1);

$pdf->Cell(190, '',"LOCALIZAÇÃO: ".$agricultor->getLocalizacaoIdentidade(). " BAIRRO: ".$agricultor->getBairroIdentidade()." MUNICIPO: ".$agricultor->getMunicipioIdentidade(), 'LR',    1,    '');


// Saída do PDF





$pdf->Output('example.pdf', 'I');
