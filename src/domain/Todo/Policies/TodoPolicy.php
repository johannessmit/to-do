<?php

namespace Domain\Todo\Policies;

use Domain\Todo\Models\Todo;
use Domain\User\Models\User;

class TodoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Todo $todo): bool
    {
        return $todo->user === $user;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Todo $todo): bool
    {
        return $todo->user === $user;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Todo $todo): bool
    {
        return $todo->user === $user;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Todo $todo): bool
    {
        return $todo->user === $user;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Todo $todo): bool
    {
        return $todo->user === $user;
    }
}