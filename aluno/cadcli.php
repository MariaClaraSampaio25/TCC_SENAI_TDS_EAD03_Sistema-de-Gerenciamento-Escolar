<?php
include 'conecta.php';
$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$Telefone = $_POST['Telefone'];
$Endereco =$_POST['Endereco'];
$Matricula =$_POST['Matricula'];
$Turno =$_POST['Turno'];
$sql = "INSERT INTO aluno (Nome, Email, Telefone, Endereco, Matricula, Turno) VALUES ('$Nome', '$Email', '$Telefone', '$Endereco','$Matricula','$Turno')";
if (mysqli_query($conn, $sql)){
    echo "<script language = 'javascript' type= 'text/javascript'>
    window.location.href = 'index.php';
    </script>";

}
else{
    echo "<script language='javascript' type = 'text/javascript'>
    alert('Erro!Cliente não foi cadastrado!');
    window.location.href='index.php';
    </script>";
}
?>