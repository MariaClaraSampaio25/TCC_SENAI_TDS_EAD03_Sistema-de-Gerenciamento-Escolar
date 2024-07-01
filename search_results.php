<?php
session_start();
$user = $_SESSION["user"];
$idprof = $_SESSION["idusuario"];

if (!isset($user)) {
    echo "<script language='javascript' type='text/javascript'>
    window.location.href='index.php';
    </script>";
}

// Conexão com o banco de dados
include 'conecta.php';

// Define a variável $aluno_turma
$aluno_turma = isset($_GET['turma']) ? $_GET['turma'] : '';

// Verifica se a variável 'query' está definida e não está vazia
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];

    // Processa a consulta de pesquisa
    $sql = "SELECT aluno.Id, aluno.Nome FROM aluno 
            INNER JOIN aluno_turma ON aluno.Id = aluno_turma.Id_aluno 
            INNER JOIN turma ON aluno_turma.Id_turma = turma.Id 
            WHERE turma.Nome = '$aluno_turma' AND aluno.Nome LIKE '%$query%'
            UNION
            SELECT Id, Nome FROM professor WHERE Nome LIKE '%$query%'
            UNION
            SELECT Id, Nome FROM turma WHERE Nome LIKE '%$query%'";

    $result = $conn->query($sql);
} else {
    // Se a variável 'query' não estiver definida, define uma mensagem de erro
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            color: #333;
        }

        .cabecalho {
            background-color: black;
            padding: 10px 0;
            text-align: left;
        }

        .lista-cabecalho {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .lista-cabecalho li {
            display: inline-block;
            margin-right: 20px;
        }

        .lista-cabecalho li a {
            color: white;
            text-decoration: none;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <header class="cabecalho">
        <ul class="lista-cabecalho">
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <?php echo "&nbsp;&nbsp;<font color='white'><b>" . $user . "</b></font>"; ?>
            </li>
            <li><a href="index2.php">Início</a></li>
            <li><a href="professor/index.php">Professor</a></li>
            <li><a href="aluno/index.php">Aluno</a></li>
            <li><a href="turma/index.php">Turmas</a></li>
            <li><a href="script/matricalunos.php">Matriculas</a></li>
            <li><a href="script/verturma.php">Consulta de turmas</a></li>
            <li>
                <form action="search_results.php" method="GET" style="display:inline;">
                    <input type="text" name="query" placeholder="Pesquisar...">
                    <input type="hidden" name="turma" value="<?php echo $aluno_turma; ?>">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </form>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-power" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1z" />
                    <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812" />
                </svg>
                <?php echo "<a href='sair.php'><font color='white'><b>SAIR</b></font></a>&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
            </li>
        </ul>
    </header>

    <main class="container mt-4">
        <h1>Resultados da Pesquisa</h1>
        <hr />
        <?php
        if ($result && $result->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead><tr><th>Nome</th></tr></thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['Nome'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>Nenhum resultado encontrado.</p>';
        }
        $conn->close();
        ?>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date("Y"); ?> Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline text-md-end">
                        <li class="list-inline-item"><a href="politica_privacidade.php">Política de Privacidade</a></li>
                        <li class="list-inline-item"><a href="termos_servico.php">Termos de Serviço</a></li>
                        <li class="list-inline-item"><a href="contato.php">Contato</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
