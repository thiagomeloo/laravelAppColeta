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
     * @return static
     */
    public function __invoke(): static
    {
        return new static();
    }

    /**
     * Retorna uma instância da classe.
     *
     * @return static
     */
    public static function getInstance(): static
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

    /**
     * Retorna uma resposta padrão para os serviços.
     *
     * @param bool $status
     * @param string $message
     * @param mixed $data
     * @return ResponseService
     */
    public static function responseService(bool $status, string $message, $data = null)
    {
        return ResponseService::make($status, $message, $data);
    }
}
