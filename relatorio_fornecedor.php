<?php
session_start(); // Iniciando sessão
require_once('tcpdf/tcpdf.php'); // Incluindo a biblioteca TCPDF
include_once("conexao.php");

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8'); // Criando o objeto TCPDF

$pdf->SetCreator('Seu Nome');
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Relatório de Fornecedores Cadastrados');
$pdf->SetMargins(15, 15, 15);
$pdf->SetFont('helvetica', 'B', 14);

// Obtendo os dados dos fornecedores do banco de dados
$sql = "SELECT * FROM fornecedor";
$result = mysqli_query($conn, $sql);

// Cabeçalho do documento
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Relatório de Fornecedores Cadastrados', 0, 1, 'C');
$pdf->Ln(10);

// Tabela de dados
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(30, 10, 'Código', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nome', 1, 0, 'C');
$pdf->Cell(40, 10, 'CEP', 1, 0, 'C');
$pdf->Cell(40, 10, 'CNPJ', 1, 1, 'C');

$pdf->SetFont('helvetica', '', 12);
while ($row_fornecedor = mysqli_fetch_assoc($result)) {
    $pdf->Cell(30, 10, $row_fornecedor['cod_for'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row_fornecedor['nome_for'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row_fornecedor['cep_for'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row_fornecedor['cnpj_for'], 1, 1, 'C');
}

// Gerando o arquivo PDF
ob_end_clean(); // Limpa qualquer saída anterior
$pdf->Output('relatorio_fornecedores.pdf', 'D');
?>
