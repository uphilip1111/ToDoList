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

    public function getToDoListById(int $id): TodoLists
    {
        return TodoLists::find($id);
    }

    public function addToDoList(array $todoList): void
    {
        TodoLists::create($todoList);
    }

    public function updateToDoListById(int $id, array $updateToDoList): bool
    {
        $todoList = $this->getToDoListById($id);

        return $todoList->update($updateToDoList);
    }
}