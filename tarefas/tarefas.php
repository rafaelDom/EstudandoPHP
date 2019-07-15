<?php

session_start();
require "banco.php";

if	(array_key_exists('nome',$_GET)	&&	$_GET['nome'] != ''){
    $tarefa	= [];
    $tarefa['nome'] = $_GET['nome'];
    if	(array_key_exists('descricao',	$_GET))	{
        $tarefa['descricao'] = $_GET['descricao'];
    }else{
        $tarefa['descricao'] =	''; 
    }
    if(array_key_exists('prazo',$_GET)){
        $tarefa['prazo'] = $_GET['prazo'];
    }else{
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] =	$_GET['prioridade'];
    if(array_key_exists('concluida', $_GET))	{
        $tarefa['concluida'] = $_GET['concluida'];
    }else{
        $tarefa['concluida'] = '';
    }

    $_SESSION['lista_tarefas'][] = $tarefa;
}

$lista_tarefas	= buscar_tarefas($conexao);

require "template.php";
