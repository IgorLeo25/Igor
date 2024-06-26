<?php
require_once('tcpdf/tcpdf.php');

// Criação do objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Configurações do documento PDF
$pdf->SetCreator('Seu Nome');
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Relatório de Serviços Cadastrados');
$pdf->SetMargins(15, 15, 15);
$pdf->SetFont('helvetica', 'B', 14);

// Cabeçalho do documento
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Relatório de Serviços Cadastrados', 0, 1, 'C');
$pdf->Ln(10);

// Tabela de dados
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(30, 10, 'Código', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nome', 1, 0, 'C');
$pdf->Cell(40, 10, 'Funcionário', 1, 0, 'C');
$pdf->Cell(70, 10, 'Descrição', 1, 1, 'C');

// Estabelecer a conexão com o banco de dados
$conn = mysqli_connect('localhost', 'root', '', 'pet_shop');

if (!$conn) {
    die('Falha na conexão com o banco de dados: ' . mysqli_connect_error());
}

// Realizar a consulta ao banco de dados e atribuir o resultado à variável $comando
$sql = "SELECT * FROM servico";
$comando = mysqli_query($conn, $sql);

if (!$comando) {
    die('Erro na consulta: ' . mysqli_error($conn));
}

$pdf->SetFont('helvetica', '', 12);
while ($row_servico = mysqli_fetch_assoc($comando)) {
    $pdf->Cell(30, 10, $row_servico['cod_s'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row_servico['nome_s'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row_servico['cod_us'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row_servico['descricao'], 1, 1, 'C');
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

// Gerando o arquivo PDF
ob_end_clean(); // Limpa qualquer saída anterior
$pdf->Output('relatorio_servicos.pdf', 'D');
?>
