<?php

require_once("config.php");
/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);

*/

/*
$root = new Usuario();

$root->loadByid(3);

echo $root;

*/

// Carrega uma lista de usuarios
/*
$lista = Usuario::getList();

echo json_encode($lista)
*/

//Carrega uma lista de usuarios pelo login
/*
$search = Usuario::search("o");

echo json_encode($search);
*/

//Carrega um usuario usando o login e a senha

$usuario = new Usuario();

$usuario->login("sdias2017","123456");

echo $usuario;



?>