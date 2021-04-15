<?php

use Sistema\Ponto\Controller\DeletarRegistro;
use Sistema\Ponto\Controller\Deslogar;
use Sistema\Ponto\Controller\EditarRegistro;
use Sistema\Ponto\Controller\FormularioLogin;
use Sistema\Ponto\Controller\ListarRegistros;
use Sistema\Ponto\Controller\RealizarLogin;
use Sistema\Ponto\Controller\SalvarRegistro;
use Sistema\Ponto\Controller\SelecionarPerfil;

$rotas = [
    '/listar-registros' => ListarRegistros::class,
    '/salvar-registro' => SalvarRegistro::class,
    '/excluir-registro' => DeletarRegistro::class,
    '/editar-registro' => EditarRegistro::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizarLogin::class,
    '/logout' => Deslogar::class,
    '/perfil' => SelecionarPerfil::class


];

return $rotas;