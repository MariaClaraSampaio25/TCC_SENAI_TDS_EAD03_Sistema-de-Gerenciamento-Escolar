<?php
require_once ('tcpdf/tcpdf.php');
include 'conecta.php'; // Inclua o seu arquivo de conexão com o banco de dados

class PDF extends TCPDF
{
    // Cabeçalho
    public function Header()
    {
        // Não há cabeçalho neste caso
    }

    // Rodapé
    public function Footer()
    {
        // Não há rodapé neste caso
    }

    // Tabela com dados dos alunos
    public function Table($header, $data)
    {
        // Define a largura das colunas
        $w = array(45, 45, 45, 45, 45, 45); // Largura igual para todas as colunas para caber na orientação paisagem

        // Cabeçalho
        $this->SetFillColor(240, 240, 240); // Cor de fundo do cabeçalho
        $this->SetTextColor(0); // Cor do texto no cabeçalho
        $this->SetDrawColor(200, 200, 200); // Cor das linhas da tabela
        $this->SetLineWidth(0.3); // Largura das linhas da tabela

        $this->SetFont('helvetica', 'B', 10); // Definir tamanho da fonte para os títulos

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();

        // Dados
        $this->SetFillColor(255); // Cor de fundo para linhas alternadas
        $this->SetTextColor(0); // Cor do texto no corpo da tabela
        $this->SetFont('helvetica', '', 10); // Definir tamanho da fonte para os dados

        foreach ($data as $row) {
            for ($i = 0; $i < count($row); $i++) {
                if ($i == count($row) - 1) { 
                    $this->Cell($w[$i], 6, $row[$i], 'LRB', 0, 'L', 1);
                } else {
                    $this->Cell($w[$i], 6, $row[$i], 'LR', 0, 'L', 1);
                }
            }
            $this->Ln();
        }

       
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}


$sql = "SELECT Nome, Email, Telefone, Endereco, Matricula, Turno FROM aluno"; 

if ($result = $conn->query($sql)) {
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array($row['Nome'], $row['Email'], $row['Telefone'], $row['Endereco'], $row['Matricula'], $row['Turno']);
        }
    } else {
        $data[] = array('Sem dados', 'Sem dados', 'Sem dados', 'Sem dados', 'Sem dados', 'Sem dados');
    }
    $result->free();
} else {
    die("Erro na consulta SQL: " . $conn->error);
}

$conn->close();

$pdf = new PDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Relatório de Alunos');
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 12);

// Título
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Relatório de Alunos', 0, 1, 'C');

// Cabeçalho da tabela
$header = array('Nome', 'Email', 'Telefone', 'Endereço', 'Matrícula', 'Turno');

// Exibição da tabela
$pdf->Table($header, $data);

// Saída do PDF (diretamente para o navegador)
$pdf->Output('relatorio_alunos.pdf', 'I');
?>