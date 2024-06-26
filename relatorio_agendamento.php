<?php
require_once('tcpdf/tcpdf.php');

// Configuração da conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_shop";

// Criando conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para obter os dados dos agendamentos
$sql = "SELECT * FROM agendamento";
$result = $conn->query($sql);

// Inicializando o objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Configurações do documento PDF
$pdf->SetCreator('Seu Nome');
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Relatório de Agendamentos');
$pdf->SetMargins(15, 15, 15);
$pdf->SetFont('helvetica', 'B', 14);

// Adicionando uma nova página
$pdf->AddPage();

// Cabeçalho do relatório
$pdf->Cell(0, 10, 'Relatório de Agendamentos', 0, 1, 'C');
$pdf->SetFont('helvetica', '', 12);

// Tabela de agendamentos
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(40, 10, 'Código', 1, 0, 'C');
$pdf->Cell(60, 10, 'Nome do Animal', 1, 0, 'C');
$pdf->Cell(40, 10, 'Data', 1, 0, 'C');
$pdf->Cell(40, 10, 'Hora', 1, 1, 'C');

$pdf->SetFont('helvetica', '', 10);
// Iterando sobre os resultados da consulta
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Exibindo os dados dos agendamentos na tabela
        $pdf->Cell(40, 10, $row['cod_age'], 1, 0, 'C');
        $pdf->Cell(60, 10, $row['nome_age'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['data_age'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['hora_age'], 1, 1, 'C');
    }
} else {
    $pdf->Cell(180, 10, 'Nenhum agendamento encontrado.', 1, 1, 'C');
}

// Fechando a conexão com o banco de dados
$conn->close();

// Gerando o arquivo PDF
$pdf->Output('relatorio_agendamentos.pdf', 'D');
?>
