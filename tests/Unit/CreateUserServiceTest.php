<?php

test('salvar um novo model user usando o service CreateUserService', function () {

    $data = [
        'name' => 'User Test',
        'email' => 'user@test.com'
    ];

    $response = \App\Services\User\CreateUserService::execute($data);

    expect($response->status)->toBe(true);
    expect($response->message->type)->toBe('success');
    expect($response->message->text)->toBe('Usuário criado com sucesso!');
    expect($response->data->name)->toBe('User Test');
    expect($response->data->email)->toBe('user@test.com');
});

test('atualizar um model user usando o service CreateUserService', function () {

    $user = \App\Models\User::factory()->create();

    $data = [
        'name' => 'User Test',
        'email' => 'user@test.com'
    ];

    $response = \App\Services\User\CreateUserService::execute($data, $user);

    expect($response->status)->toBe(true);
    expect($response->message->type)->toBe('success');
    expect($response->message->text)->toBe('Usuário atualizado com sucesso!');
    expect($response->data->name)->toBe('User Test');
    expect($response->data->email)->toBe('user@test.com');
});

test('retornar erro ao tentar salvar um novo model user usando o service CreateUserService', function () {

    $data = [];

    $response = \App\Services\User\CreateUserService::execute($data);

    expect($response->status)->toBe(false);
    expect($response->message->type)->toBe('error');
    expect($response->message->text)->toBe('Erro ao criar usuário!');
});


test('retornar erro ao tentar atualizar um model user usando o service CreateUserService', function () {

    $user = \App\Models\User::factory()->create();

    $data = [];

    $response = \App\Services\User\CreateUserService::execute($data, $user);

    expect($response->status)->toBe(false);
    expect($response->message->type)->toBe('error');
    expect($response->message->text)->toBe('Erro ao atualizar usuário!');
});
