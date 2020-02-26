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

    public function getToDoListById(int $id): ?TodoLists
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

    public function deleteById(int $id): bool
    {
        $todoList = TodoLists::find($id);

        if (is_null($todoList)) {
            return false;
        }
        return $todoList->delete();
    }

    public function deleteAll(): int
    {
        $todoLists = ToDoLists::whereNull('deleted_at');

        return $todoLists->delete();
    }
}