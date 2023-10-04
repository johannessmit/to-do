<?php

namespace Domain\Todo;

use Domain\Todo\Exceptions\StoreTodoFailedException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TodoRepository
{
    /**
     * @return Collection<Todo>
     */
    public function getAll(): Collection
    {
        return Todo::all();
    }

    /**
     * @param int $userId
     *
     * @return Collection<Todo>
     */
    public function getAllByUserId(int $userId): Collection
    {
        return Todo::where('user_id', $userId)
            ->orderBy('due_date')
            ->get();
    }

    /**
     * @param int $id
     *
     * @return Collection<Todo>
     *
     * @throws ModelNotFoundException
     */
    public function getById(int $id): Collection
    {
        return Todo::findOrFail($id);
    }

    /**
     * @param Todo $todo
     *
     * @throws StoreTodoFailedException
     */
    public function store(Todo $todo): void
    {
        try {
            $todo->saveOrFail();
        } catch (\Throwable $throwable) {
            throw StoreTodoFailedException::createWithUnknownError(
                message: $throwable->getMessage(),
                code: $throwable->getCode(),
                previous: $throwable
            );
        }
    }
}
