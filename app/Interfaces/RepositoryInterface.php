<?php

namespace App\Interfaces;


interface RepositoryInterface
{
    public function all(): array;

    public function create(array $data): object;

    public function update(array $data, int $id): object|bool;

    public function delete(int $id): bool;

    public function find(int $id): object|bool;
}
