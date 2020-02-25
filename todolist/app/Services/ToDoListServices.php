<?php

namespace App\Services;

use App\Models\TodoLists;
use Illuminate\Database\Eloquent\Collection;

class ToDoListServices
{
    public function getAllToDoList(): Collection
    {
        return TodoLists::all();
    }

    public function addToDoList(array $todoList): void
    {
        TodoLists::create($todoList);
    }
}