<?php
session_start();
include 'conecta.php';
$Email = $_POST['Email'];
$Senha = $_POST['Senha'];
$logar = mysqli_query($conn, "SELECT * FROM usuario WHERE Email='$Email' AND Senha = '$Senha'");
if(mysqli_num_rows($logar)>0){
    $dados = mysqli_fetch_array($logar);
    $_SESSION["user"]= $dados["Nome"];
    $_SESSION["idusuario"]= $dados["Id"];
    echo "<script>window.location.replace('index2.php');</script>";
}
else {
    echo"<script>alert('Login ou senha incorreta!Tente novamente!');</script>";
    echo"<script>window.location.replace('index.php');</script>";
}
mysqli_close($conn);

?>