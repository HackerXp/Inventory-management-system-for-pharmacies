<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$pdf->SetTitle($titulo);

$pdf->SetFont('helvetica', 'B', 22);
//$pdf->Cell(180, 10, '0000-01', 1, 0, 'C', FALSE);
$pdf->Ln(1);
$pdf->SetFillColor(210, 210, 210);
foreach ($tickets as $ticket):
$pdf->MultiCell(190, 20, "\n$ticket->codigo", 1, 'C', 0);
$pdf->Ln(1);
endforeach;
$pdf->meuFooter();
$pdf->Output('listagem.pdf', 'I');
?>