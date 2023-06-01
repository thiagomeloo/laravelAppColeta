<?php

namespace App\Services;

use App\Interfaces\RepositoryInterface;

/**
 * Classe base para os serviços que utilizam repositórios.
 */
abstract class BaseRepositoryService
{
    /**
     * @var RepositoryInterface
     */
    private RepositoryInterface $repository;

    /**
     * Define o repositório a ser utilizado.
     *
     * @return RepositoryInterface
     */
    abstract protected function repositoryClass(): RepositoryInterface;

    /**
     * Construtor da classe.
     */
    public function __construct()
    {
        $this->repository = $this->repositoryClass();
    }

    /**
     * Retorna uma instância da classe.
     *
     * @return self
     */
    public function __invoke(): self
    {
        return new static();
    }

    /**
     * Retorna o repositório utilizado.
     *
     * @return RepositoryInterface
     */
    public function getRepository(): RepositoryInterface
    {
        return $this->repository;
    }
}
