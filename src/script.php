<?php

include "servicos/servicoValidadcao.php";
include "servicos/servicoMensagemSessao.php";
include "servicos/servicoCatecoriaCompeditor.php";

$nome = $_POST['nome'];
$idade = $_POST['idade'];
//var_dump($nome);
//var_dump($idade);

defineCategoriaCompetidor($nome, $idade);

header((string) 'location: index.php');
