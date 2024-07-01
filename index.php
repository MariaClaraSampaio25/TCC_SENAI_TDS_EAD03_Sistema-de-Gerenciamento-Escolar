<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escola - Professor</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="row justify-content-center row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal"><b>Bem Vindo</b></h4>
                </div>
                <div class="card-body">
                    <form name="login" action="login.php" method="POST">
                        <input class='form-control' type='text' name='Email' required placeholder="Digite seu e-mail"/>
                        <br/>
                        <input class='form-control' type='password' name='Senha' placeholder='Digite a sua senha' required/>
                        <br/>
                        <input type="submit" class="w-100 btn btn-secondary btn-success" value="ENTRAR"/>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
