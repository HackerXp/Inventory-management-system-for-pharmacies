<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();
$pdf->SetTitle('Gest-Farma | Listagem de Produtos');
$pdf->SetFont('helvetica', '', 9);
$cabecalho = '<img src="' . site_url('public/assets/img/insignia.png') . '" style="width: 60px;height: 60px;"><br> <span style="color: #0c91e5;">REPÚBLICA DE ANGOLA</span><br>';
$cabecalho .= 'ORGÃOS AUXILIARES DO PRESIDENTE DA REPÚBLICA<br>CASA DE SEGURANÇA<br>UNIDADE DE SEGURANÇA PRESIDENCIAL<br>FARMÁCIA<br>';
$pdf->writeHTML($cabecalho, true, false, true, true, 'C');
$pdf->Ln(5);
$j = 0;
$pdf->SetFont('times', '', 10);
//$categorias  = 4; // váriavel que vai conter todas as categorias
foreach ($categorias as $categoria):
    $medicamentos = 4; // Variavel que vai conter todos os medicamentos de uma categoria. Depois de selecionado a categoria então pega os medicamentos.
    if (count($this->producto->get_by_id_categoria($categoria->id))!=0) {
        $html = '<table cellspacing="0" cellpadding="1" border="1" align="center"><thead><tr bgcolor="#ddd" color="#000"><td style="width: 35px">#</td><td style="width: 305px">' . strtoupper($categoria->nome) . '</td><td  style="width: 65px">ESTOQUE</td><td>ESTANTE</td></tr></thead><tbody>';
        foreach ($this->producto->get_by_id_categoria($categoria->id) as $produto):
            $j++;
            $html .= '<tr><td style="width: 35px">' . $j . '</td><td align="center" style="width: 305px">' . strtoupper($produto->nome) . '</td><td style="width: 65px">' . $produto->estoque . '</td><td>' . $produto->estante . '</td></tr>';
        endforeach;
        $j=0;
        $html .= '</tbody></table><br><br><br>';
        $pdf->writeHTML($html, true, false, true, false, '');
    }
    endforeach;
$pdf->meuFooter();
$pdf->Output('listagem.pdf', 'I');
?>