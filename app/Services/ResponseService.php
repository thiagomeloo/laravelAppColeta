<?php

namespace App\Services;

/**
 * Classe de resposta para os serviços.
 */
class ResponseService
{
    /**
     * Status da resposta.
     * @var bool
     */
    private bool $status;

    /**
     * Mensagem da resposta.
     * @var object
     */
    private object $message;

    /**
     * Data da resposta.
     * @var mixed
     */
    private mixed $data;


    /**
     * Construtor da classe.
     * @param bool $status
     * @param string $message
     * @param mixed $data
     */
    public function __construct(bool $status, string $message,  $data = null)
    {
        $this->status = $status;

        $this->message = (object)[
            "type" => $this->status ? "success" : "error",
            "text" => $message
        ];

        $this->data = $data;
    }

    /**
     * Retorna uma instância da classe.
     * @return static
     */
    public static function make(bool $status, string $message, $data = null): static
    {
        return new static($status, $message, $data);
    }

    /**
     * Retorna o status da resposta.
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * Retorna a mensagem da resposta.
     * @return object { type: string, text: string}
     */
    public function getMessage(): object
    {
        return $this->message;
    }

    /**
     * Retorna true se o status for true.
     * @return bool
     */
    public function hasOk(): bool
    {
        return $this->status;
    }

    /**
     * Retorna true se o status for false.
     * @return bool
     */
    public function hasError(): bool
    {
        return !$this->status;
    }

    /**
     * Retorna os dados da resposta.
     * @return mixed
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * Retorna a resposta em array.
     * @return array
     */
    public function toArray(): array
    {
        return [
            "status" => $this->status,
            ...(array) $this->getMessage(),
            "data" => $this->data,
        ];
    }

    /**
     * Retorna a resposta em objeto.
     * @return object
     */
    public function toObject(): object
    {
        return (object) $this->toArray();
    }

    /**
     * Retorna a resposta em JSON.
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * Retorna a resposta em string.
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
