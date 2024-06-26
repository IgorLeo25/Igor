<?php
session_start();
require_once('tcpdf/tcpdf.php');
include_once("conexao.php");

// Configurações do documento PDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
$pdf->SetCreator('Seu Nome');
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Relatório de Animais');
$pdf->SetMargins(15, 15, 15);
$pdf->SetFont('helvetica', 'B', 14);

// Adicionando uma nova página
$pdf->AddPage();

// Título do relatório
$pdf->Cell(0, 10, 'Relatório de Animais', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 12);

// Consulta SQL para obter os dados dos animais
$sql = "SELECT * FROM animal";
$result = mysqli_query($conn, $sql);

// Verificando se há animais para exibir
if (mysqli_num_rows($result) > 0) {
    // Tabela de animais
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(25, 10, 'Código', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Nome', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Raça', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Idade', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Sexo', 1, 1, 'C');

    $pdf->SetFont('helvetica', '', 10);
    // Exibindo os dados dos animais
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(25, 10, $row['cod_an'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['nome_an'], 1, 0, 'C');
        $pdf->Cell(35, 10, $row['raca_an'], 1, 0, 'C');
        $pdf->Cell(20, 10, $row['idade_an'], 1, 0, 'C');
        $pdf->Cell(20, 10, $row['sexo_an'], 1, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'Nenhum animal encontrado.', 0, 1);
}

// Gerando o arquivo PDF
$pdf->Output('relatorio_animais.pdf', 'D');
?>
