<?php
include 'conecta.php';
$Id = $_GET['id'];
$Nome = $_POST['Nome'];
$Email = $_POST['Email'];
$Telefone = $_POST['Telefone'];
$Endereco = $_POST['Endereco'];
$Matricula =$_POST['Matricula'];
$Turno =$_POST['Turno'];
$sql = "UPDATE aluno SET Nome= ?,Email=?, Telefone=?, Endereco=?, Matricula=?, Turno=? WHERE id=?";
$stmt = $conn -> prepare($sql) or die ($conn->error);
if(!$stmt){
    echo "Erro: ".$conn->error;
}
$stmt->bind_param('ssssssi', $Nome, $Email, $Telefone, $Endereco,$Matricula, $Turno, $Id);
$stmt->execute();
$conn->close();
header("Location: index.php");

?>