<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToDoListRequest;
use App\Http\Resources\ToDoListsResponse;
use App\Services\ToDoListServices;
use Symfony\Component\HttpFoundation\Response;

class ToDoListController extends Controller
{
    public function getAllToDoList(ToDoListServices $toDoListServices): Response
    {
        $toDoLists = $toDoListServices->getAllToDoList();

        return ToDoListsResponse::make($toDoLists)->response();
    }

    public function addToDoList(AddToDoListRequest $request, ToDoListServices $toDoListServices): Response
    {
        $todoList = $request->only(['title', 'content', 'attachment']);
        $todoList = $request->all();
        $toDoListServices->addToDoList($todoList);

        return response()->json([
            'message' => 'success',
            'data'    => []
        ]);
    }
}
