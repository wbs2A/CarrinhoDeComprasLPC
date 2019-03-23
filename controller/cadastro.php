<?php
/**
 * Este arquivo foi criado apenas para que a Cintia treinasse um cadastro com o PHP.
 */
$servername = "localhost";
$username = "root";
$password = "laboratorio";
$dbname = "TestePHP";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO usuario (nomeUsuario, idade, morango)
VALUES ('".$_POST['nomeUsuario']."',".$_POST['idade'].", 1)";
if ($conn->query($sql) === TRUE) {
    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
