<?php

namespace Domain\Todo\Models;

use Domain\Todo\Priority;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'todo',
        'priority',
        'due_date',
        'done',
        'user_id',
    ];

    protected $attributes = [
        'priority' => Priority::DEFAULT,
        'done' => false,
    ];

    protected $casts = [
        'priority' => Priority::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
