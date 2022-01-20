<?php

class MYPDF extends TCPDF {

    // Colored table
    public function listagemVenda($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(210,210,210);
        $this->SetTextColor(0);
        $this->SetDrawColor(0);
        $this->SetLineWidth(0.1);
        $this->SetFont('helvetica', 'B', 8);
        // Header
        $w = array(10, 125, 20, 35);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 0, 0, 'C', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(210,210,210);
        $this->SetTextColor(0);
        $this->SetFont('');

        // Data
        $fill = 0;
        $cont=0;
        foreach($data as $row) {
            $cont++;
            $this->Cell($w[0], 6, $cont, 0, 0, 'C', $fill);
            $this->Cell($w[1], 6, $row->nome, 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row->qtde_prod, 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, number_format($row->preco,2), 0, 0, 'C', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    public function listagemCaixa($header=null,$data=null)
    {
        // Colors, line width and bold font
        $this->SetFillColor(210,210,210);
        $this->SetTextColor(0);
        $this->SetDrawColor(0);
        $this->SetLineWidth(0.1);
        $this->SetFont('helvetica', 'B', 8);
        // Header
        $w = array(25, 65, 50, 50);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 0, 0, 'C', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(250, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        // Data
        $fill = 0;
            $this->Cell($w[0], 6, 1, 0, 0, 'C', $fill);
            $this->Cell($w[1], 6, date("d-m-Y",strtotime($data->data_criacao)), 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, nome_utilizador($data->user), 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, 'CX-1', 'LR', 0, 'C', $fill);
//            $this->Cell($w[4], 6, $data->data_criacao, 0, 0, 'C', $fill);
            $this->Ln();
            $fill=!$fill;
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$pdf->SetTitle('Gest-Farma | Detalhes da Venda');
$pdf->SetFont('helvetica', '', 9);
$pdf->Ln(5);

$pdf->SetY($pdf->GetY() - 6);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('helvetica', 'B', 25);
$pdf->Cell(50, 6, 'Factura', 0, 0, 'L', TRUE);
$pdf->SetFillColor(210, 210, 210);

$pdf->Ln(10);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(50, 6, 'Documento', 0, 0, 'L', TRUE);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(50, 6, $venda->id, 0, 0, 'L', FALSE);

$pdf->SetY($pdf->GetY() - 6);
$pdf->SetX($pdf->GetX() + 53);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(50, 6, 'Data', 0, 0, 'L', TRUE);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + 53);
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(50, 6, date("d-m-Y",strtotime($venda->data_criacao)), 0, 0, 'L', FALSE);

$pdf->SetY($pdf->GetY() + 8);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(50, 6, 'Nº de Cliente', 0, 0, 'L', TRUE);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(50, 6, '0000-01', 0, 0, 'L', FALSE);

//$pdf->SetY($pdf->GetY() - 6);
//$pdf->SetX($pdf->GetX() + 53);
//$pdf->SetFont('helvetica', 'B', 8);
//$pdf->Cell(50, 6, 'Repartição', 0, 0, 'L', TRUE);
//$pdf->SetY($pdf->GetY() + 6);
//$pdf->SetX($pdf->GetX() + 53);
//$pdf->SetFont('helvetica', '', 8);
//$pdf->Cell(50, 6, sigla($venda->repart), 0, 0, 'C ', FALSE);

$pdf->SetY($pdf->GetY() + 6);
$pdf->SetFont('helvetica', 'B', 10);

$pdf->SetFont('helvetica', '', 9);
$pdf->SetY($pdf->GetY() - 26);
$pdf->SetX($pdf->GetX() + 105);
$pdf->MultiCell(85, 25, "\nSenhor(a): ".($venda->comprador ? $venda->comprador:'Anónimo'), 0, 'L', TRUE);

$pdf->Ln(3);
$header_caixa = array('Folha', 'Data Actual', 'Operador', 'Caixa');
$pdf->listagemCaixa($header_caixa,$venda);
$pdf->Ln(3);
$header_prod = array('#', 'Descrição', 'Quantidade', 'Preço Unitário');
$pdf->listagemVenda($header_prod, $detalhes);
$pdf->SetY($pdf->GetY());
$pdf->SetX($pdf->GetX() + 145);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->Cell(45, 6, 'Total:  '.number_format($venda->valor_total, 2).' AKZ', 0, 0, 'L', TRUE);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + 53);
$pdf->SetFont('helvetica', '', 8);

$pdf->meuFooter();
$pdf->Output('listagem.pdf', 'I');
?>