<?php

namespace Domain\Todo\Exceptions;

class StoreTodoFailedException extends TodoException
{
    public static function createWithUnknownError(string $message, int $code, ?\Throwable $previous = null): self
    {
        return new self($message, $code, $previous);
    }
}
