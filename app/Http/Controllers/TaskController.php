<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestsTalk;
use App\Http\Resources\TaskResources;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $model = Task::where('is_active' , true)
            ->get();
        return response()->json([
           new TaskResources($model)
        ]);
    }

    public function store(StoreRequestsTalk $request)
    {
        try {
            Task::create($request->only([
                'name', 'description', 'is_active'
            ]));
            return response()->json([
                'message' => '  Задача добавлена'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => $exception->getMessage()
            ] ,500 );
        }
    }

    public function update(int $id , StoreRequestsTalk $request)
    {
        try {
            Task::find($id)
                ->update($request->only([
                    'name', 'description', 'is_active'
                ]));
            return response()->json([
                'message' => "Модель $id обновлена"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => $exception->getMessage()
            ] ,500 );
        }
    }
    public function destroy(int $id)
    {
        Task::destroy($id);
        return response()->json();
    }
}
