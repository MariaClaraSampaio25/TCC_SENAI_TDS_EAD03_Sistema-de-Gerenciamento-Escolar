<?php
session_start();
$user = $_SESSION["user"];
$idprof = $_SESSION["idusuario"];

if (!isset($user)) {
    echo "<script language= 'javascript' type = 'text/javascript'>
    window.location.href='index.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: white;
            color: #333;
        }

        .cabecalho {
            background-color: black;
            padding: 6px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cabecalho__menu-hamburguer {
            width: 24px;
            height: 24px;
            background-repeat: no-repeat;
            background-position: center;
            display: inline-block;
        }

        .menu-container {
            position: absolute;
            top: 50px;
            left: 0;
            width: 200px;
            background-color: black;
            padding: 1em;
            display: none;
            z-index: 1000;
            border-radius: 10px;
        }

        .menu-toggle {
            display: inline-block;
            padding: 6px;
        }

        .menu-toggle input[type="checkbox"] {
            display: none;
        }

        .menu-toggle label {
            display: block;
            cursor: pointer;
            background-color: black;
            color: white;
            text-align: center;
            border-radius: 4px;
            padding: 5px 10px;
        }

        .menu-toggle input[type="checkbox"]:checked~.menu-container {
            display: block;
        }

        .lista-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .lista-menu li {
            margin-bottom: 0.5em;
        }

        .lista-menu li a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 0.5em;
        }

        .lista-menu li a:hover {
            background-color: #f8f9fa;
            color: black;
            border-radius: 10px;
        }

        .lista-cabecalho {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .lista-cabecalho li {
            margin-right: 20px;
        }

        .container-fluid {
            padding: 0 15px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <header class="cabecalho">
        <div style="display: flex; align-items: center;">
            <a class="cabecalho-inicio" href="http://localhost/APPGestao_Escolar/index2.php"
                style='text-decoration: none;'>&nbsp;&nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="30"
                    height="30" fill="white" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                </svg></a>
            <div class="menu-toggle">
                <input type="checkbox" id="menu">
                <label for="menu"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-justify" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                    </svg></label>
                <div class="menu-container">
                    <ul class="lista-menu">

                    <li><a href="http://localhost/APPGestao_Escolar/professor/index.php">Professor</a></li>
                        <li><a href="http://localhost/APPGestao_Escolar/aluno/index.php">Aluno</a></li>
                        <li><a href="http://localhost/APPGestao_Escolar/turma/index.php">Turmas</a></li>
                        <li><a href="http://localhost/APPGestao_Escolar/script/matricalunos.php">Matriculas</a></li>
                        <li><a href="http://localhost/APPGestao_Escolar/script/inserirprof.php">Inserir Professor em turma</a></li>
                        <li><a href="http://localhost/APPGestao_Escolar/script/verturma.php">Consulta de turmas alunos</a></li>
                        <li><a href="http://localhost/APPGestao_Escolar/script/verturmaprof.php">Consulta de turmas professor</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="lista-cabecalho">
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-person-circle"
                    viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <?php echo "&nbsp;&nbsp;<font color='white'><b>" . $user . "</b></font>"; ?>
            </li>
            <li>
                <?php echo "<a href='http://localhost/APPGestao_Escolar/sair.php' style='text-decoration: none;'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='white' class='bi bi-power' viewBox='0 0 16 16'>
            <path d='M7.5 1v7h1V1z' />
            <path d='M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812' />
        </svg></a>&nbsp;&nbsp;<a href='http://localhost/APPGestao_Escolar/sair.php' style='text-decoration: none;'><font color='white'><b>Sair</b></font></a>"; ?>
            </li>

        </ul>
    </header>

    <br />
    <center> <a href="http://localhost/APPGestao_Escolar/index2.php">
            <button type="button" class="btn btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                    <path
                        d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                </svg> Voltar</button></a> <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
            data-bs-target="#exampleModal"><b>Cadastrar</b></button></center>


    <br />
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <center>
                            <h2 class="my-0 fw-normal">
                                <b>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                        class="bi bi-people" viewBox="0 0 16 16">
                                        <path
                                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                    </svg>&nbsp;&nbsp;Alunos
                                </b>
                            </h2>
                        </center>
                    </div>
                    <div class="card-body" style="text-align: left;">
                        <?php
                        include 'aluno.php'
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center>
    <form action="gerar_relatorio.php" method="post">
        <button type="submit" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
            <path d="M2 2a2 2 0 0 1 2-2h5.5L14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2z"/>
            <path d="M9.293 5.5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-2.5a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h2.5zM5 8.5h6a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm0 3h3a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2z"/>
        </svg> Gerar Relatório</button>
    </form>
</center>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de alunos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="cadcli.php" method="post">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="Nome" required />
                        <br />
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="Email" required />
                        <br />
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="Telefone" required />
                        <br />
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="Endereco" required />
                        <br />
                        <label>Matrícula</label>
                        <input type="date" class="form-control" name="Matricula" required />
                        <br />
                        <label for="Turno" class="form-label">Turno</label>
                        <select class="form-select" id="Turno" name="Turno" required>
                            <option value="" disabled selected>Selecione o turno</option>
                            <option value="Manhã">Manhã</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noite">Noite</option>
                        </select>
                        <br />
                        <button type="submit" class="btn btn-success">CADASTRAR</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>

                </div>
            </div>
        </div>
    </div>

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