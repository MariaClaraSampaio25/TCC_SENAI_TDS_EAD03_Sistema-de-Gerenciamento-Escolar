<?php
$conn= mysqli_connect("localhost", "root","", "gestao_escolar");
mysqli_set_charset($conn, "utf8");
if(!$conn){
    echo "Erro: " .mysqli_connect_error();

}

?>