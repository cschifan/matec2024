<?php

session_start();
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];

$host = "localhost";
$username_mysql = "root";
$password_mysql = "root";
$db = "negozio";

// connessione al server e al db
$conn = new mysqli($host, $username_mysql, $password_mysql, $db);

// verifico la correttezza della password
$query = "SELECT password_db FROM utenti WHERE username_db='$username';";

$result = $conn->query($query);
$ntuple = mysqli_num_rows($result);
$tupla = $result->fetch_assoc();
$pwd_db = $tupla["password_db"];

// password errata o utente non esistente
if ($ntuple==0 || $pwd_db != $password){
    header('Location: login.php');
    exit();
}

// Utente correttamente autenticato
$_SESSION["utenteCorrente"] = $username;
header('Location: prodotti.php');
exit();

?>