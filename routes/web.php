<?php
$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    $this->get('/solicitante', 'RequesterController@index')->name('requester.index');
    $this->get('/solicitante/criar', 'RequesterController@create')->name('requester.create');
    $this->post('/solicitante/criar', 'RequesterController@store')->name('requester.store');
    $this->get('/solicitante/editar/{id}', 'RequesterController@edit')->name('requester.edit');
    $this->post('/solicitante/editar/{id}', 'RequesterController@update')->name('requester.update');
    $this->get('/solicitante/visualizar/{id}', 'RequesterController@show')->name('requester.show');
    $this->get('/solicitante/excluir/{id}', 'RequesterController@destroy')->name('requester.destroy');

    $this->get('/atendimento', 'ProtocolController@index')->name('atendimento.index');
    $this->post('/atendimento/criar', 'ProtocolController@create')->name('atendimento.create');
    $this->post('/atendimento/store', 'ProtocolController@store')->name('atendimento.store');
    $this->get('/atendimento/editar/{id}', 'ProtocolController@edit')->name('atendimento.edit');
    $this->post('/atendimento/editar/{id}', 'ProtocolController@update')->name('atendimento.update');
    $this->get('/atendimento/visualizar/{id}', 'ProtocolController@show')->name('atendimento.show');
    $this->get('/atendimento/imprimir/{id}', 'ProtocolController@print')->name('atendimento-print.pdf');
    $this->post('/atendimento/procuraPorNome', 'ProtocolController@findName')->name('atendimento.findName');
    $this->post('/atendimento/filtrar', 'ProtocolController@filter')->name('atendimento.filter');

    $this->get('/relatorio', 'RelatorioController@index')->name('relatorio.index');

    $this->get('/', 'AdminController@index')->name('admin.home');
    $this->get('/perfil', 'AdminController@profile')->name('profile');
    $this->post('/perfil', 'AdminController@profileUpdate')->name('profileUpdate');
    $this->get('/perfilSenha', 'AdminController@profilePassword')->name('profilePassword');
    $this->post('/perfilSenha', 'AdminController@profilePasswordUpdate')->name('profilePasswordUpdate');


});

$this->get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
