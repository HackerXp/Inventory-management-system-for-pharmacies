<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$pdf->SetTitle('Gest-Farma | Produtos para requisição');
$pdf->SetFont('helvetica', '', 9);
$cabecalho = '<img src="' . site_url('public/assets/img/insignia.png') . '" style="width: 60px;height: 60px;"><br> <span style="color: #0c91e5;">REPÚBLICA DE ANGOLA</span><br>';
$cabecalho .= 'ORGÃOS AUXILIARES DO PRESIDENTE DA REPÚBLICA<br>CASA DE SEGURANÇA<br>UNIDADE DE SEGURANÇA PRESIDENCIAL<br>FARMÁCIA<br>';
$pdf->writeHTML($cabecalho, true, false, true, true, 'C');
$pdf->Ln(5);
$j = 0;
$ctrl=0;
$pdf->SetFont('helvetica', '', 9);
$pdf->writeHTML("LISTA DE FÂRMACOS COM BAIXA DE ESTOQUE", true, false, true, true, 'C');
$pdf->Ln(3);

foreach ($categorias as $categoria):
    if (count($this->producto->get_req_by_id_categoria($categoria->id))!=0) {
        $ctrl=1;
        $html = '<table cellspacing="0" cellpadding="1" border="1" align="center"><thead><tr bgcolor="#ddd" color="#000"><td style="width: 35px">#</td><td  style="width: 270px">' . strtoupper($categoria->nome) . '</td><td  style="width: 55px">ESTOQUE</td><td  style="width: 60px">ESTANTE</td><td  style="width: 55px">FABRICO</td><td  style="width: 65px">EXPIRAÇÃO</td></tr></thead><tbody>';
        foreach ($this->producto->get_req_by_id_categoria($categoria->id) as $produto):
            $j++;
            $html .= '<tr><td style="width: 35px">' . $j . '</td><td align="center"  style="width: 270px">' .($produto->nome) . '</td><td  style="width: 55px">' . $produto->estoque . '</td><td  style="width: 60px">' . $produto->estante . '</td><td  style="width: 55px">' . date("d-m-Y",strtotime($produto->data_fabrico)). '</td><td  style="width: 65px">' . date("d-m-Y",strtotime($produto->data_expir)) . '</td></tr>';
        endforeach;
        $j=0;
        $html .= '</tbody></table><br><br><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
    }
endforeach;
    if ($ctrl==0)
    {
        $pdf->writeHTML("Não existe fârmacos com baixa de estoque", true, false, true, true, 'C');
    }
$pdf->meuFooter();
$pdf->Output('listagem.pdf', 'I');
?>