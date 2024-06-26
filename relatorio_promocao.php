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

// Consulta SQL para obter os dados das promoções
$sql = "SELECT cod_prom, imagem, texto FROM promocao";
$result = $conn->query($sql);

// Inicializando o objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Configurações do documento PDF
$pdf->SetCreator('Seu Nome');
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Relatório de Promoções');
$pdf->SetMargins(15, 15, 15);
$pdf->SetFont('helvetica', 'B', 14);

// Iterando sobre os resultados da consulta
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Adicionando uma nova página para cada promoção
        $pdf->AddPage();

        // Exibindo os dados da promoção
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Código da Promoção: ' . $row['cod_prom'], 0, 1, 'L');
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Nome: ' . $row['texto'], 0, 1, 'L');
        $pdf->Ln(10);

        // Obter as dimensões da imagem
        list($width, $height) = getimagesize($row['imagem']);

        // Calcular as proporções para ajustar a imagem ao quadrado
        $maxSize = 180; // Tamanho máximo do quadrado
        $ratio = min($maxSize / $width, $maxSize / $height);
        $imageWidth = $width * $ratio;
        $imageHeight = $height * $ratio;

        // Posição para centralizar a imagem no quadrado
        $x = 105 - ($imageWidth / 2); // Valor ajustado para o centro do quadrado
        $y = $pdf->GetY();

        // Exibindo a imagem
        $pdf->Image($row['imagem'], $x, $y, $imageWidth, $imageHeight, '', '', 'T', false, 300, 'C', false, false, 0, false, false, false);

        // Desenhando um quadrado com bordas
        $pdf->SetLineStyle(array('width' => 0.5, 'color' => array(0, 0, 0)));
        $pdf->Rect(15, $y - 5, 180, $imageHeight + 10);

        // Adicionando espaçamento antes da próxima promoção
        $pdf->Ln($imageHeight + 20);
    }
} else {
    $pdf->AddPage();
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Nenhuma promoção encontrada.', 0, 1, 'L');
}

// Fechando a conexão com o banco de dados
$conn->close();

// Gerando o arquivo PDF
$pdf->Output('relatorio_promocoes.pdf', 'D');
?>
