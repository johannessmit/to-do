<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Domain\Todo\Todo;
use Domain\Todo\TodoRepository;
use Illuminate\Auth\AuthManager;

class TodoController extends Controller
{
    public function __construct(
        private readonly TodoRepository $todoRepository,
        private readonly AuthManager $authManager
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = $this->todoRepository->getAllByUserId(
            $this->authManager->id()
        );

        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $this->todoRepository->store(
            new Todo([
                'user_id' => $this->authManager->id(),
                'todo' => $request->todo,
                'due_date' => $request->due_date,
            ])
        );

        return to_route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->todo = $request->todo;
        $todo->due_date = $request->due_date;

        $this->todoRepository->store($todo);

        return to_route('todos.edit', [
            'todo' => $todo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
