<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Http\Resources\ExerciseResource;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;

class ExerciseController extends Controller
{
    // 一覧表示
    public function index()
    {
        return ExerciseResource::collection(Exercise::all());
    }

    // 詳細表示
    public function show(Exercise $exercise)
    {
        return new ExerciseResource($exercise);
    }

    // 作成処理
    public function store(StoreExerciseRequest $request)
    {
        $exercise = Exercise::create($request->validated());
        return new ExerciseResource($exercise);
    }

    // 更新処理
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        $exercise->update($request->validated());
        return new ExerciseResource($exercise);
    }

    // 削除処理
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return response()->json(null, 204);
    }
}

