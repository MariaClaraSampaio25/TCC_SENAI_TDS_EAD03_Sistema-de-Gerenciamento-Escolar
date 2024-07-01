<?php
include 'conecta.php';
$Id = $_GET['id'];
$sql = "DELETE FROM aluno WHERE id= $Id";
if (mysqli_query ($conn, $sql)){
    echo "<script language = 'javascript' type= 'text/javascript'>
    window.location.href = 'index.php';
    </script>";

}
else{
    echo "<script language = 'javascript' type= 'text/javascript'>
    alert('Erro! Não foi possivel apagar cliente!');
    window.location.href = 'index.php';
    </script>";
}
mysqli_close($conn);

?>