<?php

class MYPDF extends TCPDF {

    // Colored table
    public function venda_diaria($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(210,210,210);
        $this->SetTextColor(0);
        $this->SetDrawColor(0);
        $this->SetLineWidth(0.1);
        $this->SetFont('helvetica', 'B', 8);
        $w = array(15,45, 85, 25, 20);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 0, 0, 'C', 1);
        }
        $this->Ln();
        $this->SetFillColor(210,210,210);
        $this->SetTextColor(0);
        $this->SetFont('');
        $fill = 0;
        $cont=0;
        foreach($data as $row) {
            $cont++;
            $this->Cell($w[0], 6, $cont, 0, 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->categoria, 0, 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->producto, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $row->count, 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, number_format($row->preco,2), 0, 0, 'C', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$pdf->SetTitle('Gest-Farma | Relatório de vendas diárias');
$pdf->SetFont('helvetica', '', 9);
$cabecalho = '<img src="' . site_url('public/assets/img/insignia.png') . '" style="width: 60px;height: 60px;"><br> <span style="color: #0c91e5;">REPÚBLICA DE ANGOLA</span><br>';
$cabecalho .= 'ORGÃOS AUXILIARES DO PRESIDENTE DA REPÚBLICA<br>CASA DE SEGURANÇA<br>UNIDADE DE SEGURANÇA PRESIDENCIAL<br>FARMÁCIA<br><br><br><br><span style="font-family: Trebuchet MS;font-size: large">Relatório de vendas diária</span>';
$pdf->writeHTML($cabecalho, true, false, true, true, 'C');


$pdf->SetFillColor(210, 210, 210);



$pdf->Ln(3);
$header_prod = array('#','Categoria', 'Descrição', 'Quantidade', 'Preço');
$pdf->venda_diaria($header_prod, $venda);
$pdf->SetY($pdf->GetY());
$pdf->SetX($pdf->GetX() + 160);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(30, 6, 'Total: 0.00 AKZ', 0, 0, 'L', TRUE);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + 53);
$pdf->SetFont('helvetica', '', 8);

$pdf->meuFooter();
$pdf->Output('diaria.pdf', 'I');
?>