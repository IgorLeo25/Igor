<?php
require_once('tcpdf/tcpdf.php');
include_once("conexao.php");

// Consulta SQL para obter os dados dos produtos
$sql = "SELECT * FROM produto";
$result = mysqli_query($conn, $sql);

// Inicializando o objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Configurações do documento PDF
$pdf->SetCreator('Seu Nome');
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Relatório de Produtos');
$pdf->SetMargins(15, 15, 15);
$pdf->SetFont('helvetica', 'B', 14);

// Adicionando uma nova página
$pdf->AddPage();

// Cabeçalho do relatório
$pdf->Cell(0, 10, 'Relatório de Produtos', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 12);

// Tabela de produtos
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(30, 10, 'Código', 1, 0, 'C');
$pdf->Cell(60, 10, 'Nome', 1, 0, 'C');
$pdf->Cell(100, 10, 'Descrição', 1, 1, 'C');

$pdf->SetFont('helvetica', '', 10);
// Iterando sobre os resultados da consulta
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Exibindo os dados dos produtos na tabela
        $pdf->Cell(30, 10, $row['cod_p'], 1, 0, 'C');
        $pdf->Cell(60, 10, $row['nome_p'], 1, 0, 'C');
        $pdf->Cell(100, 10, $row['descricao'], 1, 1, 'C');
    }
} else {
    $pdf->Cell(190, 10, 'Nenhum produto encontrado.', 1, 1, 'C');
}

// Fechando a conexão com o banco de dados
mysqli_close($conn);

// Gerando o arquivo PDF
$pdf->Output('relatorio_produtos.pdf', 'D');
?>
