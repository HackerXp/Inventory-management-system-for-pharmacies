<?php

class MYPDF extends TCPDF {

    // Colored table
    public function movimento($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(210,210,210);
        $this->SetTextColor(0);
        $this->SetDrawColor(0);
        $this->SetLineWidth(0.1);
        $this->SetFont('helvetica', 'B', 8);
        $w = array(10,39,25,76,12,12,16);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        $this->SetFillColor(210,210,210);
        $this->SetTextColor(0);
        $this->SetFont('');
        $fill = 0;
        $cont=0;
        foreach($data as $row) {
            $cont++;
            $this->Cell($w[0], 6, $cont, 1, 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->nome, 1, 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->num_factura, 1, 0, 'C', $fill);
            $this->Cell($w[3], 6, $row->produto, 1, 0, 'C', $fill);
            $this->Cell($w[4], 6, $row->qtde_grosso, 1, 0, 'C', $fill);
            $this->Cell($w[5], 6, $row->qtde_retalho, 1, 0, 'C', $fill);
            $this->Cell($w[6], 6, date("d-m-Y",strtotime($row->data_criacao)), 1, 0, 'C', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$pdf->SetTitle('Gest-Farma | Relatório de movimentos no estoque');
$pdf->SetFont('helvetica', '', 9);
$cabecalho = '<img src="' . site_url('public/assets/img/insignia.png') . '" style="width: 60px;height: 60px;"><br> <span style="color: #0c91e5;">REPÚBLICA DE ANGOLA</span><br>';
$cabecalho .= 'ORGÃOS AUXILIARES DO PRESIDENTE DA REPÚBLICA<br>CASA DE SEGURANÇA<br>UNIDADE DE SEGURANÇA PRESIDENCIAL<br>FARMÁCIA<br><br><br><br><span style="font-family: Trebuchet MS;font-size: large">Entradas no estoque</span>';
$pdf->writeHTML($cabecalho, true, false, true, true, 'C');


$pdf->SetFillColor(210, 210, 210);



$pdf->Ln(3);
$header_prod = array('#','Fornecedor',"Nº Factura", 'Producto', 'Grosso','Retalho','Data');
$pdf->movimento($header_prod, $movimentos);
$pdf->SetFont('helvetica', '', 8);

$pdf->meuFooter();
$pdf->Output('diaria.pdf', 'I');
?>