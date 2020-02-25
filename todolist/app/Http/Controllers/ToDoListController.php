<?php

namespace App\Http\Controllers;

use App\Http\Requests\{
    AddToDoListRequest,
    UpdateToDoListRequest
};
use App\Http\Resources\{ToDoListsResource, AToDoListResource};
use App\Services\ToDoListServices;
use Symfony\Component\HttpFoundation\Response;

class ToDoListController extends Controller
{
    public function getAllToDoList(ToDoListServices $toDoListServices): Response
    {
        $toDoLists = $toDoListServices->getAllToDoList();

        return ToDoListsResource::make($toDoLists)->response();
    }

    public function getToDoListById(int $id, ToDoListServices $toDoListServices): Response
    {
        $todoList = $toDoListServices->getToDoListById($id);

        return AToDoListResource::make($todoList)->response();
    }

    public function addToDoList(AddToDoListRequest $request, ToDoListServices $toDoListServices): Response
    {
        $todoList = $request->only(['title', 'content', 'attachment']);
        $toDoListServices->addToDoList($todoList);

        return response()->json([
            'message' => 'success',
            'data'    => []
        ]);
    }

    public function updateToDoListById(UpdateToDoListRequest $request, int $id, ToDoListServices $toDoListServices): Response
    {
        $updateToDoList = $request->only(['title', 'content', 'attachment', 'done_at']);

        $result = $toDoListServices->updateToDoListById($id, $updateToDoList);

        if (!$result) {
            return response()->json([
                'message' => 'update fail',
                'data'    => []
            ]);
        }

        return response()->json([
            'message' => 'success',
            'data'    => []
        ]);
    }
}
